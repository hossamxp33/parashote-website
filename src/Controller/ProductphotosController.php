<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productphotos Controller
 *
 * @property \App\Model\Table\ProductphotosTable $Productphotos
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductphotosController extends AppController
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
        $this->set('productphotos', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['productphotos']);
        
        $products = $this->Productphotos->Products->find('list', ['limit' => 200]);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Productphoto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productphoto = $this->Productphotos->get($id, [
            'contain' => ['Products']
        ]);
        $this->set('productphoto', $productphoto);
        $this->set('_serialize', ['productphoto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productphoto = $this->Productphotos->newEntity();
        if ($this->request->is('post')) {
            $productphoto = $this->Productphotos->patchEntity($productphoto, $this->request->data);
            if ($this->Productphotos->save($productphoto)) {
                $this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
                $this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productphotos->Products->find('list', ['limit' => 200]);
        $this->set(compact('productphoto', 'products'));
        $this->set('_serialize', ['productphoto']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Productphoto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productphoto = $this->Productphotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productphoto = $this->Productphotos->patchEntity($productphoto, $this->request->data);
            if ($this->Productphotos->save($productphoto)) {
                $this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
                $this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productphotos->Products->find('list', ['limit' => 200]);
        $this->set(compact('productphoto', 'products'));
        $this->set('_serialize', ['productphoto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productphoto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productphoto = $this->Productphotos->get($id);
        
        try
        {
            if ($this->Productphotos->delete($productphoto)) {
                $this->Flash->success(___('the productphoto has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the productphoto could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the productphoto could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The productphoto could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Productphotos->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected productphoto has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected productphotos have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected productphotos could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected productphotos could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no productphoto to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Productphoto id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $productphoto = $this->Productphotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productphoto = $this->Productphotos->newEntity();
            $productphoto = $this->Productphotos->patchEntity($productphoto, $this->request->data);
            if ($this->Productphotos->save($productphoto)) {
                $this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
                $this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $products = $this->Productphotos->Products->find('list', ['limit' => 200]);
        
        $productphoto->id = $id;
        $this->set(compact('productphoto', 'products'));
        $this->set('_serialize', ['productphoto']);
    }
}
