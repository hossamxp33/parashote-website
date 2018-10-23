<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productcolors Controller
 *
 * @property \App\Model\Table\ProductcolorsTable $Productcolors
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductcolorsController extends AppController
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
        $this->set('productcolors', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['productcolors']);
        
        $products = $this->Productcolors->Products->find('list', ['limit' => 200]);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Productcolor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productcolor = $this->Productcolors->get($id, [
            'contain' => ['Products']
        ]);
        $this->set('productcolor', $productcolor);
        $this->set('_serialize', ['productcolor']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productcolor = $this->Productcolors->newEntity();
        if ($this->request->is('post')) {
            $productcolor = $this->Productcolors->patchEntity($productcolor, $this->request->data);
            if ($this->Productcolors->save($productcolor)) {
                $this->Flash->success(___('the productcolor has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productcolor->id]);
            } else {
                $this->Flash->error(___('the productcolor could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productcolors->Products->find('list', ['limit' => 200]);
        $this->set(compact('productcolor', 'products'));
        $this->set('_serialize', ['productcolor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Productcolor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productcolor = $this->Productcolors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productcolor = $this->Productcolors->patchEntity($productcolor, $this->request->data);
            if ($this->Productcolors->save($productcolor)) {
                $this->Flash->success(___('the productcolor has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productcolor->id]);
            } else {
                $this->Flash->error(___('the productcolor could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productcolors->Products->find('list', ['limit' => 200]);
        $this->set(compact('productcolor', 'products'));
        $this->set('_serialize', ['productcolor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productcolor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productcolor = $this->Productcolors->get($id);
        
        try
        {
            if ($this->Productcolors->delete($productcolor)) {
                $this->Flash->success(___('the productcolor has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the productcolor could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the productcolor could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The productcolor could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Productcolors->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected productcolor has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected productcolors have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected productcolors could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected productcolors could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no productcolor to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Productcolor id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $productcolor = $this->Productcolors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productcolor = $this->Productcolors->newEntity();
            $productcolor = $this->Productcolors->patchEntity($productcolor, $this->request->data);
            if ($this->Productcolors->save($productcolor)) {
                $this->Flash->success(___('the productcolor has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productcolor->id]);
            } else {
                $this->Flash->error(___('the productcolor could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productcolors->Products->find('list', ['limit' => 200]);
        
        $productcolor->id = $id;
        $this->set(compact('productcolor', 'products'));
        $this->set('_serialize', ['productcolor']);
    }
}
