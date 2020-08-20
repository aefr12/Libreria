@include('layouts.navbar')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
              Registrar Una Nueva Categoria
            </div>
            <div class="card-body">
                @include('messages.warning')
                <form method="POST" action="{{ route('Categoria.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Categoria</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a class="btn btn-danger" href="{{ route('Categoria.index') }}">Cancelar</a>
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