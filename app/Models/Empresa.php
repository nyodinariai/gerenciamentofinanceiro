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
         * @param string $busca
         * @param integer $quantidade
         * @return AbstractPaginator
         */
    public static function todasPorTipo(string $tipo, string $busca, int $quantidade=10) : AbstractPaginator{

        return self::where('tipo', $tipo)
                    ->where(function($q) use($busca) {
                        $q->orWhere('nome', 'LIKE', "%$busca%")
                            ->orWhere('razao_social', 'LIKE', "%$busca%")
                            ->orWhere('nome_contato', 'LIKE', "%$busca%");
                    })
                    ->paginate($quantidade);

    }


    /**
     * Buscar por nome e tipo
     *
     * @param string $nome
     * @param string $tipo
     * @return void
     */
    public static function buscarPorNomeTipo(string $nome, string $tipo){

        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)
                    ->where('tipo', $tipo)
                    ->get();
    }

    /**
     * Buscar por nome e tipo
     *
     * @param string $nome
     * @return void
     */
    public static function buscarPorNome(string $nome){

        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)->get();
    }

    public static function buscaPorId(int $id){
        return self::with(['movimentosEstoque' => function($query){
            $query->take(5);
        },
        'movimentosEstoque.produto' => function ($q){
            $q->withTrashed();
        }])
        ->findOrfail($id);
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
