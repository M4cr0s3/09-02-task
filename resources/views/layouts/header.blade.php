<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="M18 11c0-.959-.68-1.761-1.581-1.954C16.779 8.445 17 7.75 17 7c0-2.206-1.794-4-4-4c-1.517 0-2.821.857-3.5 2.104C8.821 3.857 7.517 3 6 3C3.794 3 2 4.794 2 7c0 .902.312 1.727.817 2.396A2 2 0 0 0 2 11v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-2.638l4 2v-7l-4 2zm-5-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2M6 5c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2M4 19v-8h12l.002 8z"/>
            </svg>
            <a class="navbar-brand" href="{{ route('index') }}">Киноманы</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a @class([
                        'nav-link',
                        'active' => request()->route()->getName() === 'index',
                    ]) href="{{ route('index') }}">Главная</a>
                @guest()
                    <a @class([
                        'nav-link',
                        'active' => request()->route()->getName() === 'login.index',
                    ]) href="{{ route('login.index') }}">Авторизация</a>
                    <a @class([
                        'nav-link',
                        'active' => request()->route()->getName() === 'register.index',
                    ]) href="{{ route('register.index') }}">Регистрация</a>
                @endguest
                @auth()
                    <a @class([
                        'nav-link',
                        'active' => request()->route()->getName() === 'categories.index',
                    ]) href="{{ route('categories.index') }}">Категории</a>
                    <a class="nav-link" href="{{ route('logout') }}">Выход</a>
                @endauth
            </div>
            @auth()
                <div class="fw-bold">
                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                </div>
            @endauth
        </div>
    </div>
</nav>
