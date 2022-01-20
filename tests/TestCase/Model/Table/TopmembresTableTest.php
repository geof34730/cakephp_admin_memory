<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopmembresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopmembresTable Test Case
 */
class TopmembresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TopmembresTable
     */
    public $Topmembres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.topmembres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Topmembres') ? [] : ['className' => TopmembresTable::class];
        $this->Topmembres = TableRegistry::get('Topmembres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Topmembres);

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
