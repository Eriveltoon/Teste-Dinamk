@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center">

    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Entrar</h2>
                        <p class="text-muted mb-0">
                            Informe suas credenciais para acessar o sistema.
                        </p>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                            </button>

                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                required
                                autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                Senha
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Digite sua senha"
                                required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <span class="text-muted">
                            Não possui uma conta?
                        </span>

                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                            Cadastre-se
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
