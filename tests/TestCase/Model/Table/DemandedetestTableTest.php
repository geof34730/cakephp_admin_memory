<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DemandedetestTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DemandedetestTable Test Case
 */
class DemandedetestTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DemandedetestTable
     */
    public $Demandedetest;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.demandedetest'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Demandedetest') ? [] : ['className' => DemandedetestTable::class];
        $this->Demandedetest = TableRegistry::get('Demandedetest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Demandedetest);

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
