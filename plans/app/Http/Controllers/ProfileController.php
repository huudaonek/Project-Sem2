<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        return view('User.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'FullName' => $request->input('FullName'),
            'UserName' => $request->input('UserName'),
            'Phone' => $request->input('Phone'),
            'Address' => $request->input('Address'),
        ]);

       return redirect()->route('users.edit', $user)->with('success', 'update successfull !.');
    }


}
