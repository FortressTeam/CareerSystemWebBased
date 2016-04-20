<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsHasHobbiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsHasHobbiesTable Test Case
 */
class ApplicantsHasHobbiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsHasHobbiesTable
     */
    public $ApplicantsHasHobbies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.notifications',
        'app.hobbies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantsHasHobbies') ? [] : ['className' => 'App\Model\Table\ApplicantsHasHobbiesTable'];
        $this->ApplicantsHasHobbies = TableRegistry::get('ApplicantsHasHobbies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantsHasHobbies);

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
