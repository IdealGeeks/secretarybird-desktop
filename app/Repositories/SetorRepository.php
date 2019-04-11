<?php

namespace App\Repositories;

use App\Models\Setor;

/**
 * Class SetorRepository
 * @package App\Repositories
 */
class SetorRepository extends BaseRepository
{
    /**
     * @var Setor
     */
    public $model;
    
    /**
     * SetorRepository constructor.
     * @param Setor $Setor
     */
    public function __construct(Setor $Setor)
    {
        $this->model = $Setor;
    }
}