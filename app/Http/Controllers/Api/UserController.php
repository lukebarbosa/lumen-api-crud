<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate();

        return response()->json($users);
    }

    public function getUser(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function postUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function updateUser(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'nullable|email',
            'password' => 'nullable|min:6'
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return response()->json($user);
    }

    public function deleteUser(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json([], 204);
    }
}
