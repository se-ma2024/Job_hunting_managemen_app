<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\profile;
use App\Models\User; // Userモデルを追加

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user(); // ログイン中のユーザーを取得
        $profile = $user->profile; // ユーザーに関連付けられたプロフィールを取得
        return view('profile', compact('profile'));
    }

    public function createProfile()
    {
        return view('createProfile');
    }

    public function editProfile()
    {
        $user = auth()->user(); // ログイン中のユーザーを取得
        $profile = $user->profile; // ユーザーに関連付けられたプロフィールを取得
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

        $user = auth()->user(); // ログイン中のユーザーを取得
        $user->profile()->create($request->all()); // プロフィールを作成

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

        $user = auth()->user(); // ログイン中のユーザーを取得
        $profile = $user->profile; // ユーザーに関連付けられたプロフィールを取得
        $profile->update($request->all()); // プロフィール情報を更新
        return redirect()->route('showProfile')->with('success', 'プロフィールが更新されました');
    }
}
