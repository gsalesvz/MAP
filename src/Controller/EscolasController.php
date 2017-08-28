<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Escolas Controller
 *
 * @property \App\Model\Table\EscolasTable $Escolas
 *
 * @method \App\Model\Entity\Escola[] paginate($object = null, array $settings = [])
 */
class EscolasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // Busca o id do status inativo, para poder restringir escolas a serem exibidas
        $statusInativo = $this->Escolas->fetchStatus(['status' => 'Inativo'])->first()->id;

        // Busca todas as escolas que não estão inativas, e faz a paginação
        $escolas = $this->paginate($this->Escolas->find('all')->where(['status !=' => $statusInativo]));

        // Envia os dados para a View        
        $this->set(compact('escolas'));
        $this->set('_serialize', ['escolas']);
    }

    /**
     * View method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // Busca a escola
        $escola = $this->Escolas->get($id);

        // Busca o nome do status desta escola, especificamente
        $status = $this->Escolas->fetchStatusName($escola->status);

        // Converte o tipo de dados de data do Cake para um tipo de fácil leitura para o usuário
        if (isset($escola->fundacao)) {
            $escola->fundacao = date('d/m/Y', strtotime($escola->fundacao));
        }

        // Envia os dados para a View
        $this->set(compact('escola', 'status'));
        $this->set('_serialize', ['escola', 'status']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escola = $this->Escolas->newEntity();
        if ($this->request->is('post')) {
            $escola = $this->Escolas->patchEntity($escola, $this->request->getData());

            // Checa se há alguma informação no campo fundação e converte em tipo de dados do Cake
            if (isset($escola->fundacao)) {
                $escola->fundacao = Time::createFromFormat('d/m/Y', $escola->fundacao);
            }

            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('A escola foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A escola não pôde ser salva. Por favor, tente novamente.'));
        }

        // Envia dados para a View
        $this->set(compact('escola'));
        $this->set('_serialize', ['escola']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escola = $this->Escolas->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $escola = $this->Escolas->patchEntity($escola, $this->request->getData());

            // Checa se há alguma informação no campo fundação e converte em tipo de dados do Cake
            if (isset($escola->fundacao)) {
                $escola->fundacao = Time::createFromFormat('d/m/Y', $escola->fundacao);
            }

            // Atualiza o campo modificado
            $escola->modificado = Time::now();

            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('A escola foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A escola não pôde ser salva. Por favor, tente novamente.'));
        }

        // Converte o tipo de dados de data do Cake para um tipo de fácil leitura para o usuário
        if (isset($escola->fundacao)) {
            $escola->fundacao = date('d/m/Y', strtotime($escola->fundacao));
        }

        // Envia os dados para a View
        $this->set(compact('escola'));
        $this->set('_serialize', ['escola']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post']);
        $escola = $this->Escolas->get($id);

        // Ao invés de propriamente deletar a escola, aqui se muda o Status no registro
        $escola->status = $this->Escolas->fetchStatus(['status' => 'Inativo'])->first()->id;
        if ($this->Escolas->save($escola)) {
            $this->Flash->success(__('A escola foi deletada.'));
        } else {
            $this->Flash->error(__('A escola não pôde ser deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
