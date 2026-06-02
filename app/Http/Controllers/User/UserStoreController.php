<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\UserService;

class UserStoreController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $this->userService->create($request->validated());

        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
