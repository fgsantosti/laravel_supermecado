@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Categoria
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('categorias.update', $categoria->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nome:</label>
          <input type="text" class="form-control" name="nome" value={{ $categoria->nome }} />
        </div>
        <div class="form-group">
          <label for="price">Descrição :</label>
          <textarea class="form-control" name="descricao" >{{$categoria->descricao }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection