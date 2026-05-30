<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex Generation Info System</title>
    <!-- Favicon / Tab Logo -->
    <link rel="icon" type="image/png" href="{{ asset('images/pokedex_logo.png') }}?v=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/pokedex_logo.png') }}?v=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pokedex-red: #cc0000;
            --pokedex-dark-red: #8b0000;
            --pokedex-blue: #3b4cca;
            --pokedex-yellow: #ffde00;
            --pokedex-gold: #b3a125;
            --pokedex-bg: #f0f0f0;
        }

        body {
            background-color: var(--pokedex-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: radial-gradient(#d1d1d1 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .navbar {
            background-color: var(--pokedex-red);
            border-bottom: 5px solid var(--pokedex-dark-red);
            padding: 1rem 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 900;
            color: white !important;
            text-shadow: 2px 2px var(--pokedex-dark-red);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @media (min-width: 768px) {
            .navbar-brand {
                font-size: 1.8rem;
                gap: 15px;
            }
        }

        .logo-img {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            padding: 4px;
            border: 2px solid var(--pokedex-blue);
        }

        @media (min-width: 768px) {
            .logo-img {
                width: 50px;
                height: 50px;
                padding: 5px;
                border-width: 3px;
            }
        }

        .container {
            max-width: 1200px;
        }

        /* Pokédex Card Style */
        .card {
            border: 2px solid #333;
            border-radius: 10px 10px 50px 10px;
            background: white;
            box-shadow: 8px 8px 0px rgba(0,0,0,0.1);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 12px 12px 0px rgba(0,0,0,0.15);
        }

        .card-img-top {
            background: linear-gradient(135deg, #e0e0e0 0%, #ffffff 100%);
            padding: 15px;
            border-bottom: 2px solid #333;
            height: 160px;
            object-fit: contain;
        }

        @media (min-width: 768px) {
            .card-img-top {
                padding: 25px;
                height: 220px;
            }
        }

        .starter-box {
            background: linear-gradient(135deg, #ff4d4d 0%, #cc0000 100%);
            border: 3px solid var(--pokedex-yellow);
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            position: relative;
        }

        @media (min-width: 768px) {
            .starter-box {
                border-width: 5px;
                border-radius: 30px;
                padding: 40px;
                margin-bottom: 50px;
            }
        }

        .starter-box::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            width: 30px;
            height: 30px;
            background: #51adff;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 10px #51adff;
        }

        .starter-title {
            color: white;
            text-align: center;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-shadow: 2px 2px var(--pokedex-dark-red);
            font-size: 1.5rem;
        }

        @media (min-width: 768px) {
            .starter-title {
                letter-spacing: 4px;
                margin-bottom: 30px;
                text-shadow: 3px 3px var(--pokedex-dark-red);
                font-size: 2.5rem;
            }
        }

        .badge-type {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 6px 12px;
            border: 1px solid rgba(0,0,0,0.2);
            text-shadow: 1px 1px rgba(0,0,0,0.3);
        }

        .type-Grass { background-color: #78C850; }
        .type-Fire { background-color: #F08030; }
        .type-Water { background-color: #6890F0; }
        .type-Bug { background-color: #A8B820; }
        .type-Normal { background-color: #A8A878; }
        .type-Poison { background-color: #A040A0; }
        .type-Electric { background-color: #F8D030; }
        .type-Fairy { background-color: #EE99AC; }
        .type-Flying { background-color: #A890F0; }
        .type-Ground { background-color: #E0C068; }
        .type-Fighting { background-color: #C03028; }
        .type-Psychic { background-color: #F85888; }
        .type-Dark { background-color: #705848; }
        .type-Ghost { background-color: #705898; }
        .type-Steel { background-color: #B8B8D0; }
        .type-Ice { background-color: #98D8D8; }
        .type-Dragon { background-color: #7038F8; }
        .type-Rock { background-color: #B8A038; }

        .gen-nav {
            margin: 20px 0;
            background: white;
            padding: 10px;
            border-radius: 50px;
            border: 2px solid #333;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            justify-content: flex-start;
            gap: 5px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none; /* Firefox */
        }

        .gen-nav::-webkit-scrollbar {
            display: none; /* Chrome/Safari */
        }

        @media (min-width: 992px) {
            .gen-nav {
                margin: 40px 0;
                padding: 15px;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                overflow-x: visible;
            }
        }

        .gen-link {
            padding: 6px 15px;
            border-radius: 30px;
            color: #333;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
            border: 2px solid transparent;
            white-space: nowrap;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .gen-link {
                padding: 8px 20px;
                font-size: 1rem;
            }
        }

        .gen-link:hover {
            background: #f0f0f0;
            color: var(--pokedex-red);
        }

        .gen-link.active {
            background: var(--pokedex-red);
            color: white;
            border-color: var(--pokedex-dark-red);
        }

        .btn-pokedex {
            background-color: var(--pokedex-blue);
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: bold;
            border: none;
            box-shadow: 0 4px 0 #2a3a96;
            transition: all 0.1s;
        }

        .btn-pokedex:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #2a3a96;
        }

        .btn-pokedex:hover {
            background-color: #4a5adb;
            color: white;
        }

        .evolution-section {
            background: white;
            border: 2px solid #333;
            border-radius: 20px;
            padding: 30px;
            margin-top: 40px;
        }

        .evolution-title {
            font-weight: 900;
            text-transform: uppercase;
            color: #333;
            border-bottom: 3px solid var(--pokedex-red);
            display: inline-block;
            margin-bottom: 25px;
        }

        footer {
            background: #333;
            color: white;
            margin-top: 100px;
        }

        .nav-management {
            margin-top: 10px;
        }

        @media (min-width: 768px) {
            .nav-management {
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between position-relative">
            <a class="navbar-brand" href="{{ route('pokedex.index') }}">
                <img src="{{ asset('images/pokedex_logo.png') }}" alt="Logo" class="logo-img" onerror="this.src='https://cdn-icons-png.flaticon.com/512/188/188987.png'">
                Pokédex System
            </a>
            <div class="nav-management">
                <a href="{{ route('pokedex.management') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                    <i class="fas fa-cog me-1"></i> Manage Images
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-3 py-md-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-pill px-4" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-pill px-4" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="py-5 text-center">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} Pokédex Generation Info System - Student Project</p>
            <small class="text-muted">Gotta catch 'em all!</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
