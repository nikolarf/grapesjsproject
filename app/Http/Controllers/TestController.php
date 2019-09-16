<?php

namespace App\Http\Controllers;

use App\ContentPage;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(User $user, $id)
    {
        // $user = User::select('id')->where('name', $user)->first();
        // $user = \DB::table('users')->where('name', $user)->first();
        // $user = \DB::table('users')->where('name', '=', $user)->first();
        $user = User::findOrFail($id);

        // $id = ContentPage::findOrFail($id);

        // dd($id);

        return view('index', compact('user', 'id'));
    }
}


