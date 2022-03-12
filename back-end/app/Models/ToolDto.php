<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;

class ToolDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'tool';
    public $timestamps = false;
    protected $hidden = ['id'];

    protected $fillable = [
        'name'
    ];
}
