@include('layouts.navbar')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
              Solicitar Libro
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('Libro.prestar') }}">
                    @csrf
                    <div class="form-group">
                        <label for="user">Nombre del solicitante</label>
                        <input type="text" class="form-control @error('user') is-invalid @enderror" id="user" name="user" required>
                            @error('user')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="libro">Nombre del libro</label>
                        <select class="form-control" name="libro" id="libro">
                                @foreach ($libros as $libro)
                                    <option value="{{ $libro->id }}">{{ $libro->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <a class="btn btn-danger" href="{{ route('Libro.index') }}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
            </div>
            <div class="card-footer text-muted">
              {{ date('d-M-Y') }}
            </div>
          </div>
    </div>
</div>
@show