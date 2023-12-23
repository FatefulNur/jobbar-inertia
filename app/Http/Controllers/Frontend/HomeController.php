<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Resources\HomeJobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $jobs = Job::when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', "%{$request->search}%");
        })->latest()->get();

        return inertia()->render('Frontend/Index', [
            'jobs' => HomeJobResource::collection($jobs),
            'jobCount' => number_format($jobs->count()),
        ]);
    }
}
