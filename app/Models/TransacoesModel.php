<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Responsável pela comunicação com o banco de dados
 * @author Matheus Castro <matheuscastroweb@gmail.com>
 * @version 1.0.0
 */
class TransacoesModel extends Model
{
    //Nome da tabela. Agora é obrigatório
    protected $table = 'transacao';
    protected $primaryKey = 'id';

    //Permitir os tempos a serem inseridos atualizados
    protected $allowedFields = ['id_pedido', 'id_cliente', 'codigo_transacao', 'referencia_transacao', 'data_transacao', 'tipo_transacao', 'status_transacao', 'valor_transacao', 'url_boleto', 'lastEvent'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getTransacao($id = false)
    {
        if ($id === false) {
            //Caso queira trazer o deletado com o deletedAt preenchido
            //$this->withDeleted();
            return $this->orderBy('id', 'desc')->findAll();
        }
        return $this->find($id);
    }

    /**
     * Busca a transação pelo código de referência
     *
     * @param int $code
     * @return void
     */
    public function getTransacaoPorRef($code = null)
    {
        if ($code) {
            return $this->where('referencia_transacao', $code)->first();
        }
    }
}
