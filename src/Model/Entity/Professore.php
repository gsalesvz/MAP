<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Professore Entity
 *
 * @property int $rf
 * @property string $senha
 * @property string $nome
 * @property string $sexo
 * @property \Cake\I18n\FrozenTime $iniciopg
 * @property \Cake\I18n\FrozenTime $nascimento
 * @property string $telefone
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $modificado
 * @property int $status
 *
 * @property \App\Model\Entity\Escola[] $escolas
 */
class Professore extends Entity
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
        'rf' => false
    ];
}
