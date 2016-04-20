<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonalHistoryTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonalHistoryTypesTable Test Case
 */
class PersonalHistoryTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonalHistoryTypesTable
     */
    public $PersonalHistoryTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.personal_history_types',
        'app.personal_history',
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
        $config = TableRegistry::exists('PersonalHistoryTypes') ? [] : ['className' => 'App\Model\Table\PersonalHistoryTypesTable'];
        $this->PersonalHistoryTypes = TableRegistry::get('PersonalHistoryTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonalHistoryTypes);

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
