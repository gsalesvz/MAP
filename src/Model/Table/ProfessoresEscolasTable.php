<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProfessoresEscolas Model
 *
 * @method \App\Model\Entity\ProfessoresEscola get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProfessoresEscola newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProfessoresEscola[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProfessoresEscola|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfessoresEscola patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProfessoresEscola[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProfessoresEscola findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfessoresEscolasTable extends Table
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

        $this->setTable('professores_escolas');
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
            ->integer('professor')
            ->requirePresence('professor', 'create')
            ->notEmpty('professor');

        $validator
            ->integer('escola')
            ->requirePresence('escola', 'create')
            ->notEmpty('escola');

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
