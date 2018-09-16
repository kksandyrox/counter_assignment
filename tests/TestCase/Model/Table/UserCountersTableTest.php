<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserCountersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserCountersTable Test Case
 */
class UserCountersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserCountersTable
     */
    public $UserCounters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_counters',
        'app.users',
        'app.counters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserCounters') ? [] : ['className' => UserCountersTable::class];
        $this->UserCounters = TableRegistry::getTableLocator()->get('UserCounters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserCounters);

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
