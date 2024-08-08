<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('job.index', ['jobs' => Job::with('employer')->latest()->paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required", "min:3"],
        ]);

        $employer = new Employer();
        $employer->name = fake()->company();
        $employer->user_id = auth()->id();
        $employer->save();

        $job = new Job();
        $job->title = request('title');
        $job->salary = request('salary');
        $job->company_name = 'Test';
        $job->employer_id = $employer->id;
        $job->save();

        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );


        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('job.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();

        return redirect('/jobs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
