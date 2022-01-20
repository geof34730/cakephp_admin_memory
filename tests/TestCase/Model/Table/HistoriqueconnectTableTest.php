<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoriqueconnectTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoriqueconnectTable Test Case
 */
class HistoriqueconnectTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoriqueconnectTable
     */
    public $Historiqueconnect;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.historiqueconnect'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Historiqueconnect') ? [] : ['className' => HistoriqueconnectTable::class];
        $this->Historiqueconnect = TableRegistry::get('Historiqueconnect', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Historiqueconnect);

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
