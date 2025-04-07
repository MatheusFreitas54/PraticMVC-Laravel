<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\HashService;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller    {
    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $data = $request->except('_token');
        $data['password'] = HashService::encrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return to_route('series.index');
    }
}
