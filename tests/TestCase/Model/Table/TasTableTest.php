<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TasTable Test Case
 */
class TasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TasTable
     */
    public $Tas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tas') ? [] : ['className' => TasTable::class];
        $this->Tas = TableRegistry::get('Tas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tas);

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
