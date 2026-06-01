<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::latest()->paginate(2);

        $totalUsers = User::count();

        $latestUser = User::latest()->first();

        return view('users.index', compact('users', 'totalUsers', 'latestUser'));
    }
}
