<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsHasCurriculumVitaesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostsHasCurriculumVitaesTable Test Case
 */
class PostsHasCurriculumVitaesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsHasCurriculumVitaesTable
     */
    public $PostsHasCurriculumVitaes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.posts_has_curriculum_vitaes',
        'app.posts',
        'app.categories',
        'app.hiring_managers',
        'app.appointments',
        'app.follow',
        'app.applicants',
        'app.majors',
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
        $config = TableRegistry::exists('PostsHasCurriculumVitaes') ? [] : ['className' => 'App\Model\Table\PostsHasCurriculumVitaesTable'];
        $this->PostsHasCurriculumVitaes = TableRegistry::get('PostsHasCurriculumVitaes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PostsHasCurriculumVitaes);

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
