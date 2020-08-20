@include('layouts.navbar')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <a class="btn btn-dark btn-lg float-right" href="{{ route('Categoria.create') }}"><i class="fas fa-clipboard-list"></i> Nueva Categoria</a>
        <br><br><br>
        <div class="card text-center">
            <div class="card-header">
              Categorias Registradas
            </div>
            <div class="card-body">
                @include('messages.success')
                @include('messages.danger')
                @include('messages.warning')
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->name }}</th>
                                <td>{{ $category->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                      </li>
                    </ul>
                  </nav>
            </div>
            <div class="card-footer text-muted">
              {{ date('d-M-Y') }}
            </div>
          </div>
    </div>
</div>
@show