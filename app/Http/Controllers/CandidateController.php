<?php

namespace App\Http\Controllers;

use App\Events\CandidateAccountCreated;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Candidate::query();

        if ($request->search) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        if ($request->country) {
            $query->where('current_country', $request->country);
        }

        if ($request->desired_country) {
            $query->where('desired_country', $request->desired_country);
        }

        if ($request->education) {
            $query->where('education_level', $request->education);
        }

        if ($request->experience) {
            $query->where('experience_years', '>=', $request->experience);
        }

        $candidates = $query
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidates.create', [
            'candidate' => new Candidate(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $data = $request->validated();

        $avatarBase64 = $data['avatar_base64'] ?? null;
        unset($data['avatar_base64']);

        if ($avatarBase64) {
            $data['avatar_url'] = $this->storeAvatarFromBase64($avatarBase64);
        }

        if (array_key_exists('cv_url', $data) && empty($data['cv_url'])) {
            $data['cv_url'] = null;
        }

        $candidate = Candidate::create($data);

        CandidateAccountCreated::dispatch($candidate->id);

        return redirect()
            ->route('candidates.index')
            ->with('success', 'Candidate created successfully.');
    }

    /**
     * Handle async CV upload for FilePond.
     */
    public function uploadCv(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);

        $file = $validated['file'];
        $path = $file->store('cvs', 'public');

        return response()->json([
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $data = $request->validated();

        $avatarBase64 = $data['avatar_base64'] ?? null;
        unset($data['avatar_base64']);

        if ($avatarBase64) {
            if ($candidate->avatar_url) {
                Storage::disk('public')->delete($candidate->avatar_url);
            }

            $data['avatar_url'] = $this->storeAvatarFromBase64($avatarBase64);
        }

        if (array_key_exists('cv_url', $data)) {
            $newCvPath = $data['cv_url'] ?: null;

            if ($candidate->cv_url && $candidate->cv_url !== $newCvPath) {
                Storage::disk('public')->delete($candidate->cv_url);
            }

            $data['cv_url'] = $newCvPath;
        }

        $candidate->update($data);

        return redirect()
            ->route('candidates.index')
            ->with('success', 'Candidate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect()
            ->route('candidates.index')
            ->with('success', 'Candidate deleted successfully.');
    }

    /**
     * Decode base64 avatar and store in storage/app/public/avatars.
     */
    private function storeAvatarFromBase64(string $avatarBase64): string
    {
        if (!preg_match('/^data:image\/(png|jpe?g|webp);base64,/', $avatarBase64, $matches)) {
            throw ValidationException::withMessages([
                'avatar_base64' => 'Avatar format is invalid. Use PNG, JPG, or WEBP.',
            ]);
        }

        $extension = $matches[1] === 'jpeg' ? 'jpg' : $matches[1];
        $raw = substr($avatarBase64, strpos($avatarBase64, ',') + 1);
        $binary = base64_decode($raw, true);

        if ($binary === false) {
            throw ValidationException::withMessages([
                'avatar_base64' => 'Avatar base64 data is invalid.',
            ]);
        }

        $path = 'avatars/' . Str::uuid() . '.' . $extension;
        Storage::disk('public')->put($path, $binary);

        return $path;
    }
}
