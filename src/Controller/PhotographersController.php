<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Photographers Controller
 *
 * @property \App\Model\Table\PhotographersTable $Photographers
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class PhotographersController extends AppController
{

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Alaxos.AlaxosHtml', 'Alaxos.AlaxosForm', 'Alaxos.Navbars'];

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Alaxos.Filter'];

    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stores']
        ];
        $this->set('photographers', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['photographers']);
        
        $stores = $this->Photographers->Stores->find('list', ['limit' => 200]);
        $this->set(compact('stores'));
    }

    /**
     * View method
     *
     * @param string|null $id Photographer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photographer = $this->Photographers->get($id, [
            'contain' => ['Stores']
        ]);
        $this->set('photographer', $photographer);
        $this->set('_serialize', ['photographer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $photographer = $this->Photographers->newEntity();
        if ($this->request->is('post')) {
            $photographer = $this->Photographers->patchEntity($photographer, $this->request->data);
            if ($this->Photographers->save($photographer)) {
                $this->Flash->success(___('the photographer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $photographer->id]);
            } else {
                $this->Flash->error(___('the photographer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Photographers->Stores->find('list', ['limit' => 200]);
        $this->set(compact('photographer', 'stores'));
        $this->set('_serialize', ['photographer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Photographer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photographer = $this->Photographers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photographer = $this->Photographers->patchEntity($photographer, $this->request->data);
            if ($this->Photographers->save($photographer)) {
                $this->Flash->success(___('the photographer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $photographer->id]);
            } else {
                $this->Flash->error(___('the photographer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Photographers->Stores->find('list', ['limit' => 200]);
        $this->set(compact('photographer', 'stores'));
        $this->set('_serialize', ['photographer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Photographer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photographer = $this->Photographers->get($id);
        
        try
        {
            if ($this->Photographers->delete($photographer)) {
                $this->Flash->success(___('the photographer has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the photographer could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the photographer could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The photographer could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete all method
     */
    public function delete_all() {
        $this->request->allowMethod('post', 'delete');
        
        if(isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])){
            
            $query = $this->Photographers->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected photographer has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected photographers have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected photographers could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected photographers could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no photographer to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Photographer id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $photographer = $this->Photographers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photographer = $this->Photographers->newEntity();
            $photographer = $this->Photographers->patchEntity($photographer, $this->request->data);
            if ($this->Photographers->save($photographer)) {
                $this->Flash->success(___('the photographer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $photographer->id]);
            } else {
                $this->Flash->error(___('the photographer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Photographers->Stores->find('list', ['limit' => 200]);
        
        $photographer->id = $id;
        $this->set(compact('photographer', 'stores'));
        $this->set('_serialize', ['photographer']);
    }
}
