<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessoresEscolasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessoresEscolasTable Test Case
 */
class ProfessoresEscolasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfessoresEscolasTable
     */
    public $ProfessoresEscolas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.professores_escolas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProfessoresEscolas') ? [] : ['className' => ProfessoresEscolasTable::class];
        $this->ProfessoresEscolas = TableRegistry::get('ProfessoresEscolas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProfessoresEscolas);

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
