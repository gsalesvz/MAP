<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArquivosFixture
 *
 */
class ArquivosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'titulo' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'descricao' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'tipo' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'disciplina' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'serie' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'caminhofisico' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'criado' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modificado' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'professor' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'tipo' => ['type' => 'index', 'columns' => ['tipo'], 'length' => []],
            'disciplina' => ['type' => 'index', 'columns' => ['disciplina'], 'length' => []],
            'serie' => ['type' => 'index', 'columns' => ['serie'], 'length' => []],
            'professor' => ['type' => 'index', 'columns' => ['professor'], 'length' => []],
            'status' => ['type' => 'index', 'columns' => ['status'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'arquivos_ibfk_1' => ['type' => 'foreign', 'columns' => ['tipo'], 'references' => ['tiposarquivos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arquivos_ibfk_2' => ['type' => 'foreign', 'columns' => ['disciplina'], 'references' => ['disciplinas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arquivos_ibfk_3' => ['type' => 'foreign', 'columns' => ['serie'], 'references' => ['series', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arquivos_ibfk_4' => ['type' => 'foreign', 'columns' => ['professor'], 'references' => ['professores', 'rf'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arquivos_ibfk_5' => ['type' => 'foreign', 'columns' => ['status'], 'references' => ['status', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'titulo' => 'Lorem ipsum dolor sit amet',
            'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tipo' => 1,
            'disciplina' => 1,
            'serie' => 1,
            'caminhofisico' => 'Lorem ipsum dolor sit amet',
            'criado' => '2017-08-17 18:02:59',
            'modificado' => '2017-08-17 18:02:59',
            'professor' => 1,
            'status' => 1
        ],
    ];
}
