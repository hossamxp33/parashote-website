<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deliveryrates Controller
 *
 * @property \App\Model\Table\DeliveryratesTable $Deliveryrates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class DeliveryratesController extends AppController
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
            'contain' => ['Users']
        ];
        $this->set('deliveryrates', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['deliveryrates']);
        
        $users = $this->Deliveryrates->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id Deliveryrate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryrate = $this->Deliveryrates->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('deliveryrate', $deliveryrate);
        $this->set('_serialize', ['deliveryrate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryrate = $this->Deliveryrates->newEntity();
        if ($this->request->is('post')) {
            $deliveryrate = $this->Deliveryrates->patchEntity($deliveryrate, $this->request->data);
            if ($this->Deliveryrates->save($deliveryrate)) {
                $this->Flash->success(___('the deliveryrate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $deliveryrate->id]);
            } else {
                $this->Flash->error(___('the deliveryrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Deliveryrates->Users->find('list', ['limit' => 200]);
        $this->set(compact('deliveryrate', 'users'));
        $this->set('_serialize', ['deliveryrate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deliveryrate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryrate = $this->Deliveryrates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryrate = $this->Deliveryrates->patchEntity($deliveryrate, $this->request->data);
            if ($this->Deliveryrates->save($deliveryrate)) {
                $this->Flash->success(___('the deliveryrate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $deliveryrate->id]);
            } else {
                $this->Flash->error(___('the deliveryrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Deliveryrates->Users->find('list', ['limit' => 200]);
        $this->set(compact('deliveryrate', 'users'));
        $this->set('_serialize', ['deliveryrate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deliveryrate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryrate = $this->Deliveryrates->get($id);
        
        try
        {
            if ($this->Deliveryrates->delete($deliveryrate)) {
                $this->Flash->success(___('the deliveryrate has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the deliveryrate could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the deliveryrate could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The deliveryrate could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Deliveryrates->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected deliveryrate has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected deliveryrates have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected deliveryrates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected deliveryrates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no deliveryrate to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Deliveryrate id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $deliveryrate = $this->Deliveryrates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryrate = $this->Deliveryrates->newEntity();
            $deliveryrate = $this->Deliveryrates->patchEntity($deliveryrate, $this->request->data);
            if ($this->Deliveryrates->save($deliveryrate)) {
                $this->Flash->success(___('the deliveryrate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $deliveryrate->id]);
            } else {
                $this->Flash->error(___('the deliveryrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Deliveryrates->Users->find('list', ['limit' => 200]);
        
        $deliveryrate->id = $id;
        $this->set(compact('deliveryrate', 'users'));
        $this->set('_serialize', ['deliveryrate']);
    }
}
