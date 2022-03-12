<?php

namespace App\Http\Controllers\Job;

use App\Models\JobDto;
use Fixtures\JobFixtures;
use Laravel\Lumen\Testing\DatabaseMigrations;
use App\Traits\JobSeederFactory;
use Symfony\Component\HttpFoundation\Response;
use TestCase;

class JobControllerGetAllTest extends TestCase
{
    use DatabaseMigrations, JobSeederFactory;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $jobSeeds = JobFixtures::getJobValidPayload();
        $this->createJobSeeds($jobSeeds);
    }

    /**
     * Test: Get All Jobs
     *
     * @return void
     */
    public function testGetAllBadRequest(): void
    {
        $this->get("/v1/jobs?level=&role=");

        $response = $this->response->json();

        $this->assertResponseStatus(Response::HTTP_BAD_REQUEST);
        $this->assertSame(data_get($response, 'level.0'), 'The level field is required.');
        $this->assertSame(data_get($response, 'role.0'), 'The role field is required.');
    }

    /**
     * Test: Get All Jobs
     *
     * @return void
     */
    public function testGetAll(): void
    {
        $this->get('v1/jobs');

        $response = $this->response->json();

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertSame(JobDto::count(), count($response));

        $this->assertSame(data_get($response, '0.id'), 1);
        $this->assertArrayHasKey('logo', data_get($response, '0'));
        $this->assertTrue(data_get($response, '0.new'));
        $this->assertTrue(data_get($response, '0.featured'));
        $this->assertIsInt(data_get($response, '0.postedAt'));
        $this->assertSame(data_get($response, '0.company'), 'Photosnap');
        $this->assertSame(data_get($response, '0.contract'), 'Full Time');
        $this->assertSame(data_get($response, '0.level'), 'Senior');
        $this->assertSame(data_get($response, '0.role'), 'Frontend');
        $this->assertSame(data_get($response, '0.languages.0'), 'HTML');
        $this->assertSame(data_get($response, '0.languages.1'), 'CSS');
        $this->assertSame(data_get($response, '0.languages.2'), 'JavaScript');
        $this->assertEmpty(data_get($response, '0.tools'));

        $this->assertSame(data_get($response, '1.id'), 2);
        $this->assertArrayHasKey('logo', data_get($response, '1'));
        $this->assertTrue(data_get($response, '1.new'));
        $this->assertTrue(data_get($response, '1.featured'));
        $this->assertIsInt(data_get($response, '1.postedAt'));
        $this->assertSame(data_get($response, '1.company'), 'Manage');
        $this->assertSame(data_get($response, '1.contract'), 'Part Time');
        $this->assertSame(data_get($response, '1.level'), 'Midweight');
        $this->assertSame(data_get($response, '1.role'), 'Fullstack');
        $this->assertSame(data_get($response, '1.languages.0'), 'Python');
        $this->assertNull(data_get($response, '1.languages.1'));
        $this->assertSame(data_get($response, '1.tools.0'), 'React');
        $this->assertNull(data_get($response, '1.tools.1'));
    }

    /**
     * Test: Get All Jobs
     *
     * @return void
     */
    public function testGetAllFilterByLevel(): void
    {
        $level = 'Senior';

        $this->get("v1/jobs?level={$level}");
        $response = $this->response->json();

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertSame(data_get($response, '0.id'), 1);
        $this->assertSame(data_get($response, '0.logo'), 'logo-in-base-64');
        $this->assertTrue(data_get($response, '0.new'));
        $this->assertTrue(data_get($response, '0.featured'));
        $this->assertIsInt(data_get($response, '0.postedAt'));
        $this->assertSame(data_get($response, '0.company'), 'Photosnap');
        $this->assertSame(data_get($response, '0.contract'), 'Full Time');
        $this->assertSame(data_get($response, '0.level'), 'Senior');
        $this->assertSame(data_get($response, '0.role'), 'Frontend');
        $this->assertSame(data_get($response, '0.languages.0'), 'HTML');
        $this->assertSame(data_get($response, '0.languages.1'), 'CSS');
        $this->assertSame(data_get($response, '0.languages.2'), 'JavaScript');
        $this->assertEmpty(data_get($response, '0.tools'));
    }

    /**
     * Test: Get All Jobs
     *
     * @return void
     */
    public function testGetAllFilterByRole(): void
    {
        $role = 'Frontend';

        $this->get("v1/jobs?role={$role}");
        $response = $this->response->json();

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertSame(data_get($response, '0.id'), 1);
        $this->assertSame(data_get($response, '0.logo'), 'logo-in-base-64');
        $this->assertTrue(data_get($response, '0.new'));
        $this->assertTrue(data_get($response, '0.featured'));
        $this->assertIsInt(data_get($response, '0.postedAt'));
        $this->assertSame(data_get($response, '0.company'), 'Photosnap');
        $this->assertSame(data_get($response, '0.contract'), 'Full Time');
        $this->assertSame(data_get($response, '0.level'), 'Senior');
        $this->assertSame(data_get($response, '0.role'), 'Frontend');
        $this->assertSame(data_get($response, '0.languages.0'), 'HTML');
        $this->assertSame(data_get($response, '0.languages.1'), 'CSS');
        $this->assertSame(data_get($response, '0.languages.2'), 'JavaScript');
        $this->assertEmpty(data_get($response, '0.tools'));
    }

    /**
     * Test: Get All Jobs
     *
     * @return void
     */
    public function testGetAllFilterByLevelAndRole(): void
    {
        $level = 'Senior';
        $role = 'Frontend';

        $this->get("v1/jobs?level={$level}&role={$role}");
        $response = $this->response->json();

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertSame(data_get($response, '0.id'), 1);
        $this->assertSame(data_get($response, '0.logo'), 'logo-in-base-64');
        $this->assertTrue(data_get($response, '0.new'));
        $this->assertTrue(data_get($response, '0.featured'));
        $this->assertIsInt(data_get($response, '0.postedAt'));
        $this->assertSame(data_get($response, '0.company'), 'Photosnap');
        $this->assertSame(data_get($response, '0.contract'), 'Full Time');
        $this->assertSame(data_get($response, '0.level'), 'Senior');
        $this->assertSame(data_get($response, '0.role'), 'Frontend');
        $this->assertSame(data_get($response, '0.languages.0'), 'HTML');
        $this->assertSame(data_get($response, '0.languages.1'), 'CSS');
        $this->assertSame(data_get($response, '0.languages.2'), 'JavaScript');
        $this->assertEmpty(data_get($response, '0.tools'));
    }

    /**
     * Test: Get All Jobs
     *
     * @return void
     */
    public function testGetAllEmptyResult(): void
    {
        $level = 'noExistentResult';
        $this->get("v1/jobs?level={$level}");
        $response = $this->response->json();

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertEmpty($response);
    }
}
