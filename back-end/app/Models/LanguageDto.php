<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;

class LanguageDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'language';
    public $timestamps = false;
    protected $hidden = ['id', 'pivot'];

    protected $fillable = [
        'name'
    ];
}
