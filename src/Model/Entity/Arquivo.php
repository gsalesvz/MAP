<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arquivo Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property int $tipo
 * @property int $disciplina
 * @property int $serie
 * @property string $caminhofisico
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $modificado
 * @property int $professor
 * @property int $status
 */
class Arquivo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
