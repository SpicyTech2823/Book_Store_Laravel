<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\TimelineEvent;
use App\Models\CompanyInfo;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        $timelineEvents = TimelineEvent::orderBy('order')->get();

        $companyInfo = [];
        foreach (CompanyInfo::all() as $info) {
            $companyInfo[$info->type] = $info->value;
        }

        return view('about', compact('teamMembers', 'timelineEvents', 'companyInfo'));
    }
}
