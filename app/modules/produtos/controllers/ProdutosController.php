<?php
namespace App\Produtos\Controllers;

use App\Controllers\RESTController;
use App\Produtos\Models\Produtos;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Produtos\Controllers
 * @author 
 * @copyright
 */
class ProdutosController extends RESTController
{
    /**
     * Retorna uma lista de Produtos.
     *
     * @access public
     * @return Array Lista de Produtos.
     */
    public function getProdutos()
    {
        try {
            $query = new \Phalcon\Mvc\Model\Query\Builder();
            $query->addFrom('\App\Produtos\Models\Produtos', 'Produtos')
                ->columns(
                    [
                        'Produtos.iProdutoId',
                        'Produtos.sNome',
                        'Produtos.iValor',
                        'Cidades.iCidadeId',
                        'Cidades.iProdutoId as iCidadeProdutoId',
                        'Cidades.sCidade',
                    ]
                )
                ->leftJoin('\App\Produtos\Models\Cidades', 'Cidades.iProdutoId = Produtos.iProdutoId', 'Cidades')
                ->where('true');
                //var_dump($query
                //->getQuery()->getSql()['sql']);
                //die;

            return $query
                ->getQuery()
                ->execute();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retorna um Produto.
     *
     * @access public
     * @return Array Produto.
     */
    public function getProduto($iProdutoId)
    {
        try {
            $produtos = (new Produtos())->findFirst(
                [
                    'conditions' => "iProdutoId = '$iProdutoId'",
                    'columns' => $this->partialFields,
                ]
            );

            return $produtos;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Adiciona um Produto.
     *
     * @access public
     * @return Array Produto.
     */
    public function addProduto()
    {
        try {
            $produtosModel = new Produtos();
            $produtosModel->sNome = $this->di->get('request')->getPost('sNome');
            $produtosModel->iValor = $this->di->get('request')->getPost('iValor');

            $produtosModel->saveDB();

            //var_dump($produtosModel);
            //die;

            return $produtosModel;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Editar o campo de um Produto.
     *
     * @access public
     * @return Array.
     */
    public function editProduto($iProdutoId)
    {
        try {
            $put = $this->di->get('request')->getPut();

            $produto = (new Produtos())->findFirst($iProdutoId);

            if (false === $produto) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $produto->sNome = isset($put['sNome']) ? $put['sNome'] : $produto->sNome;
            $produto->iValor = isset($put['iValor']) ? $put['iValor'] : $produto->iValor;

            $produto->saveDB();

            return $produto;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove um produto.
     *
     * @access public
     * @return boolean.
     */
    public function deleteProduto($iProdutoId)
    {
        try {
            $produto = (new Produtos())->findFirst($iProdutoId);

            if (false === $produto) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $produto->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
