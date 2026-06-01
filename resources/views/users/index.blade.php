@extends('layouts.app')

@section('content')

@include('navbar.navbar')

<div class="container py-5">
    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold mb-1">Gerenciamento de Usuários</h1>
            <p class="text-muted mb-0">
                Visualize e gerencie os usuários cadastrados no sistema.
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <div class="text-end">
                <div class="fw-semibold">
                    {{ ucwords(auth()->user()?->name) }}
                </div>
                <small class="text-muted">
                    {{ auth()->user()?->email }}
                </small>
            </div>

            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                style="width: 40px; height: 40px;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
    </div>

    {{-- CARDS --}}
    <div class="row g-4 mb-2">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg h-100">
                <div class="card-body p-4">

                    <h6 class="text-uppercase text-muted small mb-3">
                        Total de usuários
                    </h6>

                    <h2 class="fw-bold mb-0">
                        {{ $totalUsers }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-lg h-100">
                <div class="card-body p-4">
                    <h6 class="text-uppercase text-muted small mb-3">
                        Último usuário cadastrado
                    </h6>

                    <h4 class="fw-bold mb-1">
                        {{ ucwords($latestUser->name ?? 'Nenhum usuário') }}
                    </h4>

                    <small class="text-muted">
                        {{ $latestUser?->created_at?->format('d/m/Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    {{-- TABELA --}}
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-white border-0 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    Usuários
                </h5>

                <a href="{{ route('users.create') }}"
                   class="btn btn-primary">
                    + Novo Usuário
                </a>
            </div>
        </div>

        <div class="card-body p-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="ps-4">
                                    <span class="badge bg-secondary">
                                        #{{ $user->id }}
                                    </span>
                                </td>

                                <td>
                                    {{ ucwords($user->name) }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td class="text-center">
                                    <a
                                        href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-sm btn-outline-warning">

                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>

                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        disabled>

                                        <i class="bi bi-trash"></i>
                                        Excluir
                                    </button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4"
                                    class="text-center py-5 text-muted">

                                    Nenhum usuário encontrado

                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3 shadow-lg">
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
