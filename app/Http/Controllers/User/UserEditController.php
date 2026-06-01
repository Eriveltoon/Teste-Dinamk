<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
            return view('users.edit', compact('user'));
    }
}
