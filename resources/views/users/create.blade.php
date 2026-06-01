@extends('layouts.app')

@section('title', 'Registrar Usuário')

@section('content')

@include('navbar.navbar')

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Registrar Usuário</h2>
                        <p class="text-muted mb-0">
                            Preencha os dados abaixo para registrar um novo usuário.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        @include('form.form')

                        <div class="d-grid mb-2">
                            <a href="{{ route('users.index') }}"
                            class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Voltar
                            </a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-person-plus-fill"></i>
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
