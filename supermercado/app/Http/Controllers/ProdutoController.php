<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Produto;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$produtos = Produto::all();

        //echo "produtos->nome";

        //$categorias = $produtos->categorias;

        /*foreach ($categorias as $categoria) {
            echo "{categoria->nome}";
        }*/

        //return view('produtos.index', compact('produtos', $categoria));

        //$categorias = Categoria::all();
        $produtos = Produto::all();
        //$produtos = $categoria->produtos;
        /*foreach ($produtos as $produto) {
            $categorias = $produto->categorias;
            echo "{$produto->nome} - {$categorias->nome}";
        }*/

        //Ex. correto ;)
        //$produto = Produto::find(1);
        //echo $produto->categoria->nome;


        return view('produtos.index', compact('produtos'));
        /*
        foreach ($categorias as $categoria) {
            
            echo "{$categoria->nome} - ";
            $produtos = $categoria->produtos;

            foreach ($produtos as $produto) {
                echo "{$produto->nome}";
            }

            echo "<br>";
        }*/
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selecionando todas as categorias presentes no banco
        $categorias = Categoria::all();

        //passando todas as categorias para produtos.create
        return view('produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'categoria_id' => 'required',
            'preco' => 'required'
            ]);
        $produto = new Produto([
            'nome' => $request->get('nome'),
            'categoria_id' => $request->get('categoria_id'),
            'preco'=> $request->get('preco')
            ]);
        $produto->save();
        return redirect('/produtos')->with('success', 'Foi adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);

        //selecionando todas as categorias presentes no banco
        $categorias = Categoria::all();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'=>'required',
            'categoria_id' => 'required',
            'preco' => 'required'
        ]);

        $produto = Produto::find($id);
        $produto->nome = $request->get('nome');
        $produto->categoria_id = $request->get('categoria_id');
        $produto->preco = $request->get('preco');
        $produto->save();

        return redirect('/produtos')->with('success', 'Alterado com sucesso.');        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect('/produtos')->with('success', 'Deletado com sucesso.');        //
    }

}
