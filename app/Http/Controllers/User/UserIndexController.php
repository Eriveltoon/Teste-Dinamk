<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Services\UserService;

class UserIndexController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $this->userService->getIndexData($request->all());

        return view('users.index', $data);
    }
}
