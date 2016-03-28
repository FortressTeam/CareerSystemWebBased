<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CareerPathsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CareerPathsTable Test Case
 */
class CareerPathsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CareerPathsTable
     */
    public $CareerPaths;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.career_paths',
        'app.applicants',
        'app.applicants_follow_posts',
        'app.applicants_has_hobbies',
        'app.applicants_has_skills',
        'app.appointments_has_applicants',
        'app.curriculum_vitaes',
        'app.follow',
        'app.personal_history',
        'app.users',
        'app.groups',
        'app.feedbacks',
        'app.feedback_types',
        'app.notifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CareerPaths') ? [] : ['className' => 'App\Model\Table\CareerPathsTable'];
        $this->CareerPaths = TableRegistry::get('CareerPaths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CareerPaths);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
