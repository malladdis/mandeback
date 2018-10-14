<?php

namespace App\Repositories;

use App\Models\File;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FileRepository
 * @package App\Repositories
 * @version September 27, 2018, 8:17 pm UTC
 *
 * @method File findWithoutFail($id, $columns = ['*'])
 * @method File find($id, $columns = ['*'])
 * @method File first($columns = ['*'])
*/
class FileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
        'tag',
        'description',
        'file_path',
        'is_activity_file',
        'parent_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return File::class;
    }
}
