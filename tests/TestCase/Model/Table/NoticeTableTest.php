<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NoticeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NoticeTable Test Case
 */
class NoticeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NoticeTable
     */
    public $Notice;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Notice',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Notice') ? [] : ['className' => NoticeTable::class];
        $this->Notice = TableRegistry::getTableLocator()->get('Notice', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notice);

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
