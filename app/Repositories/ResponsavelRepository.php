<?php

namespace App\Repositories;

use App\Models\Responsavel;

/**
 * Class ResponsavelRepository
 * @package App\Repositories
 */
class ResponsavelRepository extends BaseRepository
{
    /**
     * @var Responsavel
     */
    public $model;
    
    /**
     * ResponsavelRepository constructor.
     * @param Responsavel $Responsavel
     */
    public function __construct(Responsavel $Responsavel)
    {
        $this->model = $Responsavel;
    }
}