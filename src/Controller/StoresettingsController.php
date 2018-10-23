<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Storesettings Controller
 *
 * @property \App\Model\Table\StoresettingsTable $Storesettings
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StoresettingsController extends AppController
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
            'contain' => ['Stores', 'Payments', 'Designs']
        ];
        $this->set('storesettings', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['storesettings']);
        
        $stores = $this->Storesettings->Stores->find('list', ['limit' => 200]);
        $payments = $this->Storesettings->Payments->find('list', ['limit' => 200]);
        $designs = $this->Storesettings->Designs->find('list', ['limit' => 200]);
        $this->set(compact('stores', 'payments', 'designs'));
    }

    /**
     * View method
     *
     * @param string|null $id Storesetting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesetting = $this->Storesettings->get($id, [
            'contain' => ['Stores', 'Payments', 'Designs']
        ]);
        $this->set('storesetting', $storesetting);
        $this->set('_serialize', ['storesetting']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesetting = $this->Storesettings->newEntity();
        if ($this->request->is('post')) {
            $storesetting = $this->Storesettings->patchEntity($storesetting, $this->request->data);
            if ($this->Storesettings->save($storesetting)) {
                $this->Flash->success(___('the storesetting has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $storesetting->id]);
            } else {
                $this->Flash->error(___('the storesetting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Storesettings->Stores->find('list', ['limit' => 200]);
        $payments = $this->Storesettings->Payments->find('list', ['limit' => 200]);
        $designs = $this->Storesettings->Designs->find('list', ['limit' => 200]);
        $this->set(compact('storesetting', 'stores', 'payments', 'designs'));
        $this->set('_serialize', ['storesetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Storesetting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesetting = $this->Storesettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesetting = $this->Storesettings->patchEntity($storesetting, $this->request->data);
            if ($this->Storesettings->save($storesetting)) {
                $this->Flash->success(___('the storesetting has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $storesetting->id]);
            } else {
                $this->Flash->error(___('the storesetting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Storesettings->Stores->find('list', ['limit' => 200]);
        $payments = $this->Storesettings->Payments->find('list', ['limit' => 200]);
        $designs = $this->Storesettings->Designs->find('list', ['limit' => 200]);
        $this->set(compact('storesetting', 'stores', 'payments', 'designs'));
        $this->set('_serialize', ['storesetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Storesetting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesetting = $this->Storesettings->get($id);
        
        try
        {
            if ($this->Storesettings->delete($storesetting)) {
                $this->Flash->success(___('the storesetting has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the storesetting could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the storesetting could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The storesetting could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Storesettings->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected storesetting has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected storesettings have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected storesettings could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected storesettings could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no storesetting to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Storesetting id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $storesetting = $this->Storesettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesetting = $this->Storesettings->newEntity();
            $storesetting = $this->Storesettings->patchEntity($storesetting, $this->request->data);
            if ($this->Storesettings->save($storesetting)) {
                $this->Flash->success(___('the storesetting has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $storesetting->id]);
            } else {
                $this->Flash->error(___('the storesetting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Storesettings->Stores->find('list', ['limit' => 200]);
        $payments = $this->Storesettings->Payments->find('list', ['limit' => 200]);
        $designs = $this->Storesettings->Designs->find('list', ['limit' => 200]);
        
        $storesetting->id = $id;
        $this->set(compact('storesetting', 'stores', 'payments', 'designs'));
        $this->set('_serialize', ['storesetting']);
    }
}
