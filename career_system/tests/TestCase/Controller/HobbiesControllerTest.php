<?php
namespace App\Test\TestCase\Controller;

use App\Controller\HobbiesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\HobbiesController Test Case
 */
class HobbiesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hobbies',
        'app.applicants_has_hobbies',
        'app.applicants',
        'app.career_paths',
        'app.applicants_follow_posts',
        'app.applicants_has_skills',
        'app.skills',
        'app.skill_types',
        'app.appointments_has_applicants',
        'app.curriculum_vitaes',
        'app.follow',
        'app.personal_history',
        'app.personal_history_types',
        'app.users',
        'app.groups',
        'app.feedbacks',
        'app.feedback_types',
        'app.notifications'
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
