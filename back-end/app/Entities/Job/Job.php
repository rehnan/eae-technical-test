<?php

namespace App\Entities\Job;

use App\Contracts\IAggregateRoot;
use App\Contracts\IEntity;
use App\Entities\Aggregates\Company;
use App\Entities\Aggregates\Contract;
use App\Entities\Aggregates\Language;
use App\Entities\Aggregates\Level;
use App\Entities\Aggregates\Location;
use App\Entities\Aggregates\Role;
use App\Entities\Aggregates\Tool;
use App\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Job implements IAggregateRoot, IEntity
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $logo
     */
    public $logo;

    /**
     * @var boolean $new
     */
    public $new;

    /**
     * @var boolean $featured
     */
    public $featured;

    /**
     * @var string $postedAt
     */
    public $postedAt;

    /**
     * @var Company $company
     */
    public $company;

    /**
     * @var Contract $contract
     */
    public $contract;

    /**
     * @var Location $location
     */
    public $location;

    /**
     * @var Level $level
     */
    public $level;

    /**
     * @var Role
     */
    public $role;

    /**
     * @var Collection $languages
     */
    public $languages;

    /**
     * @var Collection $tools
     */
    public $tools;

    public function __construct(array $data)
    {
        $this->setId(data_get($data, 'id'));
        $this->setLogo(data_get($data, 'logo'));
        $this->setNew(data_get($data, 'new'));
        $this->setFeatured(data_get($data, 'featured'));
        $this->setPostedAt(data_get($data, 'posted_at'));
        $this->setCompany(data_get($data, 'company', []));
        $this->setContract(data_get($data, 'contract', []));
        $this->setLocation(data_get($data, 'location', []));
        $this->setLevel(data_get($data, 'level', []));
        $this->setRole(data_get($data, 'role', []));
        $this->setLanguages(data_get($data, 'languages', []));
        $this->setTools(data_get($data, 'tools', []));
    }

    /**
     * To array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'new' => (bool) $this->new,
            'featured' => (bool) $this->featured,
            'postedAt' => (Carbon::parse($this->postedAt)->timestamp * 1000), // Parse to timestamp in milliseconds
            'company' => $this->company->name,
            'contract' => $this->contract->type,
            'location' => $this->location->name,
            'level' => $this->level->name,
            'role' => $this->role->name,
            'languages' => $this->languages->pluck('name')->toArray(),
            'tools' => $this->tools->pluck('name')->toArray()
        ];
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @param string $new
     */
    public function setNew(string $new): void
    {
        $this->new = $new;
    }

    /**
     * @param string $featured
     */
    public function setFeatured(string $featured): void
    {
        $this->featured = $featured;
    }

    /**
     * @param string $postedAt
     */
    public function setPostedAt(string $postedAt): void
    {
        $this->postedAt = $postedAt;
    }

    /**
     * @param array $company
     */
    public function setCompany(array $company): void
    {
        $this->company = Factory::create(Company::class, $company);
    }

    /**
     * @param array $contract
     */
    public function setContract(array $contract): void
    {
        $this->contract = Factory::create(Contract::class, $contract);
    }

    /**
     * @param array $location
     */
    public function setLocation(array $location): void
    {
        $this->location = Factory::create(Location::class, $location);
    }

    /**
     * @param array $level
     */
    public function setLevel(array $level): void
    {
        $this->level = Factory::create(Level::class, $level);
    }

    /**
     * @param array $role
     */
    public function setRole(array $role): void
    {
        $this->role = Factory::create(Role::class, $role);
    }

    /**
     * @param array $languages
     */
    public function setLanguages(array $languages): void
    {
        $this->languages = Factory::createMany(Language::class, $languages);
    }

    /**
     * @param array $tools
     */
    public function setTools(array $tools): void
    {
        $this->tools = Factory::createMany(Tool::class, $tools);
    }
}
