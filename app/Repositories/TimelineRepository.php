<?php

namespace App\Repositories;

use App\Timeline;
use InfyOm\Generator\Common\BaseRepository;

class TimelineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username' => 'like',
        'type',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Timeline::class;
    }
}
