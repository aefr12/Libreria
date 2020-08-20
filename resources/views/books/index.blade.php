@include('layouts.navbar')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <a class="btn btn-dark btn-lg float-right" href="{{ route('Libro.create') }}"><i class="fas fa-book"></i> Nuevo Libro</a>
        <br><br><br>
        <div class="card text-center">
            <div class="card-header">
              Libros Registrados
            </div>
            <div class="card-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <h3>FILTROS DE BUSQUEDA</h3>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('Libro.index') }}">
                        <input class="form-control mr-sm-2" type="search" placeholder="Nombre del Libro" name="name" id="name" >
                        <input class="form-control mr-sm-2" type="search" placeholder="Autor" name="author" id="author">
                        <select class="form-control mr-sm-2" name="category" id="category">
                            <option value="">Categorias</option>
                                @foreach ($filtroCategoria as $categorias)
                                    <option value="{{ $categorias->id }}">{{ $categorias->name }}</option>
                                @endforeach
                        </select>
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </nav>
                @include('messages.success')
                @include('messages.danger')
                @include('messages.warning')
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre del Libro</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Fecha de Publicacion</th>
                            <th scope="col">¿Libro prestado?</th>
                            <th scope="col">Estado del libro</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <th scope="row">{{ $libro->name }}</th>
                                <td>{{ $libro->author }}</td>
                                <td>{{ $libro->category->name }}</td>
                                <td>{{ $libro->published }}</td>
                                <td>{{ $libro->borrowed}} </td>
                                <td>{{ $libro->active }}</td>
                                <td>
                                    <a href="{{ route('Libro.edit',$libro->id)}}"><i class="fas fa-edit"></i></a>
                                    @if ($libro->borrowed == "SOLICITADO")
                                        <a href="{{ route('Libro.confirmar',$libro->id)}}"><i class="fas fa-check"></i></a>
                                    @elseif($libro->borrowed == "SI")
                                        <a href="{{ route('Libro.confirmar',$libro->id)}}"><i class="fas fa-times"></i></a>
                                    @else
                                    @endif
                                    @if ($libro->active == "ACTIVO")
                                        <a href="{{ route('Libro.show',$libro->id)}}"><i class="fas fa-unlock"></i></a>
                                    @else
                                        <a href="{{ route('Libro.show',$libro->id)}}"><i class="fas fa-lock"></i></a>
                                    @endif
                                    <a href="{{ route('Libro.eliminar',$libro->id)}}"
                                        onclick="return confirm('¿Seguro que desea eliminar este libro?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{ $libros->links() }}
            </div>
            <div class="card-footer text-muted">
              {{ date('d-M-Y') }}
            </div>
          </div>
    </div>
</div>
@show