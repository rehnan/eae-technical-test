<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;

class CompanyDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'company';
    public $timestamps = false;
    protected $hidden = ['id'];

    protected $fillable = [
        'name'
    ];
}
