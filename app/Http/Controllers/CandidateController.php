<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;


class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $candidates = Candidate::paginate(10);

    return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        //
         Candidate::create($request->validated());

        return redirect()
        ->route('candidates.index')
        ->with('success', 'Candidate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
         return view('candidates.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
        return view('candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
         $candidate->update($request->validated());

    return redirect()
            ->route('candidates.index')
            ->with('success', 'Candidate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
        $candidate->delete();

        return redirect()
        ->route('candidates.index')
        ->with('success', 'Candidate deleted successfully.');
    }
}
