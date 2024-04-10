<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $users = User::where('role', "user")->paginate(10);
        $adminsAccount = User::where('role', "admin")->get();
        return view('admin.users.index', compact('users', 'adminsAccount'));
    }

    public function ChangeStatus(Request $request) {
        $user = User::findOrFail($request->id);
        $user->status = $request->status  === "active" ? "inactive" : "active";
        $user->save();

        return response(['message' => 'Status has been updated']);
    }

    public function destroy(string $id) {
        $user = User::findOrFail($id);
        $user->delete();

        return response(['status' => 'success', 'message' => 'Delete user account has been successfully.']);
    }
}
