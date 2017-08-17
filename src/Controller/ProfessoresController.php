<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Professores Controller
 *
 * @property \App\Model\Table\ProfessoresTable $Professores
 *
 * @method \App\Model\Entity\Professore[] paginate($object = null, array $settings = [])
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
        $professores = $this->paginate($this->Professores);

        $this->set(compact('professores'));
        $this->set('_serialize', ['professores']);
    }

    /**
     * View method
     *
     * @param string|null $id Professore id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $professore = $this->Professores->get($id, [
            'contain' => ['Escolas']
        ]);

        $this->set('professore', $professore);
        $this->set('_serialize', ['professore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professore = $this->Professores->newEntity();
        if ($this->request->is('post')) {
            $professore = $this->Professores->patchEntity($professore, $this->request->getData());
            if ($this->Professores->save($professore)) {
                $this->Flash->success(__('The professore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professore could not be saved. Please, try again.'));
        }
        $escolas = $this->Professores->Escolas->find('list', ['limit' => 200]);
        $this->set(compact('professore', 'escolas'));
        $this->set('_serialize', ['professore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professore = $this->Professores->get($id, [
            'contain' => ['Escolas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professore = $this->Professores->patchEntity($professore, $this->request->getData());
            if ($this->Professores->save($professore)) {
                $this->Flash->success(__('The professore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professore could not be saved. Please, try again.'));
        }
        $escolas = $this->Professores->Escolas->find('list', ['limit' => 200]);
        $this->set(compact('professore', 'escolas'));
        $this->set('_serialize', ['professore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professore = $this->Professores->get($id);
        if ($this->Professores->delete($professore)) {
            $this->Flash->success(__('The professore has been deleted.'));
        } else {
            $this->Flash->error(__('The professore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
