<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobToolDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'job_tool';
    public $timestamps = false;
    protected $hidden = ['id', 'pivot'];

    protected $fillable = [
        'job_id',
        'tool_id'
    ];

    /**
     * Define has many languages relation
     *
     * @return BelongsTo
     */
    public function tool(): BelongsTo
    {
        return $this->belongsTo(ToolDto::class, 'tool_id', 'id');
    }
}
