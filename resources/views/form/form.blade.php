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

    <div class="input-group">
        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Digite seu e-mail"
            required
            autofocus>

        <span class="input-group-text">
            <i class="bi bi-envelope"></i>
        </span>
    </div>
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">
        Senha
    </label>

    <div class="input-group mb-4">
        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="Digite sua senha"
        >

        <button
            type="button"
            class="btn btn-outline-secondary toggle-password"
            data-target="password">

            <i class="bi bi-eye-slash"></i>
        </button>
    </div>
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
    <label for="password_confirmation" class="form-label">
        Confirmar Senha
    </label>

    {{-- <input
        type="password"
        class="form-control"
        id="password_confirmation"
        name="password_confirmation"
        placeholder="Confirme sua senha"
    > --}}

    <div class="input-group mb-4">
        <input
            type="password"
            class="form-control"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Digite sua senha"
        >

        <button
            type="button"
            class="btn btn-outline-secondary toggle-password"
            data-target="password_confirmation">

            <i class="bi bi-eye-slash"></i>
        </button>
    </div>
    @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
