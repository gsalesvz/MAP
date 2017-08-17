<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tiposarquivos Controller
 *
 * @property \App\Model\Table\TiposarquivosTable $Tiposarquivos
 *
 * @method \App\Model\Entity\Tiposarquivo[] paginate($object = null, array $settings = [])
 */
class TiposarquivosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tiposarquivos = $this->paginate($this->Tiposarquivos);

        $this->set(compact('tiposarquivos'));
        $this->set('_serialize', ['tiposarquivos']);
    }

    /**
     * View method
     *
     * @param string|null $id Tiposarquivo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiposarquivo = $this->Tiposarquivos->get($id, [
            'contain' => []
        ]);

        $this->set('tiposarquivo', $tiposarquivo);
        $this->set('_serialize', ['tiposarquivo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiposarquivo = $this->Tiposarquivos->newEntity();
        if ($this->request->is('post')) {
            $tiposarquivo = $this->Tiposarquivos->patchEntity($tiposarquivo, $this->request->getData());
            if ($this->Tiposarquivos->save($tiposarquivo)) {
                $this->Flash->success(__('The tiposarquivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tiposarquivo could not be saved. Please, try again.'));
        }
        $this->set(compact('tiposarquivo'));
        $this->set('_serialize', ['tiposarquivo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tiposarquivo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiposarquivo = $this->Tiposarquivos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiposarquivo = $this->Tiposarquivos->patchEntity($tiposarquivo, $this->request->getData());
            if ($this->Tiposarquivos->save($tiposarquivo)) {
                $this->Flash->success(__('The tiposarquivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tiposarquivo could not be saved. Please, try again.'));
        }
        $this->set(compact('tiposarquivo'));
        $this->set('_serialize', ['tiposarquivo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tiposarquivo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposarquivo = $this->Tiposarquivos->get($id);
        if ($this->Tiposarquivos->delete($tiposarquivo)) {
            $this->Flash->success(__('The tiposarquivo has been deleted.'));
        } else {
            $this->Flash->error(__('The tiposarquivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
