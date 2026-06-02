<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserDeleteController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        if(auth()->user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'Você não pode deletar a si mesmo!');
        }

        $this->userService->delete($user);

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
