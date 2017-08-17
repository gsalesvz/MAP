<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professores Model
 *
 * @property \App\Model\Table\EscolasTable|\Cake\ORM\Association\BelongsToMany $Escolas
 *
 * @method \App\Model\Entity\Professore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Professore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professore findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfessoresTable extends Table
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

        $this->setTable('professores');
        $this->setDisplayField('rf');
        $this->setPrimaryKey('rf');

        $this->belongsToMany('Escolas', [
            'foreignKey' => 'professore_id',
            'targetForeignKey' => 'escola_id',
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
            ->integer('rf')
            ->allowEmpty('rf', 'create');

        $validator
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->dateTime('iniciopg')
            ->allowEmpty('iniciopg');

        $validator
            ->dateTime('nascimento')
            ->allowEmpty('nascimento');

        $validator
            ->allowEmpty('telefone');

        $validator
            ->allowEmpty('endereco');

        $validator
            ->allowEmpty('numero');

        $validator
            ->allowEmpty('complemento');

        $validator
            ->allowEmpty('bairro');

        $validator
            ->allowEmpty('cidade');

        $validator
            ->allowEmpty('estado');

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
