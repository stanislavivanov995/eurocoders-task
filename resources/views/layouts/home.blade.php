<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    @if (session('registrationSuccessMessage'))
        <div class="alert alert-success" role="alert">
            {{ session('registrationSuccessMessage') }}
        </div>
    @endif

    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home') }}">Eurocoders</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home') }}">Начало</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('list.images') }}">Снимки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('list.users') }}">Потребители</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contacts') }}">Контакти</a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">|</p>
                    </li>
                    @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu ml-auto" aria-labelledby="navbarDropdown" style="left: auto; right: 0;">
                                @if (auth()->user()->is_admin === 1)
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">Админ Панел</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('show.profile') }}">Профил</a>
                                <a class="dropdown-item" href="{{ route('show.image.upload') }}">Качване на снимка</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Изход</button>
                                </form>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Регистрация</a>
                    </li>
                </ul>
                    @endauth
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content Section -->
        <div class="mt-4">
            @yield('content')
        </div>
        <!-- End Content Section -->
    </div>

    <!-- Register Modal -->
    @include('partials.register-modal')

    <!-- Login Modal -->
    @include('partials.login-modal')

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
