<header>
    <nav class="py-2 h-100 px-5 bg-dark text-light gap-5 border border-black">
        <div class="h-100 d-flex align-items-center justify-content-between ">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <h4>Dashboard</h4>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </nav>
</header>
