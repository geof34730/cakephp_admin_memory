<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BazaarvoiceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BazaarvoiceTable Test Case
 */
class BazaarvoiceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BazaarvoiceTable
     */
    public $Bazaarvoice;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bazaarvoice'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bazaarvoice') ? [] : ['className' => BazaarvoiceTable::class];
        $this->Bazaarvoice = TableRegistry::get('Bazaarvoice', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bazaarvoice);

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
