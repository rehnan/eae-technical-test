<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobLanguageDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'job_language';
    public $timestamps = false;
    protected $hidden = ['id'];

    protected $fillable = [
        'job_id',
        'language_id'
    ];

    /**
     * Define has many languages relation
     *
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(LanguageDto::class, 'language_id', 'id');
    }
}
