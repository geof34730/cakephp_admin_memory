<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersinvitationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersinvitationTable Test Case
 */
class UsersinvitationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersinvitationTable
     */
    public $Usersinvitation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.usersinvitation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Usersinvitation') ? [] : ['className' => UsersinvitationTable::class];
        $this->Usersinvitation = TableRegistry::get('Usersinvitation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Usersinvitation);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
