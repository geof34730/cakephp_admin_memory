<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProduitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProduitsTable Test Case
 */
class ProduitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProduitsTable
     */
    public $Produits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Produits') ? [] : ['className' => ProduitsTable::class];
        $this->Produits = TableRegistry::get('Produits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Produits);

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
