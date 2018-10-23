<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stores Controller
 *
 * @property \App\Model\Table\StoresTable $Stores
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StoresController extends AppController
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
            'contain' => ['Cities', 'Subcats', 'Users', 'Designs', 'Templates']
        ];
        $this->set('stores', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['stores']);
        
        $cities = $this->Stores->Cities->find('list', ['limit' => 200]);
        $subcats = $this->Stores->Subcats->find('list', ['limit' => 200]);
        $users = $this->Stores->Users->find('list', ['limit' => 200]);
        $designs = $this->Stores->Designs->find('list', ['limit' => 200]);
        $templates = $this->Stores->Templates->find('list', ['limit' => 200]);
        $this->set(compact('cities', 'subcats', 'users', 'designs', 'templates'));
    }

    /**
     * View method
     *
     * @param string|null $id Store id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $store = $this->Stores->get($id, [
            'contain' => ['Cities', 'Subcats', 'Users', 'Designs', 'Templates', 'Logodesigns', 'Coupons', 'Favourite', 'Menus', 'Models', 'Photographers', 'Products', 'Storerates', 'Storesettings', 'Paymentstores']
        ]);
        $this->set('store', $store);
        $this->set('_serialize', ['store']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $store = $this->Stores->newEntity();
        if ($this->request->is('post')) {
            $store = $this->Stores->patchEntity($store, $this->request->data);
            if ($this->Stores->save($store)) {
                $this->Flash->success(___('the store has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $store->id]);
            } else {
                $this->Flash->error(___('the store could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $cities = $this->Stores->Cities->find('list', ['limit' => 200]);
        $subcats = $this->Stores->Subcats->find('list', ['limit' => 200]);
        $users = $this->Stores->Users->find('list', ['limit' => 200]);
        $designs = $this->Stores->Designs->find('list', ['limit' => 200]);
        $templates = $this->Stores->Templates->find('list', ['limit' => 200]);
        $this->set(compact('store', 'cities', 'subcats', 'users', 'designs', 'templates'));
        $this->set('_serialize', ['store']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $store = $this->Stores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Stores->patchEntity($store, $this->request->data);
            if ($this->Stores->save($store)) {
                $this->Flash->success(___('the store has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $store->id]);
            } else {
                $this->Flash->error(___('the store could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $cities = $this->Stores->Cities->find('list', ['limit' => 200]);
        $subcats = $this->Stores->Subcats->find('list', ['limit' => 200]);
        $users = $this->Stores->Users->find('list', ['limit' => 200]);
        $designs = $this->Stores->Designs->find('list', ['limit' => 200]);
        $templates = $this->Stores->Templates->find('list', ['limit' => 200]);
        $this->set(compact('store', 'cities', 'subcats', 'users', 'designs', 'templates'));
        $this->set('_serialize', ['store']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Stores->get($id);
        
        try
        {
            if ($this->Stores->delete($store)) {
                $this->Flash->success(___('the store has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the store could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the store could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The store could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Stores->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected store has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected stores have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected stores could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected stores could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no store to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Store id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $store = $this->Stores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Stores->newEntity();
            $store = $this->Stores->patchEntity($store, $this->request->data);
            if ($this->Stores->save($store)) {
                $this->Flash->success(___('the store has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $store->id]);
            } else {
                $this->Flash->error(___('the store could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $cities = $this->Stores->Cities->find('list', ['limit' => 200]);
        $subcats = $this->Stores->Subcats->find('list', ['limit' => 200]);
        $users = $this->Stores->Users->find('list', ['limit' => 200]);
        $designs = $this->Stores->Designs->find('list', ['limit' => 200]);
        $templates = $this->Stores->Templates->find('list', ['limit' => 200]);
        
        $store->id = $id;
        $this->set(compact('store', 'cities', 'subcats', 'users', 'designs', 'templates'));
        $this->set('_serialize', ['store']);
    }
}
