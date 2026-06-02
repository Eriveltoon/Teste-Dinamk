<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;

class RegisterController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $this->userService->create($request->validated());

        return redirect()->route('login')->with('success', 'Conta criada com sucesso!');
    }
}
