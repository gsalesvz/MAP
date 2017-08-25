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
        $escolas = $this->paginate($this->Escolas);

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
        $escola = $this->Escolas->get($id, [
            'contain' => ['Professores']
        ]);

        $this->set('escola', $escola);
        $this->set('_serialize', ['escola']);
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
            if (isset($escola->fundacao)) {
                $escola->fundacao = Time::createFromFormat('d/m/Y', $escola->fundacao);
            }
            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('A escola foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A escola não pôde ser salva. Por favor, tente novamente.'));
        }
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
        $escola = $this->Escolas->get($id, [
            'contain' => ['Professores']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escola = $this->Escolas->patchEntity($escola, $this->request->getData());
            if (isset($escola->fundacao)) {
                $escola->fundacao = Time::createFromFormat('d/m/Y', $escola->fundacao);
            }
            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('A escola foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A escola não pôde ser salva. Por favor, tente novamente.'));
        }
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
        $this->request->allowMethod(['post', 'delete']);
        $escola = $this->Escolas->get($id);
        if ($this->Escolas->delete($escola)) {
            $this->Flash->success(__('A escola foi deletada.'));
        } else {
            $this->Flash->error(__('A escola não pôde ser deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
