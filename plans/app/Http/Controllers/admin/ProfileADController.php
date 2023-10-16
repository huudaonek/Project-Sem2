<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileADController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.editAD', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'FullName' => $request->input('FullName'),
            'UserName' => $request->input('UserName'),
            'Phone' => $request->input('Phone'),
        ]);

        return redirect()->route('admin.editAD', $user)->with('success', 'update successfull !.');
    }

}
