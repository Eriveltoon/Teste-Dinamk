{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark"
     style="background-color: #2c3e50;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            Dinamk
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
