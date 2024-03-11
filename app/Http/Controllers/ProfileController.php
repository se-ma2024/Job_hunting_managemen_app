<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        $profile = $user->profile;
        return view('profile', compact('profile'));
    }

    public function createProfile()
    {
        return view('createProfile');
    }

    public function editProfile()
    {
        $user = auth()->user();
        $profile = $user->profile;
        return view("editProfile", compact('profile'));
    }

    public function addProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'future_goals' => 'nullable|string',
            'core_values' => 'nullable|string',
            'self_pr' => 'nullable|string',
        ]);

        $user = auth()->user();
        $user->profile()->create($request->all());

        return redirect()->route('showProfile')->with('success', 'プロフィールが作成されました');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'future_goals' => 'nullable|string',
            'core_values' => 'nullable|string',
            'self_pr' => 'nullable|string',
        ]);

        $user = auth()->user();
        $profile = $user->profile;
        $profile->update($request->all());
        return redirect()->route('showProfile')->with('success', 'プロフィールが更新されました');
    }
}
