<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Support\Facades\Storage;


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

    // Upload avatar
    if ($request->hasFile('avatar')) {

        $data['avatar_url'] = $request
            ->file('avatar')
            ->store('avatars', 'public');
    }

    // Upload CV
    if ($request->hasFile('cv')) {

        $data['cv_url'] = $request
            ->file('cv')
            ->store('cvs', 'public');
    }

    Candidate::create($data);

    return redirect()
        ->route('candidates.index')
        ->with('success', 'Candidate created successfully.');
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

    // Avatar
    if ($request->hasFile('avatar')) {

        if ($candidate->avatar_url) {

            Storage::disk('public')->delete($candidate->avatar_url);

        }

        $data['avatar_url'] = $request
            ->file('avatar')
            ->store('avatars', 'public');
    }

    // CV
    if ($request->hasFile('cv')) {

        if ($candidate->cv_url) {

            Storage::disk('public')->delete($candidate->cv_url);

        }

        $data['cv_url'] = $request
            ->file('cv')
            ->store('cvs', 'public');
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

}
