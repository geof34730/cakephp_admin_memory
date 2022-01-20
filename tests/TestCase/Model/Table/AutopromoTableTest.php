<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutopromoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutopromoTable Test Case
 */
class AutopromoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AutopromoTable
     */
    public $Autopromo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.autopromo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Autopromo') ? [] : ['className' => AutopromoTable::class];
        $this->Autopromo = TableRegistry::get('Autopromo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Autopromo);

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
