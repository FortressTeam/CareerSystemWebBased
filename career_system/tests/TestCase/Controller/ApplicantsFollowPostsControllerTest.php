<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ApplicantsFollowPostsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ApplicantsFollowPostsController Test Case
 */
class ApplicantsFollowPostsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
