<?php

namespace App\Models;

use App\Contracts\IDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobDto extends Model implements IDto
{
    /**
     * Table name
     * @property string $table
     */
    protected $table = 'job';
    public $timestamps = false;
    protected $hidden = ['company_id', 'position_id', 'role_id', 'level_id', 'contract_id', 'location_id'];

    protected $fillable = [
        'company_id',
        'logo',
        'new',
        'featured',
        'position_id',
        'role_id',
        'level_id',
        'posted_at',
        'contract_id',
        'location_id',
    ];

    /**
     * Define has one company relation
     *
     * @return HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(CompanyDto::class, 'id', 'company_id');
    }

    /**
     * Define has one contract relation
     *
     * @return HasOne
     */
    public function contract(): HasOne
    {
        return $this->hasOne(ContractDto::class, 'id', 'contract_id');
    }

    /**
     * Define has one location relation
     *
     * @return HasOne
     */
    public function location(): HasOne
    {
        return $this->hasOne(LocationDto::class, 'id', 'location_id');
    }

    /**
     * Define has one level relation
     *
     * @return HasOne
     */
    public function level(): HasOne
    {
        return $this->hasOne(LevelDto::class, 'id', 'level_id');
    }

    /**
     * Define has one role relation
     *
     * @return HasOne
     */
    public function role(): HasOne
    {
        return $this->hasOne(RoleDto::class, 'id', 'role_id');
    }

    /**
     * Define belongs to many languages relation
     *
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(
            LanguageDto::class,
            JobLanguageDto::class,
            'job_id',
            'language_id'
        );
    }

    /**
     * Define belongs to many tools relation
     *
     * @return BelongsToMany
     */
    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(
            ToolDto::class,
            JobToolDto::class,
            'job_id',
            'tool_id'
        );
    }
}
