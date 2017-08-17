<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arquivos Model
 *
 * @method \App\Model\Entity\Arquivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Arquivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Arquivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arquivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo findOrCreate($search, callable $callback = null, $options = [])
 */
class ArquivosTable extends Table
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

        $this->setTable('arquivos');
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
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->integer('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->integer('disciplina')
            ->requirePresence('disciplina', 'create')
            ->notEmpty('disciplina');

        $validator
            ->integer('serie')
            ->requirePresence('serie', 'create')
            ->notEmpty('serie');

        $validator
            ->requirePresence('caminhofisico', 'create')
            ->notEmpty('caminhofisico');

        $validator
            ->dateTime('criado')
            ->requirePresence('criado', 'create')
            ->notEmpty('criado');

        $validator
            ->dateTime('modificado')
            ->requirePresence('modificado', 'create')
            ->notEmpty('modificado');

        $validator
            ->integer('professor')
            ->requirePresence('professor', 'create')
            ->notEmpty('professor');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
