<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonalHistoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonalHistoryTable Test Case
 */
class PersonalHistoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonalHistoryTable
     */
    public $PersonalHistory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.personal_history',
        'app.personal_history_types',
        'app.applicants',
        'app.career_paths',
        'app.applicants_follow_posts',
        'app.applicants_has_hobbies',
        'app.hobbies',
        'app.applicants_has_skills',
        'app.skills',
        'app.appointments_has_applicants',
        'app.curriculum_vitaes',
        'app.follow',
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
        $config = TableRegistry::exists('PersonalHistory') ? [] : ['className' => 'App\Model\Table\PersonalHistoryTable'];
        $this->PersonalHistory = TableRegistry::get('PersonalHistory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonalHistory);

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
