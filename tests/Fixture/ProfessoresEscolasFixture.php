<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfessoresEscolasFixture
 *
 */
class ProfessoresEscolasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'professor' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'escola' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'criado' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modificado' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'professor' => ['type' => 'index', 'columns' => ['professor'], 'length' => []],
            'escola' => ['type' => 'index', 'columns' => ['escola'], 'length' => []],
            'status' => ['type' => 'index', 'columns' => ['status'], 'length' => []],
        ],
        '_constraints' => [
            'professores_escolas_ibfk_1' => ['type' => 'foreign', 'columns' => ['professor'], 'references' => ['professores', 'rf'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'professores_escolas_ibfk_2' => ['type' => 'foreign', 'columns' => ['escola'], 'references' => ['escolas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'professores_escolas_ibfk_3' => ['type' => 'foreign', 'columns' => ['status'], 'references' => ['status', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'professor' => 1,
            'escola' => 1,
            'criado' => '2017-08-17 18:02:59',
            'modificado' => '2017-08-17 18:02:59',
            'status' => 1
        ],
    ];
}
