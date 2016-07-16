<?php
namespace App\Produtos\Controllers;

use App\Controllers\RESTController;
use App\Produtos\Models\Cidade;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Produtos\Controllers
 * @author
 * @copyright 
 */
class CidadesController extends RESTController
{
    /**
     * Retorna uma lista de Produtos.
     *
     * @access public
     * @return Array Lista de Produtos.
     */
    public function getCidade()
    {
        try {
            $cidades = (new Cidade())->find(
                [
                    'conditions' => 'true ' . $this->getConditions(),
                    'columns' => $this->partialFields,
                    'limit' => $this->limit
                ]
            );

            return $cidades;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retorna um Usuário.
     *
     * @access public
     * @return Array Usuário.
     */
    public function getCidade($iCidadeId)
    {
        try {
            $cidades = (new Cidade())->findFirst(
                [
                    'conditions' => "iCidadeId = '$iCidadeId'",
                    'columns' => $this->partialFields,
                ]
            );

            return $cidades;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Adiciona um Cidade.
     *
     * @access public
     * @return Array Usuário.
     */
    public function addCidade()
    {
        try {
            $cidade = new Cidade();
            $cidade->iProdutoId = $this->di->get('request')->getPost('iProdutoId');
            $cidade->sCidade = $this->di->get('request')->getPost('sCidade');

            $cidade->saveDB();

            return $cidade;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Editar o campo de um Cidade.
     *
     * @access public
     * @return Array.
     */
    public function editCidade($iCidadeId)
    {
        try {
            $put = $this->di->get('request')->getPut();

            $cidade = (new Cidades())->findFirst($iCidadeId);

            if (false === $cidade) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $cidade->iProdutoId = isset($put['iProdutoId']) ? $put['iProdutoId'] : $cidade->iProdutoId;
            $cidade->sCidade = isset($put['sCidade']) ? $put['sCidade'] : $cidade->sCidade;

            $cidade->saveDB();

            return $cidade;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove um Cidade.
     *
     * @access public
     * @return boolean.
     */
    public function deleteCidade($iCidadeId)
    {
        try {
            $cidade = (new  Cidades())->findFirst($iCidadeId);

            if (false === $cidade) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $cidade->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
