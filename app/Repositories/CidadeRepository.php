<?php

namespace App\Repositories;

use App\Models\Cidade;
use App\Repositories\BaseRepository;

/**
 * Class CidadeRepository
 * @package App\Repositories
 * @version April 6, 2020, 5:00 pm UTC
*/

class CidadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'uf',
        'n_habitantes'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cidade::class;
    }
}
