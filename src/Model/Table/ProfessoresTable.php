<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

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

        // Estabelece o relacionamento n para n com a tabela Escolas
        $this->belongsToMany('Escolas', [
            'foreignKey' => 'professorid',
            'targetForeignKey' => 'escolaid',
            'joinTable' => 'professores_escolas'
            ]);

        // Estabelece o relacionamento 1 para n com a tabela Status
        $this->hasMany('Status', [
            'primaryKey' => 'status.id',
            'propertyName' => 'status.id'
            ]);

        $this->hasMany('ProfessoresEscolas', [
            'primaryKey' => 'id'
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
        ->notEmpty('rf');

        $validator
        ->requirePresence('senha', 'create')
        ->notEmpty('senha')
        ->lengthBetween('senha', ['6', '20'], 'A senha deve ter entre 6 e 20 caracteres!');

        $validator
        ->requirePresence('confirme', 'create')
        ->notEmpty('confirme')
        ->sameAs('confirme', 'senha', 'As senhas não estão iguais!');

        $validator
        ->requirePresence('nome', 'create')
        ->notEmpty('nome');

        $validator
        ->requirePresence('sexo', 'create')
        ->notEmpty('sexo');

        $validator
        ->date('iniciopg', ['format' => 'dmy'])
        ->allowEmpty('iniciopg');

        $validator
        ->date('nascimento', ['format' => 'dmy'])
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
        ->dateTime('criado');

        $validator
        ->dateTime('modificado');

        $validator
        ->integer('status');

        return $validator;
    }

    // Método para buscar dados completos das escolas dentro do controller
    public function fetchEscolas($conditions = null) {
        if (!isset($conditions))
            return $this->Escolas->find('all');
        else
            return $this->Escolas->find('all')->where($conditions);
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

    // Método para buscar as escolas do professor, na tabela professores_escolas
    public function fetchEscolasProfessor($conditions = null) {
        if (!isset($conditions))
            return $this->ProfessoresEscolas->find('all');
        else
            return $this->ProfessoresEscolas->find('all')->where($conditions);
    }

    // Método para salvar escolas do professor
    public function saveEscolas($rf, $escola) {
        $novaEscola = $this->ProfessoresEscolas->find('all')->where(['professorid' => $rf, 'escolaid' => $escola])->first();
        
        // Se não encontrar nenhuma escola vinculada ao professor, executa esse trecho do código
        if (!isset($novaEscola)) {
            $novaEscola = $this->ProfessoresEscolas->newEntity();
            $novaEscola->professorid = $rf;
            $novaEscola->escolaid = $escola;

            $this->ProfessoresEscolas->save($novaEscola);
        }
        // Se encontrar escola vinculada ao professor, mas ela estiver inativa, muda o status para ativo
        elseif ($novaEscola->status == $this->fetchStatus(['status' => 'Inativo'])->first()->id) {
            $novaEscola->status = $this->fetchStatus(['status' => 'Ativo'])->first()->id;
            $novaEscola->modificado = Time::now();

            $this->ProfessoresEscolas->save($novaEscola);
        }
    }

    // Método para deletar escolas do professor
    public function deleteEscolas($rf, $escola) {
        $deletarEscola = $this->ProfessoresEscolas->find('all')->where(['professorid' => $rf, 'escolaid' => $escola])->first();
        $deletarEscola->status = $this->fetchStatus(['status' => 'Inativo'])->first()->id;
        $deletarEscola->modificado = Time::now();

        $this->ProfessoresEscolas->save($deletarEscola);
    }
}
