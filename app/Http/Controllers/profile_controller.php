<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\profile;

class profile_controller extends Controller
{
    public function showProfile()
    {
        $profile = DB::select('select * from profile where id = ?', [1]);   //ログイン機能未実装のためid = 1を仮で使用している
        return view('profile', ['profile' => $profile]);
    }

    public function editProfile()
    {
        $profile = profile::findOrFail(1);
        return view("editProfile", compact('profile'));
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

        $profile = Profile::findOrFail(1);
        $profile->updateProfile($request->all());
        return redirect()->route('showProfile')->with('success', 'プロフィールが更新されました');
    }

    }
