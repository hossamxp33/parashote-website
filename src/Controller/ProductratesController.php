<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productrates Controller
 *
 * @property \App\Model\Table\ProductratesTable $Productrates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductratesController extends AppController
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
            'contain' => ['Products']
        ];
        $this->set('productrates', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['productrates']);
        
        $products = $this->Productrates->Products->find('list', ['limit' => 200]);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Productrate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productrate = $this->Productrates->get($id, [
            'contain' => ['Products']
        ]);
        $this->set('productrate', $productrate);
        $this->set('_serialize', ['productrate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productrate = $this->Productrates->newEntity();
        if ($this->request->is('post')) {
            $productrate = $this->Productrates->patchEntity($productrate, $this->request->data);
            if ($this->Productrates->save($productrate)) {
                $this->Flash->success(___('the productrate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productrate->id]);
            } else {
                $this->Flash->error(___('the productrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productrates->Products->find('list', ['limit' => 200]);
        $this->set(compact('productrate', 'products'));
        $this->set('_serialize', ['productrate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Productrate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productrate = $this->Productrates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productrate = $this->Productrates->patchEntity($productrate, $this->request->data);
            if ($this->Productrates->save($productrate)) {
                $this->Flash->success(___('the productrate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productrate->id]);
            } else {
                $this->Flash->error(___('the productrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productrates->Products->find('list', ['limit' => 200]);
        $this->set(compact('productrate', 'products'));
        $this->set('_serialize', ['productrate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productrate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productrate = $this->Productrates->get($id);
        
        try
        {
            if ($this->Productrates->delete($productrate)) {
                $this->Flash->success(___('the productrate has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the productrate could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the productrate could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The productrate could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Productrates->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected productrate has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected productrates have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected productrates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected productrates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no productrate to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Productrate id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $productrate = $this->Productrates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productrate = $this->Productrates->newEntity();
            $productrate = $this->Productrates->patchEntity($productrate, $this->request->data);
            if ($this->Productrates->save($productrate)) {
                $this->Flash->success(___('the productrate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productrate->id]);
            } else {
                $this->Flash->error(___('the productrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productrates->Products->find('list', ['limit' => 200]);
        
        $productrate->id = $id;
        $this->set(compact('productrate', 'products'));
        $this->set('_serialize', ['productrate']);
    }
}
