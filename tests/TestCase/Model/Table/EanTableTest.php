<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EanTable Test Case
 */
class EanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EanTable
     */
    public $Ean;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ean'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ean') ? [] : ['className' => EanTable::class];
        $this->Ean = TableRegistry::get('Ean', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ean);

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
