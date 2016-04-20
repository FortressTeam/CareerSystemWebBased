<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsFollowPostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsFollowPostsTable Test Case
 */
class ApplicantsFollowPostsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsFollowPostsTable
     */
    public $ApplicantsFollowPosts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicants_follow_posts',
        'app.applicants',
        'app.majors',
        'app.applicants_has_hobbies',
        'app.hobbies',
        'app.applicants_has_skills',
        'app.skills',
        'app.skill_types',
        'app.appointments_has_applicants',
        'app.curriculum_vitaes',
        'app.users',
        'app.groups',
        'app.feedbacks',
        'app.feedback_types',
        'app.notifications',
        'app.hiring_managers',
        'app.appointments',
        'app.follow',
        'app.posts',
        'app.categories',
        'app.posts_has_curriculum_vitaes',
        'app.administrators',
        'app.logs',
        'app.curriculum_vitae_templates',
        'app.personal_history',
        'app.personal_history_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantsFollowPosts') ? [] : ['className' => 'App\Model\Table\ApplicantsFollowPostsTable'];
        $this->ApplicantsFollowPosts = TableRegistry::get('ApplicantsFollowPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantsFollowPosts);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
