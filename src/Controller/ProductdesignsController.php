<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productdesigns Controller
 *
 * @property \App\Model\Table\ProductdesignsTable $Productdesigns
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductdesignsController extends AppController
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
            'contain' => ['StoreSettings', 'ProductTemplates']
        ];
        $this->set('productdesigns', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['productdesigns']);
        
        $storeSettings = $this->Productdesigns->StoreSettings->find('list', ['limit' => 200]);
        $productTemplates = $this->Productdesigns->ProductTemplates->find('list', ['limit' => 200]);
        $this->set(compact('storeSettings', 'productTemplates'));
    }

    /**
     * View method
     *
     * @param string|null $id Productdesign id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productdesign = $this->Productdesigns->get($id, [
            'contain' => ['StoreSettings', 'ProductTemplates']
        ]);
        $this->set('productdesign', $productdesign);
        $this->set('_serialize', ['productdesign']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productdesign = $this->Productdesigns->newEntity();
        if ($this->request->is('post')) {
            $productdesign = $this->Productdesigns->patchEntity($productdesign, $this->request->data);
            if ($this->Productdesigns->save($productdesign)) {
                $this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
                $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $storeSettings = $this->Productdesigns->StoreSettings->find('list', ['limit' => 200]);
        $productTemplates = $this->Productdesigns->ProductTemplates->find('list', ['limit' => 200]);
        $this->set(compact('productdesign', 'storeSettings', 'productTemplates'));
        $this->set('_serialize', ['productdesign']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Productdesign id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productdesign = $this->Productdesigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productdesign = $this->Productdesigns->patchEntity($productdesign, $this->request->data);
            if ($this->Productdesigns->save($productdesign)) {
                $this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
                $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $storeSettings = $this->Productdesigns->StoreSettings->find('list', ['limit' => 200]);
        $productTemplates = $this->Productdesigns->ProductTemplates->find('list', ['limit' => 200]);
        $this->set(compact('productdesign', 'storeSettings', 'productTemplates'));
        $this->set('_serialize', ['productdesign']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productdesign id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productdesign = $this->Productdesigns->get($id);
        
        try
        {
            if ($this->Productdesigns->delete($productdesign)) {
                $this->Flash->success(___('the productdesign has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the productdesign could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the productdesign could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The productdesign could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Productdesigns->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected productdesign has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected productdesigns have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected productdesigns could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected productdesigns could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no productdesign to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Productdesign id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $productdesign = $this->Productdesigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productdesign = $this->Productdesigns->newEntity();
            $productdesign = $this->Productdesigns->patchEntity($productdesign, $this->request->data);
            if ($this->Productdesigns->save($productdesign)) {
                $this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
                $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $storeSettings = $this->Productdesigns->StoreSettings->find('list', ['limit' => 200]);
        $productTemplates = $this->Productdesigns->ProductTemplates->find('list', ['limit' => 200]);
        
        $productdesign->id = $id;
        $this->set(compact('productdesign', 'storeSettings', 'productTemplates'));
        $this->set('_serialize', ['productdesign']);
    }
}
