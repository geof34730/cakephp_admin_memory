<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModerateurautmatiqueTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModerateurautmatiqueTable Test Case
 */
class ModerateurautmatiqueTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModerateurautmatiqueTable
     */
    public $Moderateurautmatique;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.moderateurautmatique'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Moderateurautmatique') ? [] : ['className' => ModerateurautmatiqueTable::class];
        $this->Moderateurautmatique = TableRegistry::get('Moderateurautmatique', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Moderateurautmatique);

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
