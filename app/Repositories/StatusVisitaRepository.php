<?php

namespace App\Repositories;

use App\Models\StatusVisita;

/**
 * Class StatusVisitaRepository
 * @package App\Repositories
 */
class StatusVisitaRepository extends BaseRepository
{
    /**
     * @var StatusVisita
     */
    public $model;
    
    /**
     * StatusVisitaRepository constructor.
     * @param StatusVisita $StatusVisita
     */
    public function __construct(StatusVisita $StatusVisita)
    {
        $this->model = $StatusVisita;
    }
}