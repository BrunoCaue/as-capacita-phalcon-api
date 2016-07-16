<?php
namespace App\Produtos\Models;

/**
 * Model da tabela 'Users'
 *
 * @package App\Produtos\Models
 * @author 
 * @copyright 
 */
class Produtos extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $iProdutoId;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $sNome;

    /**
     * @Column(type="decimal", length=70, nullable=false)
     */
    public $iValor;

    /**
     * @Column(type="datetime", nullable=false)
     */
    public $dtCreated;

    /**
     * @Column(type="datetime", nullable=true)
     */
    public $dtUpdated;

    public function beforeCreate()
    {
        $this->dtCreated = (new \DateTime())->format('Y-m-d H:i:s');
        $this->dtUpdated = '0000-00-00 00:00:00';
    }

    public function beforeUpdate()
    {
        $this->dtUpdated = (new \DateTime())->format('Y-m-d H:i:s');
    }
}
