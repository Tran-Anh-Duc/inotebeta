<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Validator, Redirect, Response, File;


class GitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function gitCallBack()
    {
        try {
            $user = Socialite::driver('github')->user();
//            dd($user);
            $searchUser = User::where('github_id', $user->id)->first();
            if ($searchUser){
                Auth::login($searchUser);
                return redirect()->route('notes.index');
            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email'=>$user->email,
                    'github_id'=>$user->id,

                ]);
                Auth::login($gitUser);
                return redirect()->route('notes.index');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}

