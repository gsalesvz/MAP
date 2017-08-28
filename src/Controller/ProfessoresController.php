<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Utility\Security;

/**
 * Professores Controller
 *
 * @property \App\Model\Table\ProfessoresTable $Professores
 *
 * @method \App\Model\Entity\Professor[] paginate($object = null, array $settings = [])
 */
class ProfessoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // Busca o id do status inativo, para poder restringir professores a serem exibidos
        $statusInativo = $this->Professores->fetchStatus(['status' => 'Inativo'])->first()->id;

        // Busca todos os professores que não estão inativos, e faz a paginação
        $professores = $this->paginate($this->Professores->find('all')->where(['status !=' => $statusInativo]));

        // Envia os dados para a View
        $this->set(compact('professores', 'status'));
        $this->set('_serialize', ['professores', 'status']);
    }

    /**
     * View method
     *
     * @param string|null $id Professor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // Busca o professor e as escolas relacionadas ao professor
        $professor = $this->Professores->get($id, ['contain' => ['Escolas']]);

        // Busca o nome do status deste professor, especificamente
        $status = $this->Professores->fetchStatusName($professor->status);

        // Converte o tipo de dados de data do Cake para um tipo de fácil leitura para o usuário
        if (isset($professor->nascimento)) {
            $professor->nascimento = date('d/m/Y', strtotime($professor->nascimento));
        }

        if (isset($professor->iniciopg)) {
            $professor->iniciopg = date('d/m/Y', strtotime($professor->iniciopg));
        }

        // Envia os dados para a View
        $this->set(compact('professor','status'));
        $this->set('_serialize', ['professor', 'status']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professor = $this->Professores->newEntity();
        if ($this->request->is('post')) {
            $professor = $this->Professores->patchEntity($professor, $this->request->getData());
            
            // Checa se há alguma informação nos campos de nascimento e início na prefeitura e converte em tipo de dados do Cake
            if (isset($professor->nascimento)) {
                $professor->nascimento = Time::createFromFormat('d/m/Y', $professor->nascimento);
            }

            if (isset($professor->iniciopg)) {
                $professor->iniciopg = Time::createFromFormat('d/m/Y', $professor->iniciopg);
            }

            // Aplica hash para a senha
            $professor->senha = Security::hash($professor->senha, 'sha256');

            if ($this->Professores->save($professor)) {
                $this->Flash->success(__('O professor foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O professor não pôde ser salvo. Por favor, tente novamente.'));
        }

        // Envia os dados para a View
        $this->set('professor', $professor);
        $this->set('_serialize', ['professor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professor = $this->Professores->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professores->patchEntity($professor, $this->request->getData());
            
            // Checa se há alguma informação nos campos de nascimento e início na prefeitura e converte em tipo de dados do Cake
            if (isset($professor->nascimento)) {
                $professor->nascimento = Time::createFromFormat('d/m/Y', $professor->nascimento);
            }

            if (isset($professor->iniciopg)) {
                $professor->iniciopg = Time::createFromFormat('d/m/Y', $professor->iniciopg);
            }

            // Atualiza o campo modificado
            $professor->modificado = Time::now();

            if ($this->Professores->save($professor)) {
                $this->Flash->success(__('O professor foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O professor não pôde ser salvo. Por favor, tente novamente.'));
        }
        /*$escolas = $this->Professores->fetchEscolas();
        foreach ($escolas as $escola) {
            $options[$escola->id] = $escola->nome;
        }*/

        // Converte o tipo de dados de data do Cake para um tipo de fácil leitura para o usuário
        if (isset($professor->nascimento)) {
            $professor->nascimento = date('d/m/Y', strtotime($professor->nascimento));
        }

        if (isset($professor->iniciopg)) {
            $professor->iniciopg = date('d/m/Y', strtotime($professor->iniciopg));
        }

        // Envia os dados para a View
        $this->set(compact('professor'));
        $this->set('_serialize', ['professor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post']);
        $professor = $this->Professores->get($id);

        // Ao invés de propriamente deletar o professor, aqui se muda o Status no registro
        $professor->status = $this->Professores->fetchStatus(['status' => 'Inativo'])->first()->id;
        if ($this->Professores->save($professor)) {
            $this->Flash->success(__('O professor foi deletado.'));
        } else {
            $this->Flash->error(__('O professor não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
