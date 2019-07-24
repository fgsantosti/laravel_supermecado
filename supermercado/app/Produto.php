<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Categoria;

class Produto extends Model
{
    //propriedade preenchivel 
    protected $fillable = [
      'nome',
      'preco',
      'categoria_id'
    ];

    public function categoria()
    {
      //return $this->belongsTo('App\Categoria', 'foreign_key');
      //return $this->hasMany(Categoria::class);
      return $this->belongsTo('App\Categoria');

    }
}
