<?php
namespace App\Produtos\Models;

/**
 * Model da tabela 'Produtos'
 *
 * @package App\Produtos\Models
 * @author 
 * @copyright 
 */
class Cidades extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $iCidadeId;

    /**
     * @Column(type="string", length=10, nullable=false)
     */
    public $iProdutoId;

    /**
     * @Column(type="string", length=15, nullable=false)
     */
    public $sCidade;
}
