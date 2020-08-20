<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Libreria</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('font/css/all.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Libro.index') }}">
                    <h4>
                      <i class="fas fa-list-alt"></i> Libros
                    </h4>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Categoria.index') }}">
                    <h4>
                      <i class="fas fa-clipboard-list"></i> Categorias
                    </h4>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Libro.solicitar') }}">
                    <h4>
                      <i class="fas fa-book"></i> Solicitar Libro
                    </h4>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          <main class="py-1">
            @yield('content')
          </main>
    </div>
</body>
</html>