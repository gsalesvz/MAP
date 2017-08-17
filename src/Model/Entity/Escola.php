<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Escola Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $telefone
 * @property string $endereco
 * @property string $numero
 * @property string $bairro
 * @property \Cake\I18n\FrozenTime $fundacao
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $modificado
 * @property int $status
 *
 * @property \App\Model\Entity\Professore[] $professores
 */
class Escola extends Entity
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
