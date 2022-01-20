<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LastcronTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LastcronTable Test Case
 */
class LastcronTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LastcronTable
     */
    public $Lastcron;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lastcron'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Lastcron') ? [] : ['className' => LastcronTable::class];
        $this->Lastcron = TableRegistry::get('Lastcron', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lastcron);

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
