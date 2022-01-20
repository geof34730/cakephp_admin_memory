<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhraseavisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhraseavisTable Test Case
 */
class PhraseavisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhraseavisTable
     */
    public $Phraseavis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phraseavis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Phraseavis') ? [] : ['className' => PhraseavisTable::class];
        $this->Phraseavis = TableRegistry::get('Phraseavis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phraseavis);

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
