<?php

namespace App\Traits;

use App\Models\CompanyDto;
use App\Models\ContractDto;
use App\Models\JobDto;
use App\Models\JobLanguageDto;
use App\Models\JobToolDto;
use App\Models\LanguageDto;
use App\Models\LevelDto;
use App\Models\LocationDto;
use App\Models\PositionDto;
use App\Models\RoleDto;
use App\Models\ToolDto;
use Illuminate\Support\Carbon;

trait JobSeederFactory
{
    /**
     * Create job seeds
     *
     * @param array $seeds
     *
     * @return void
     */

    public function createJobSeeds(array $seeds): void
    {
        foreach ($seeds as $seed) {
            $company = CompanyDto::firstOrCreate(['name'  => $seed['company']]);
            $position = PositionDto::firstOrCreate(['name'  => $seed['position']]);
            $role = RoleDto::firstOrCreate(['name'  => $seed['role']]);
            $level = LevelDto::firstOrCreate(['name'  => $seed['level']]);
            $contract = ContractDto::firstOrCreate(['type'  => $seed['contract']]);
            $location = LocationDto::firstOrCreate(['name'  => $seed['location']]);

            $job = JobDto::create([
                'company_id'  => $company->id,
                'logo'  => data_get($seed, 'logo'),
                'new'  => data_get($seed, 'new'),
                'featured'  => data_get($seed, 'featured'),
                'position_id'  => $position->id,
                'role_id'  => $role->id,
                'level_id'  => $level->id,
                'posted_at'  => Carbon::now(),
                'contract_id'  => $contract->id,
                'location_id'  => $location->id
            ]);

            collect($seed['languages'])->each(function ($languageName) use ($job) {
                $language = LanguageDto::firstOrCreate(['name' => $languageName]);
                JobLanguageDto::firstOrCreate(['job_id' => $job->id, 'language_id' => $language->id]);
            });

            collect($seed['tools'])->map(function ($toolName) use ($job) {
                $tool = ToolDto::firstOrCreate(['name' => $toolName]);
                JobToolDto::firstOrCreate(['job_id' => $job->id, 'tool_id' => $tool->id]);
            });

            $job->save();
        }
    }
}
