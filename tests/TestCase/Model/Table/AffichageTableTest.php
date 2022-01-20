<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AffichageTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AffichageTable Test Case
 */
class AffichageTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AffichageTable
     */
    public $Affichage;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.affichage'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Affichage') ? [] : ['className' => AffichageTable::class];
        $this->Affichage = TableRegistry::get('Affichage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Affichage);

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
