<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CurriculumVitaesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CurriculumVitaesTable Test Case
 */
class CurriculumVitaesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CurriculumVitaesTable
     */
    public $CurriculumVitaes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.curriculum_vitaes',
        'app.applicants',
        'app.career_paths',
        'app.applicants_follow_posts',
        'app.applicants_has_hobbies',
        'app.hobbies',
        'app.applicants_has_skills',
        'app.skills',
        'app.skill_types',
        'app.appointments_has_applicants',
        'app.follow',
        'app.personal_history',
        'app.personal_history_types',
        'app.users',
        'app.groups',
        'app.feedbacks',
        'app.feedback_types',
        'app.notifications',
        'app.curriculum_vitae_templates',
        'app.posts_has_curriculum_vitaes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CurriculumVitaes') ? [] : ['className' => 'App\Model\Table\CurriculumVitaesTable'];
        $this->CurriculumVitaes = TableRegistry::get('CurriculumVitaes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CurriculumVitaes);

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
