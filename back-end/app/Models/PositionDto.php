<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;

class PositionDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'position';
    public $timestamps = false;
    protected $hidden = ['id'];

    protected $fillable = [
        'name'
    ];
}
