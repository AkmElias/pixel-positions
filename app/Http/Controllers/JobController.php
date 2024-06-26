<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::query()
            ->latest()
            ->with(['employer', 'tags'])
            ->get()
            ->groupBy('featured');

        return view('jobs.index', [
            'featuredJobs' => $jobs[1],
            'jobs' => $jobs[0],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $jobAttributes = $request->validate([
            'title' => ['required', 'max:255'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required'],
            'url' => ['required', 'url'],
            'tags' => ['nullable'],
        ]);

        $jobAttributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($jobAttributes, 'tags'));

        if ($jobAttributes['tags'] ?? false) {
           foreach(explode(',', $jobAttributes['tags']) as $tag) {
               $job->tag($tag);
           }
        }

        return redirect('/');
    }
}
