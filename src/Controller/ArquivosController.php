<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Arquivos Controller
 *
 * @property \App\Model\Table\ArquivosTable $Arquivos
 *
 * @method \App\Model\Entity\Arquivo[] paginate($object = null, array $settings = [])
 */
class ArquivosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $arquivos = $this->paginate($this->Arquivos);

        $this->set(compact('arquivos'));
        $this->set('_serialize', ['arquivos']);
    }

    /**
     * View method
     *
     * @param string|null $id Arquivo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $arquivo = $this->Arquivos->get($id, [
            'contain' => []
        ]);

        $this->set('arquivo', $arquivo);
        $this->set('_serialize', ['arquivo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $arquivo = $this->Arquivos->newEntity();
        if ($this->request->is('post')) {
            $arquivo = $this->Arquivos->patchEntity($arquivo, $this->request->getData());
            if ($this->Arquivos->save($arquivo)) {
                $this->Flash->success(__('The arquivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arquivo could not be saved. Please, try again.'));
        }
        $this->set(compact('arquivo'));
        $this->set('_serialize', ['arquivo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Arquivo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $arquivo = $this->Arquivos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $arquivo = $this->Arquivos->patchEntity($arquivo, $this->request->getData());
            if ($this->Arquivos->save($arquivo)) {
                $this->Flash->success(__('The arquivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arquivo could not be saved. Please, try again.'));
        }
        $this->set(compact('arquivo'));
        $this->set('_serialize', ['arquivo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Arquivo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $arquivo = $this->Arquivos->get($id);
        if ($this->Arquivos->delete($arquivo)) {
            $this->Flash->success(__('The arquivo has been deleted.'));
        } else {
            $this->Flash->error(__('The arquivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
