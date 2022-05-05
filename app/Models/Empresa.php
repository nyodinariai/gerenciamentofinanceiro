<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\AbstractPaginator;

class Empresa extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * Define dados para Serialização
     *
     * @var array
     */
    protected $visible = ['id', 'text'];

    /**
     * Anexa dados para Serialização
     *
     * @var array
     */
    protected $appends = ['text'];

    public function movimentosEstoque(){
        return $this->hasMany(MovimentosEstoque::class);
    }

    /**
     *  The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'nome',
        'razao_social',
        'documento',
        'ie_rg',
        'nome_contato',
        'celular', 'email',
        'telefone',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
        'observacao'];


        /**
         * Retorna empresa por tipo
         *
         * @param string $tipo
         * @param integer $quantidade
         * @return AbstractPaginator
         */
    public static function todasPorTipo(string $tipo, int $quantidade=10) : AbstractPaginator{

        return self::where('tipo', $tipo)->paginate($quantidade);

    }

    public static function buscarPorNomeTipo(string $nome, string $tipo){
        
        $nome = '%' . $nome . '%';
        
        return self::where('nome', 'LIKE', $nome)
                    ->where('tipo', $tipo)
                    ->get();
    }

    /**
     * Cria o acessor chamado text para serialização
     *
     * @return void
     */
    public function getTextAttribute(): string {
        return sprintf(
            '%s (%s)',
            $this->attributes['nome'],
            $this->attributes['razao_social']
        );
    }
}
