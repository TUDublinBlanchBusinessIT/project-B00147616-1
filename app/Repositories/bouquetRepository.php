<?php

namespace App\Repositories;

use App\Models\bouquet;
use App\Repositories\BaseRepository;

/**
 * Class bouquetRepository
 * @package App\Repositories
 * @version April 26, 2025, 6:45 pm UTC
*/

class bouquetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'productid',
        'flowertype',
        'size'
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
        return bouquet::class;
    }
}
