<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuteursrealisateursartistesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuteursrealisateursartistesTable Test Case
 */
class AuteursrealisateursartistesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuteursrealisateursartistesTable
     */
    public $Auteursrealisateursartistes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auteursrealisateursartistes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Auteursrealisateursartistes') ? [] : ['className' => AuteursrealisateursartistesTable::class];
        $this->Auteursrealisateursartistes = TableRegistry::get('Auteursrealisateursartistes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Auteursrealisateursartistes);

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
