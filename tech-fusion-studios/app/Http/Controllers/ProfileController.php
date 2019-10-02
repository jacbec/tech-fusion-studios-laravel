<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function data()
    {
        return view('profile.data');
    }

    public function users()
    {
        return view('profile.users');
    }

    public function stream()
    {
        return view('profile.stream');
    }

    public function user(Request $request)
    {
        return view('profile.user');
    }

    public function avatar(Request $request)
    {
        if ($request->input('croppie-avatar'))
        {
            $avatar = $request->input('croppie-avatar');

            list($type, $avatar) = explode(';', $avatar);
            list(, $avatar)      = explode(',', $avatar);

            $avatar = base64_decode($avatar);

            $avatarName = $request->user()->username . '.png';
            file_put_contents(public_path() . '/img/user-avatars/' . $avatarName, $avatar);

            User::where('id', $request->user()->id)->update(['avatar' => $avatarName]);

            return response()->json();
        }
        else
        {
            return response()->json();
        }
    }
}
