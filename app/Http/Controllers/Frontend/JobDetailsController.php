<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobDetailsResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function __invoke(Request $request, Job $job)
    {
        return inertia()->render('Frontend/JobDetails', [
            'job' => JobDetailsResource::make($job),
        ]);
    }
}
