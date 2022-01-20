<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TranslationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TranslationTable Test Case
 */
class TranslationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TranslationTable
     */
    public $Translation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.translation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Translation') ? [] : ['className' => TranslationTable::class];
        $this->Translation = TableRegistry::get('Translation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Translation);

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
