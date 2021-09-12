<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $items = User::paginate(5);

        return view('pages.user.index')->with([
            'items' => $items
        ]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.user.update')->with([
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'string',
            'jabatan' => 'string',
            'level' => 'in:user,admin'
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();
        $user->fill($data);
        $user->save();

        return redirect()->route('/user');
    }

    public function newPassword($id)
    {
        $item = User::findOrFail($id);

        return view('pages.setting.updatePass')->with([
            'item' => $item
        ]);
    }

    public function chancgePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($id);
        $data['password'] = Hash::make($request->password);
        $user->fill($data);
        $user->save();

        return redirect()->route('/user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('/user');
    }
}
