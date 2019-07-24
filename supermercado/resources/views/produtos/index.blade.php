@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif


  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Categoria</td>
          <td>Id</td>
          <td>Preço</td>
          <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->categoria->nome}}</td>
            <td>{{$produto->categoria_id}}</td>
            <td>{{$produto->preco}}</td>
            <td><a href="{{ route('produtos.edit',$produto->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
   <td><a href="{{ route('produtos.create')}}" class="btn btn-primary">Adicionar</a></td>
<div>


@endsection