<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Layout</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h5>Админ Панел</h5>
        <ul class="nav flex-column">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.home') }}">Начало</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.images') }}">Снимки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users') }}">Потребители</a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu ml-auto" aria-labelledby="navbarDropdown" style="left: auto; right: 0;">
                        <a class="dropdown-item" href="{{ route('admin.home') }}">Админ Панел</a>
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
        </nav>
        <!-- End Navbar -->

        <!-- Page Content -->
        <div class="container-fluid mt-4">
            @yield('content')
        </div>
        <!-- End Page Content -->
    </div>
    <!-- End Main Content -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
