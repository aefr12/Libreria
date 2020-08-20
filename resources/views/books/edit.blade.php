@include('layouts.navbar')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Libro:  <h4>{{ $libro->name }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('Libro.update',$libro) }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del libro</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $libro->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="author">Nombre del autor</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $libro->author }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" name="category" id="category">
                            <option value="{{ $libro->category->id }}">{{ $libro->category->name }}</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published">Fecha de publicacion</label>
                        <input type="date" class="form-control" name="published" id="published" value="{{ $libro->published }}">
                    </div>
                    <a class="btn btn-danger" href="{{ route('Libro.index') }}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
            </div>
            <div class="card-footer text-muted">
              {{ date('d-M-Y') }}
            </div>
          </div>
    </div>
</div>
@show