<?php

namespace App\Repositories;

use App\Models\Empresa;

/**
 * Class EmpresaRepository
 * @package App\Repositories
 */
class EmpresaRepository extends BaseRepository
{
    /**
     * @var Empresa
     */
    public $model;
    
    /**
     * EmpresaRepository constructor.
     * @param Empresa $Empresa
     */
    public function __construct(Empresa $Empresa)
    {
        $this->model = $Empresa;
    }
}