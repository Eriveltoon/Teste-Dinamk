@extends('layouts.app')

@section('content')

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            Teste Dinamk
        </a>

        <div class="ms-auto">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-outline-light btn-md">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

        </div>
    </div>
</nav>

<div class="container py-5">
    {{-- HEADER --}}
    <div class="mb-5">
        <h1 class="fw-bold mb-1">
            Gerenciamento de Usuários
        </h1>

        <p class="text-muted mb-0">
            Visualize e gerencie os usuários cadastrados no sistema.
        </p>
    </div>

    {{-- CARDS --}}
    <div class="row g-4 mb-2">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
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
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h6 class="text-uppercase text-muted small mb-3">
                        Último usuário cadastrado
                    </h6>

                    <h4 class="fw-bold mb-1">
                        {{ $latestUser->name ?? 'Nenhum usuário' }}
                    </h4>

                    <small class="text-muted">
                        {{ $latestUser?->created_at?->format('d/m/Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    {{-- TABELA --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    Usuários
                </h5>

                <a href="#"
                   class="btn btn-primary">
                    + Novo Usuário
                </a>
            </div>
        </div>

        <div class="card-body p-0">
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
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td class="text-center">
                                    <button
                                        class="btn btn-sm btn-outline-warning"
                                        disabled>

                                        <i class="bi bi-pencil-square"></i>
                                        Editar

                                    </button>

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

        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
