<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
    
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }
}
