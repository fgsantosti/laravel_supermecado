@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Produto
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
      <form method="post" action="{{ route('produtos.update', $produto->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nome:</label>
          <input type="text" class="form-control" name="nome" value={{$produto->nome }} />
        </div>
        
        <div class="form-group">
            <label for="nome">Categoria:</label>
            <select class="custom-select" name="categoria_id">
              <option value="{{$produto->categoria->id}}">{{$produto->categoria->nome}}</option>
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
              @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="price">Preço :</label>
          <input class="form-control" name="preco" value={{$produto->preco}} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection