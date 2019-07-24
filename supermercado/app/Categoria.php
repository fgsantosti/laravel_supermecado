<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Produto;

class Categoria extends Model
{
    //propriedade preenchivel 
    protected $fillable = [
      'nome',
      'descricao'
    ];


    public function produtos()
    {
    	return $this->hasMany(Produto::class);
    }
}
