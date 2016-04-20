<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsHasSkillsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsHasSkillsTable Test Case
 */
class ApplicantsHasSkillsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsHasSkillsTable
     */
    public $ApplicantsHasSkills;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicants_has_skills',
        'app.applicants',
        'app.career_paths',
        'app.applicants_follow_posts',
        'app.applicants_has_hobbies',
        'app.appointments_has_applicants',
        'app.curriculum_vitaes',
        'app.follow',
        'app.personal_history',
        'app.users',
        'app.groups',
        'app.feedbacks',
        'app.feedback_types',
        'app.notifications',
        'app.skills'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantsHasSkills') ? [] : ['className' => 'App\Model\Table\ApplicantsHasSkillsTable'];
        $this->ApplicantsHasSkills = TableRegistry::get('ApplicantsHasSkills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantsHasSkills);

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
