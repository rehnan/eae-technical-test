<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;

class LocationDto extends Model implements IDto
{

    /**
     * Table name
     * @property string $table
     */
    protected $table = 'location';
    public $timestamps = false;
    protected $hidden = ['id'];

    protected $fillable = [
        'name'
    ];
}
