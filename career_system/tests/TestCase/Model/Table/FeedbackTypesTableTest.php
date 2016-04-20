<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeedbackTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeedbackTypesTable Test Case
 */
class FeedbackTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FeedbackTypesTable
     */
    public $FeedbackTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.feedback_types',
        'app.feedbacks',
        'app.users',
        'app.groups',
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
        $config = TableRegistry::exists('FeedbackTypes') ? [] : ['className' => 'App\Model\Table\FeedbackTypesTable'];
        $this->FeedbackTypes = TableRegistry::get('FeedbackTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FeedbackTypes);

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
