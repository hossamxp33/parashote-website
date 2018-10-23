<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Models Controller
 *
 * @property \App\Model\Table\ModelsTable $Models
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ModelsController extends AppController
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
            'contain' => ['Stores']
        ];
        $this->set('models', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['models']);
        
        $stores = $this->Models->Stores->find('list', ['limit' => 200]);
        $this->set(compact('stores'));
    }

    /**
     * View method
     *
     * @param string|null $id Model id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $model = $this->Models->get($id, [
            'contain' => ['Stores']
        ]);
        $this->set('model', $model);
        $this->set('_serialize', ['model']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $model = $this->Models->newEntity();
        if ($this->request->is('post')) {
            $model = $this->Models->patchEntity($model, $this->request->data);
            if ($this->Models->save($model)) {
                $this->Flash->success(___('the model has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $model->id]);
            } else {
                $this->Flash->error(___('the model could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Models->Stores->find('list', ['limit' => 200]);
        $this->set(compact('model', 'stores'));
        $this->set('_serialize', ['model']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Model id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $model = $this->Models->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Models->patchEntity($model, $this->request->data);
            if ($this->Models->save($model)) {
                $this->Flash->success(___('the model has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $model->id]);
            } else {
                $this->Flash->error(___('the model could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Models->Stores->find('list', ['limit' => 200]);
        $this->set(compact('model', 'stores'));
        $this->set('_serialize', ['model']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Model id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $model = $this->Models->get($id);
        
        try
        {
            if ($this->Models->delete($model)) {
                $this->Flash->success(___('the model has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the model could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the model could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The model could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Models->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected model has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected models have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected models could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected models could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no model to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Model id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $model = $this->Models->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Models->newEntity();
            $model = $this->Models->patchEntity($model, $this->request->data);
            if ($this->Models->save($model)) {
                $this->Flash->success(___('the model has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $model->id]);
            } else {
                $this->Flash->error(___('the model could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Models->Stores->find('list', ['limit' => 200]);
        
        $model->id = $id;
        $this->set(compact('model', 'stores'));
        $this->set('_serialize', ['model']);
    }
}
