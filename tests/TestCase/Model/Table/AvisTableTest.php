<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvisTable Test Case
 */
class AvisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AvisTable
     */
    public $Avis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.avis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Avis') ? [] : ['className' => AvisTable::class];
        $this->Avis = TableRegistry::get('Avis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Avis);

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
