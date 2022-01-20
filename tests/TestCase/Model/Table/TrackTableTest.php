<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrackTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrackTable Test Case
 */
class TrackTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrackTable
     */
    public $Track;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.track'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Track') ? [] : ['className' => TrackTable::class];
        $this->Track = TableRegistry::get('Track', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Track);

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
