<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Favourite Controller
 *
 * @property \App\Model\Table\FavouriteTable $Favourite
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class FavouriteController extends AppController
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
            'contain' => ['Users', 'Products', 'Stores']
        ];
        $this->set('favourite', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['favourite']);
        
        $users = $this->Favourite->Users->find('list', ['limit' => 200]);
        $products = $this->Favourite->Products->find('list', ['limit' => 200]);
        $stores = $this->Favourite->Stores->find('list', ['limit' => 200]);
        $this->set(compact('users', 'products', 'stores'));
    }

    /**
     * View method
     *
     * @param string|null $id Favourite id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favourite = $this->Favourite->get($id, [
            'contain' => ['Users', 'Products', 'Stores']
        ]);
        $this->set('favourite', $favourite);
        $this->set('_serialize', ['favourite']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favourite = $this->Favourite->newEntity();
        if ($this->request->is('post')) {
            $favourite = $this->Favourite->patchEntity($favourite, $this->request->data);
            if ($this->Favourite->save($favourite)) {
                $this->Flash->success(___('the favourite has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $favourite->id]);
            } else {
                $this->Flash->error(___('the favourite could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Favourite->Users->find('list', ['limit' => 200]);
        $products = $this->Favourite->Products->find('list', ['limit' => 200]);
        $stores = $this->Favourite->Stores->find('list', ['limit' => 200]);
        $this->set(compact('favourite', 'users', 'products', 'stores'));
        $this->set('_serialize', ['favourite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Favourite id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favourite = $this->Favourite->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favourite = $this->Favourite->patchEntity($favourite, $this->request->data);
            if ($this->Favourite->save($favourite)) {
                $this->Flash->success(___('the favourite has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $favourite->id]);
            } else {
                $this->Flash->error(___('the favourite could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Favourite->Users->find('list', ['limit' => 200]);
        $products = $this->Favourite->Products->find('list', ['limit' => 200]);
        $stores = $this->Favourite->Stores->find('list', ['limit' => 200]);
        $this->set(compact('favourite', 'users', 'products', 'stores'));
        $this->set('_serialize', ['favourite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Favourite id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favourite = $this->Favourite->get($id);
        
        try
        {
            if ($this->Favourite->delete($favourite)) {
                $this->Flash->success(___('the favourite has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the favourite could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the favourite could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The favourite could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Favourite->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected favourite has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected favourite have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected favourite could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected favourite could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no favourite to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Favourite id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $favourite = $this->Favourite->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favourite = $this->Favourite->newEntity();
            $favourite = $this->Favourite->patchEntity($favourite, $this->request->data);
            if ($this->Favourite->save($favourite)) {
                $this->Flash->success(___('the favourite has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $favourite->id]);
            } else {
                $this->Flash->error(___('the favourite could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Favourite->Users->find('list', ['limit' => 200]);
        $products = $this->Favourite->Products->find('list', ['limit' => 200]);
        $stores = $this->Favourite->Stores->find('list', ['limit' => 200]);
        
        $favourite->id = $id;
        $this->set(compact('favourite', 'users', 'products', 'stores'));
        $this->set('_serialize', ['favourite']);
    }
}
