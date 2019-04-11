<?php

namespace App\Repositories;

use App\Models\VisitaStatusVisita;

/**
 * Class VisitaStatusVisitaRepository
 * @package App\Repositories
 */
class VisitaStatusVisitaRepository extends BaseRepository
{
    /**
     * @var VisitaStatusVisita
     */
    public $model;
    
    /**
     * VisitaStatusVisitaRepository constructor.
     * @param VisitaStatusVisita $VisitaStatusVisita
     */
    public function __construct(VisitaStatusVisita $VisitaStatusVisita)
    {
        $this->model = $VisitaStatusVisita;
    }
}