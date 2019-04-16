<?php

namespace App\Repositories;

use App\Models\TipoVisita;

/**
 * Class TipoVisitaRepository
 * @package App\Repositories
 */
class TipoVisitaRepository extends BaseRepository
{
    /**
     * @var TipoVisita
     */
    public $model;
    
    /**
     * TipoVisitaRepository constructor.
     * @param TipoVisita $TipoVisita
     */
    public function __construct(TipoVisita $TipoVisita)
    {
        $this->model = $TipoVisita;
    }
}