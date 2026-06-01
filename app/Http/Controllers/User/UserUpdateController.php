<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;

class UserUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateUserRequest $request, User $user)
    {
        $request->validated();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if(!empty($request->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}
