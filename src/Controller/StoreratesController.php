<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Storerates Controller
 *
 * @property \App\Model\Table\StoreratesTable $Storerates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StoreratesController extends AppController
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
            'contain' => ['Users', 'Stores']
        ];
        $this->set('storerates', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['storerates']);
        
        $users = $this->Storerates->Users->find('list', ['limit' => 200]);
        $stores = $this->Storerates->Stores->find('list', ['limit' => 200]);
        $this->set(compact('users', 'stores'));
    }

    /**
     * View method
     *
     * @param string|null $id Storerate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storerate = $this->Storerates->get($id, [
            'contain' => ['Users', 'Stores']
        ]);
        $this->set('storerate', $storerate);
        $this->set('_serialize', ['storerate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storerate = $this->Storerates->newEntity();
        if ($this->request->is('post')) {
            $storerate = $this->Storerates->patchEntity($storerate, $this->request->data);
            if ($this->Storerates->save($storerate)) {
                $this->Flash->success(___('the storerate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $storerate->id]);
            } else {
                $this->Flash->error(___('the storerate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Storerates->Users->find('list', ['limit' => 200]);
        $stores = $this->Storerates->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storerate', 'users', 'stores'));
        $this->set('_serialize', ['storerate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Storerate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storerate = $this->Storerates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storerate = $this->Storerates->patchEntity($storerate, $this->request->data);
            if ($this->Storerates->save($storerate)) {
                $this->Flash->success(___('the storerate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $storerate->id]);
            } else {
                $this->Flash->error(___('the storerate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Storerates->Users->find('list', ['limit' => 200]);
        $stores = $this->Storerates->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storerate', 'users', 'stores'));
        $this->set('_serialize', ['storerate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Storerate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storerate = $this->Storerates->get($id);
        
        try
        {
            if ($this->Storerates->delete($storerate)) {
                $this->Flash->success(___('the storerate has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the storerate could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the storerate could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The storerate could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Storerates->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected storerate has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected storerates have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected storerates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected storerates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no storerate to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Storerate id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $storerate = $this->Storerates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storerate = $this->Storerates->newEntity();
            $storerate = $this->Storerates->patchEntity($storerate, $this->request->data);
            if ($this->Storerates->save($storerate)) {
                $this->Flash->success(___('the storerate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $storerate->id]);
            } else {
                $this->Flash->error(___('the storerate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Storerates->Users->find('list', ['limit' => 200]);
        $stores = $this->Storerates->Stores->find('list', ['limit' => 200]);
        
        $storerate->id = $id;
        $this->set(compact('storerate', 'users', 'stores'));
        $this->set('_serialize', ['storerate']);
    }
}
