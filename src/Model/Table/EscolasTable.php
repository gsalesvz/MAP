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

        // Estabelece o relacionamento n para n com a tabela Professores
        $this->belongsToMany('Professores', [
            'foreignKey' => 'escola',
            'targetForeignKey' => 'professor',
            'joinTable' => 'professores_escolas'
            ]);

        // Estabelece o relacionamento 1 para n com a tabela Status
        $this->hasMany('Status', [
            'primaryKey' => 'status.id',
            'propertyName' => 'status.id'
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
            ->date('fundacao', ['format' => 'dmy'])
            ->allowEmpty('fundacao');

        $validator
            ->dateTime('criado');

        $validator
            ->dateTime('modificado');

        $validator
            ->integer('status');

        return $validator;
    }

    // Método para buscar dados completos dos status dentro do controller
    public function fetchStatus($conditions = null) {
        if (!isset($conditions))
            return $this->Status->find('all');
        else
            return $this->Status->find('all')->where($conditions);
    }

    // Método simples para buscar o nome do status, de acordo com o ID
    public function fetchStatusName($idStatus) {
        return $this->Status->get($idStatus)->status;
    }
}
