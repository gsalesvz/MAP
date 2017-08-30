<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProfessoresEscolas Controller
 *
 * @property \App\Model\Table\ProfessoresEscolasTable $ProfessoresEscolas
 *
 * @method \App\Model\Entity\ProfessoresEscola[] paginate($object = null, array $settings = [])
 */
class ProfessoresEscolasController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professoresEscola = $this->ProfessoresEscolas->newEntity();
        if ($this->request->is('post')) {
            $professoresEscola = $this->ProfessoresEscolas->patchEntity($professoresEscola, $this->request->getData());
            if ($this->ProfessoresEscolas->save($professoresEscola)) {
                $this->Flash->success(__('The professores escola has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professores escola could not be saved. Please, try again.'));
        }
        $this->set(compact('professoresEscola'));
        $this->set('_serialize', ['professoresEscola']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professores Escola id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professoresEscola = $this->ProfessoresEscolas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professoresEscola = $this->ProfessoresEscolas->patchEntity($professoresEscola, $this->request->getData());
            if ($this->ProfessoresEscolas->save($professoresEscola)) {
                $this->Flash->success(__('The professores escola has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professores escola could not be saved. Please, try again.'));
        }
        $this->set(compact('professoresEscola'));
        $this->set('_serialize', ['professoresEscola']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professores Escola id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professoresEscola = $this->ProfessoresEscolas->get($id);
        if ($this->ProfessoresEscolas->delete($professoresEscola)) {
            $this->Flash->success(__('The professores escola has been deleted.'));
        } else {
            $this->Flash->error(__('The professores escola could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
