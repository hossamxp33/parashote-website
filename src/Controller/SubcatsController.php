<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subcats Controller
 *
 * @property \App\Model\Table\SubcatsTable $Subcats
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class SubcatsController extends AppController
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
            'contain' => ['Categories']
        ];
        $this->set('subcats', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['subcats']);
        
        $categories = $this->Subcats->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Subcat id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subcat = $this->Subcats->get($id, [
            'contain' => ['Categories', 'Products', 'Stores']
        ]);
        $this->set('subcat', $subcat);
        $this->set('_serialize', ['subcat']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subcat = $this->Subcats->newEntity();
        if ($this->request->is('post')) {
            $subcat = $this->Subcats->patchEntity($subcat, $this->request->data);
            if ($this->Subcats->save($subcat)) {
                $this->Flash->success(___('the subcat has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $subcat->id]);
            } else {
                $this->Flash->error(___('the subcat could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $categories = $this->Subcats->Categories->find('list', ['limit' => 200]);
        $this->set(compact('subcat', 'categories'));
        $this->set('_serialize', ['subcat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subcat id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subcat = $this->Subcats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcat = $this->Subcats->patchEntity($subcat, $this->request->data);
            if ($this->Subcats->save($subcat)) {
                $this->Flash->success(___('the subcat has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $subcat->id]);
            } else {
                $this->Flash->error(___('the subcat could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $categories = $this->Subcats->Categories->find('list', ['limit' => 200]);
        $this->set(compact('subcat', 'categories'));
        $this->set('_serialize', ['subcat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subcat id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subcat = $this->Subcats->get($id);
        
        try
        {
            if ($this->Subcats->delete($subcat)) {
                $this->Flash->success(___('the subcat has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the subcat could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the subcat could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The subcat could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Subcats->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected subcat has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected subcats have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected subcats could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected subcats could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no subcat to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Subcat id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $subcat = $this->Subcats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcat = $this->Subcats->newEntity();
            $subcat = $this->Subcats->patchEntity($subcat, $this->request->data);
            if ($this->Subcats->save($subcat)) {
                $this->Flash->success(___('the subcat has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $subcat->id]);
            } else {
                $this->Flash->error(___('the subcat could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $categories = $this->Subcats->Categories->find('list', ['limit' => 200]);
        
        $subcat->id = $id;
        $this->set(compact('subcat', 'categories'));
        $this->set('_serialize', ['subcat']);
    }
}
