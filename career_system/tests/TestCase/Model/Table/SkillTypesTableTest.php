<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SkillTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SkillTypesTable Test Case
 */
class SkillTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SkillTypesTable
     */
    public $SkillTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.skill_types',
        'app.skills',
        'app.applicants_has_skills',
        'app.applicants',
        'app.career_paths',
        'app.applicants_follow_posts',
        'app.applicants_has_hobbies',
        'app.hobbies',
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SkillTypes') ? [] : ['className' => 'App\Model\Table\SkillTypesTable'];
        $this->SkillTypes = TableRegistry::get('SkillTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SkillTypes);

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
