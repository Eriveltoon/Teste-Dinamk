<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserUpdateController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateUserRequest $request, User $user)
    {
        $this->userService->update($user, $request->validated());

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}
