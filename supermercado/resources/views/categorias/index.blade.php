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
          <td>Descrição</td>
          <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nome}}</td>
            <td>{{$categoria->descricao}}</td>
            <td><a href="{{ route('categorias.edit',$categoria->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('categorias.destroy', $categoria->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
   <td><a href="{{ route('categorias.create')}}" class="btn btn-primary">Adicionar</a></td>
<div>
@endsection