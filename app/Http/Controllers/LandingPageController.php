<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Page;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $aboutId = get_meta_value('_about');
        $aboutData = Page::where('id', $aboutId)->first();

        $interestId = get_meta_value('_interest');
        $interestData = Page::where('id', $interestId)->first();

        $awardId = get_meta_value('_award');
        $awardData = Page::where('id', $awardId)->first();

        $experienceData = History::where('type', 'Experience')->get();
        $educationData = History::where('type', 'Education')->get();
        return view('index')->with([
            'about' => $aboutData,
            'interest' => $interestData,
            'award' => $awardData,
            'experience' => $experienceData,
            'education' => $educationData
        ]);
    }
}
