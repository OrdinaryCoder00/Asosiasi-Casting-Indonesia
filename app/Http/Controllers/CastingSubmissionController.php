<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CastingSubmission;

class CastingSubmissionController extends Controller
{

    public function index()
    {
        return view('Casting-sub');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fullname'   => 'required|string|max:255',
            'dob'        => 'required|date',
            'gender'     => 'required|string|max:50',
            'height'     => 'required|integer',
            'weight'     => 'required|integer',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|max:255',
            'city'       => 'required|string|max:100',
            'portfolio_link' => 'nullable|url|max:255',
            'projects'   => 'nullable|string',
            'skills'     => 'required|string|max:255',
            'languages'  => 'required|string|max:255',
            'category'   => 'required|string|max:50',
            'photo'      => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'video'      => 'required|mimetypes:video/mp4|max:51200',
            'confirmInfo'=> 'required|accepted',
            'confirmPermission' => 'required|accepted',
        ]);

        $folderName = 'casting_submissions/' . str_replace(' ', '_', strtolower($request->fullname));

        $photoPath = $request->file('photo')->store('casting_submissions/' . str_replace(' ', '_', strtolower($request->fullname)) . '/photos', 'public');
        $videoPath = $request->file('video')->store('casting_submissions/' . str_replace(' ', '_', strtolower($request->fullname)) . '/videos', 'public');


        $submission = new CastingSubmission();
        $submission->fullname = $request->fullname;
        $submission->dob = $request->dob;
        $submission->gender = $request->gender;
        $submission->height = $request->height;
        $submission->weight = $request->weight;
        $submission->phone = $request->phone;
        $submission->email = $request->email;
        $submission->city = $request->city;
        $submission->portfolio = $request->portfolio_link;
        $submission->projects = $request->projects;
        $submission->skills = $request->skills;
        $submission->languages = $request->input('languages');
        $submission->category = $request->category;
        $submission->photo = $photoPath;
        $submission->video = $videoPath;
        $submission->confirmed_info = true;
        $submission->confirmed_permission = true;

        $submission->save();

        return response()->json([
            'success' => true,
            'message' => 'Submission berhasil!',
            'data'    => $submission
        ]);
    }

    public function adminIndex()
    {
        $submissions = CastingSubmission::orderBy('created_at', 'desc')->get();
        return view('admin.casting.index', compact('submissions'));
    }
    public function show($id)
    {
        $submission = CastingSubmission::findOrFail($id);
        return view('admin.casting.show', compact('submission'));
    }
}
