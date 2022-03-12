<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;

class ContractDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'contract';
    public $timestamps = false;
    protected $hidden = ['id'];

    protected $fillable = [
        'type'
    ];
}
