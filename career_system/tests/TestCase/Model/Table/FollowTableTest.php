<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FollowTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FollowTable Test Case
 */
class FollowTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FollowTable
     */
    public $Follow;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.follow',
        'app.hiring_managers',
        'app.appointments',
        'app.posts',
        'app.categories',
        'app.applicants_follow_posts',
        'app.posts_has_curriculum_vitaes',
        'app.users',
        'app.groups',
        'app.feedbacks',
        'app.feedback_types',
        'app.notifications',
        'app.applicants',
        'app.majors',
        'app.applicants_has_hobbies',
        'app.hobbies',
        'app.applicants_has_skills',
        'app.skills',
        'app.skill_types',
        'app.appointments_has_applicants',
        'app.curriculum_vitaes',
        'app.curriculum_vitae_templates',
        'app.personal_history',
        'app.personal_history_types',
        'app.administrators',
        'app.logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Follow') ? [] : ['className' => 'App\Model\Table\FollowTable'];
        $this->Follow = TableRegistry::get('Follow', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Follow);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
