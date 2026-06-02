<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Mail;

class UserService
{

    public function getIndexData(array $filters = [])
    {
        $query = User::query();

        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('email', 'like', '%' . $filters['search'] . '%');
        }

        return [
            'users' => $query->latest()->paginate(2),
            'totalUsers' => User::count(),
            'latestUser' => User::latest()->first(),
        ];
    }

    public function create(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($user->email)->send(new WelcomeUserMail($user));

        return $user;
    }

    public function update(User $user, array $data): User
    {
        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];

        if (!empty($data['password'])) {
            $updateData['password'] = Hash::make($data['password']);
        }

        $user->update($updateData);

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
