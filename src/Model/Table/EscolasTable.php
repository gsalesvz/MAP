<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escolas Model
 *
 * @property \App\Model\Table\ProfessoresTable|\Cake\ORM\Association\BelongsToMany $Professores
 *
 * @method \App\Model\Entity\Escola get($primaryKey, $options = [])
 * @method \App\Model\Entity\Escola newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Escola[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Escola|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Escola patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Escola[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Escola findOrCreate($search, callable $callback = null, $options = [])
 */
class EscolasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('escolas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Professores', [
            'foreignKey' => 'escola_id',
            'targetForeignKey' => 'professore_id',
            'joinTable' => 'professores_escolas'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('telefone');

        $validator
            ->allowEmpty('endereco');

        $validator
            ->allowEmpty('numero');

        $validator
            ->allowEmpty('bairro');

        $validator
            ->dateTime('fundacao')
            ->allowEmpty('fundacao');

        $validator
            ->dateTime('criado')
            ->requirePresence('criado', 'create')
            ->notEmpty('criado');

        $validator
            ->dateTime('modificado')
            ->requirePresence('modificado', 'create')
            ->notEmpty('modificado');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
