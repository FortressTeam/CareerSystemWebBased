<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HiringManagersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HiringManagersTable Test Case
 */
class HiringManagersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HiringManagersTable
     */
    public $HiringManagers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hiring_managers',
        'app.appointments',
        'app.follow',
        'app.posts',
        'app.categories',
        'app.applicants_follow_posts',
        'app.posts_has_curriculum_vitaes',
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
        $config = TableRegistry::exists('HiringManagers') ? [] : ['className' => 'App\Model\Table\HiringManagersTable'];
        $this->HiringManagers = TableRegistry::get('HiringManagers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HiringManagers);

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
