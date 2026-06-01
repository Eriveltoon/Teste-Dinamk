@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Criar Conta</h2>
                        <p class="text-muted mb-0">
                            Preencha os dados abaixo para se cadastrar.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nome
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Digite seu nome"
                            >
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                E-mail
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Digite seu e-mail"
                            >
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Senha
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Digite sua senha"
                            >
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">
                                Confirmar Senha
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Confirme sua senha"
                            >
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                Criar Conta
                            </button>
                        </div>

                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <span class="text-muted">
                            Já possui uma conta?
                        </span>

                        <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                            Entrar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
