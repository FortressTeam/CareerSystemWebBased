<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CurriculumVitaeTemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CurriculumVitaeTemplatesTable Test Case
 */
class CurriculumVitaeTemplatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CurriculumVitaeTemplatesTable
     */
    public $CurriculumVitaeTemplates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.curriculum_vitae_templates',
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
        $config = TableRegistry::exists('CurriculumVitaeTemplates') ? [] : ['className' => 'App\Model\Table\CurriculumVitaeTemplatesTable'];
        $this->CurriculumVitaeTemplates = TableRegistry::get('CurriculumVitaeTemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CurriculumVitaeTemplates);

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
