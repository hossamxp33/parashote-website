<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productfavs Controller
 *
 * @property \App\Model\Table\ProductfavsTable $Productfavs
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductfavsController extends AppController
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
        $this->set('productfavs', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['productfavs']);
        
        $products = $this->Productfavs->Products->find('list', ['limit' => 200]);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Productfav id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productfav = $this->Productfavs->get($id, [
            'contain' => ['Products']
        ]);
        $this->set('productfav', $productfav);
        $this->set('_serialize', ['productfav']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productfav = $this->Productfavs->newEntity();
        if ($this->request->is('post')) {
            $productfav = $this->Productfavs->patchEntity($productfav, $this->request->data);
            if ($this->Productfavs->save($productfav)) {
                $this->Flash->success(___('the productfav has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productfav->id]);
            } else {
                $this->Flash->error(___('the productfav could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productfavs->Products->find('list', ['limit' => 200]);
        $this->set(compact('productfav', 'products'));
        $this->set('_serialize', ['productfav']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Productfav id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productfav = $this->Productfavs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productfav = $this->Productfavs->patchEntity($productfav, $this->request->data);
            if ($this->Productfavs->save($productfav)) {
                $this->Flash->success(___('the productfav has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productfav->id]);
            } else {
                $this->Flash->error(___('the productfav could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productfavs->Products->find('list', ['limit' => 200]);
        $this->set(compact('productfav', 'products'));
        $this->set('_serialize', ['productfav']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productfav id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productfav = $this->Productfavs->get($id);
        
        try
        {
            if ($this->Productfavs->delete($productfav)) {
                $this->Flash->success(___('the productfav has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the productfav could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the productfav could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The productfav could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Productfavs->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected productfav has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected productfavs have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected productfavs could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected productfavs could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no productfav to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Productfav id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $productfav = $this->Productfavs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productfav = $this->Productfavs->newEntity();
            $productfav = $this->Productfavs->patchEntity($productfav, $this->request->data);
            if ($this->Productfavs->save($productfav)) {
                $this->Flash->success(___('the productfav has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productfav->id]);
            } else {
                $this->Flash->error(___('the productfav could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productfavs->Products->find('list', ['limit' => 200]);
        
        $productfav->id = $id;
        $this->set(compact('productfav', 'products'));
        $this->set('_serialize', ['productfav']);
    }
}
