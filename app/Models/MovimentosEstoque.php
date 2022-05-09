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

    protected $fillable = [
        'produto_id',
        'quantidade',
        'valor',
        'tipo',
        'empresa_id'
    ];

    protected $with = ['produto'];

    public function produto(){
        return $this->belongsTo(Produto::class)->withTrashed();
    }

    public function saldo(){
        return $this->morphOne(Saldo::class, 'movimento');
    }
}
