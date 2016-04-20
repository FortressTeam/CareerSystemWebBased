<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MajorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MajorsTable Test Case
 */
class MajorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MajorsTable
     */
    public $Majors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.majors',
        'app.applicants',
        'app.applicants_follow_posts',
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
        $config = TableRegistry::exists('Majors') ? [] : ['className' => 'App\Model\Table\MajorsTable'];
        $this->Majors = TableRegistry::get('Majors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Majors);

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
