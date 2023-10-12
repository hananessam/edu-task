<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::with(['transactions'])->get();

        return response()->json([
            'users' => $users,
        ]);
    }
}
