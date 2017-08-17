<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposarquivosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposarquivosTable Test Case
 */
class TiposarquivosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposarquivosTable
     */
    public $Tiposarquivos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tiposarquivos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tiposarquivos') ? [] : ['className' => TiposarquivosTable::class];
        $this->Tiposarquivos = TableRegistry::get('Tiposarquivos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tiposarquivos);

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
