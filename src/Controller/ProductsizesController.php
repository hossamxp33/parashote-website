<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productsizes Controller
 *
 * @property \App\Model\Table\ProductsizesTable $Productsizes
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductsizesController extends AppController
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
        $this->set('productsizes', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['productsizes']);
        
        $products = $this->Productsizes->Products->find('list', ['limit' => 200]);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Productsize id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsize = $this->Productsizes->get($id, [
            'contain' => ['Products']
        ]);
        $this->set('productsize', $productsize);
        $this->set('_serialize', ['productsize']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsize = $this->Productsizes->newEntity();
        if ($this->request->is('post')) {
            $productsize = $this->Productsizes->patchEntity($productsize, $this->request->data);
            if ($this->Productsizes->save($productsize)) {
                $this->Flash->success(___('the productsize has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productsize->id]);
            } else {
                $this->Flash->error(___('the productsize could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productsizes->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsize', 'products'));
        $this->set('_serialize', ['productsize']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Productsize id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsize = $this->Productsizes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsize = $this->Productsizes->patchEntity($productsize, $this->request->data);
            if ($this->Productsizes->save($productsize)) {
                $this->Flash->success(___('the productsize has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productsize->id]);
            } else {
                $this->Flash->error(___('the productsize could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productsizes->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsize', 'products'));
        $this->set('_serialize', ['productsize']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productsize id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsize = $this->Productsizes->get($id);
        
        try
        {
            if ($this->Productsizes->delete($productsize)) {
                $this->Flash->success(___('the productsize has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the productsize could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the productsize could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The productsize could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Productsizes->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected productsize has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected productsizes have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected productsizes could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected productsizes could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no productsize to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Productsize id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $productsize = $this->Productsizes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsize = $this->Productsizes->newEntity();
            $productsize = $this->Productsizes->patchEntity($productsize, $this->request->data);
            if ($this->Productsizes->save($productsize)) {
                $this->Flash->success(___('the productsize has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productsize->id]);
            } else {
                $this->Flash->error(___('the productsize could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productsizes->Products->find('list', ['limit' => 200]);
        
        $productsize->id = $id;
        $this->set(compact('productsize', 'products'));
        $this->set('_serialize', ['productsize']);
    }
}
