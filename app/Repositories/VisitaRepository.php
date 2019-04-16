<?php

namespace App\Repositories;

use App\Models\Visita;

/**
 * Class VisitaRepository
 * @package App\Repositories
 */
class VisitaRepository extends BaseRepository
{
    /**
     * @var Visita
     */
    public $model;
    
    /**
     * VisitaRepository constructor.
     * @param Visita $Visita
     */
    public function __construct(Visita $Visita)
    {
        $this->model = $Visita;
    }
}