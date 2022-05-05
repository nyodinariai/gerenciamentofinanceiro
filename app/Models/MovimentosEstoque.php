<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentosEstoque extends Model
{
    use HasFactory;

    /**
     * Define o nome da tabela
     *
     * @var string
     */
    protected $table = 'movimentos_estoque';

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
