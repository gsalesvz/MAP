<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tiposarquivos Model
 *
 * @method \App\Model\Entity\Tiposarquivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tiposarquivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tiposarquivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tiposarquivo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiposarquivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tiposarquivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tiposarquivo findOrCreate($search, callable $callback = null, $options = [])
 */
class TiposarquivosTable extends Table
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

        $this->setTable('tiposarquivos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        return $validator;
    }
}
