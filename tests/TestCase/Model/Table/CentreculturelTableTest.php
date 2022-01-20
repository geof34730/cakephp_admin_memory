<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentreculturelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentreculturelTable Test Case
 */
class CentreculturelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CentreculturelTable
     */
    public $Centreculturel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.centreculturel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Centreculturel') ? [] : ['className' => CentreculturelTable::class];
        $this->Centreculturel = TableRegistry::get('Centreculturel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Centreculturel);

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
