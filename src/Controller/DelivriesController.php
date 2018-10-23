<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Delivries Controller
 *
 * @property \App\Model\Table\DelivriesTable $Delivries
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class DelivriesController extends AppController
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
            'contain' => ['Personals']
        ];
        $this->set('delivries', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['delivries']);
        
        $personals = $this->Delivries->Personals->find('list', ['limit' => 200]);
        $this->set(compact('personals'));
    }

    /**
     * View method
     *
     * @param string|null $id Delivry id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $delivry = $this->Delivries->get($id, [
            'contain' => ['Personals', 'Orders']
        ]);
        $this->set('delivry', $delivry);
        $this->set('_serialize', ['delivry']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $delivry = $this->Delivries->newEntity();
        if ($this->request->is('post')) {
            $delivry = $this->Delivries->patchEntity($delivry, $this->request->data);
            if ($this->Delivries->save($delivry)) {
                $this->Flash->success(___('the delivry has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $delivry->id]);
            } else {
                $this->Flash->error(___('the delivry could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $personals = $this->Delivries->Personals->find('list', ['limit' => 200]);
        $this->set(compact('delivry', 'personals'));
        $this->set('_serialize', ['delivry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivry id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $delivry = $this->Delivries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $delivry = $this->Delivries->patchEntity($delivry, $this->request->data);
            if ($this->Delivries->save($delivry)) {
                $this->Flash->success(___('the delivry has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $delivry->id]);
            } else {
                $this->Flash->error(___('the delivry could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $personals = $this->Delivries->Personals->find('list', ['limit' => 200]);
        $this->set(compact('delivry', 'personals'));
        $this->set('_serialize', ['delivry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivry id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $delivry = $this->Delivries->get($id);
        
        try
        {
            if ($this->Delivries->delete($delivry)) {
                $this->Flash->success(___('the delivry has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the delivry could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the delivry could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The delivry could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Delivries->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected delivry has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected delivries have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected delivries could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected delivries could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no delivry to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Delivry id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $delivry = $this->Delivries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $delivry = $this->Delivries->newEntity();
            $delivry = $this->Delivries->patchEntity($delivry, $this->request->data);
            if ($this->Delivries->save($delivry)) {
                $this->Flash->success(___('the delivry has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $delivry->id]);
            } else {
                $this->Flash->error(___('the delivry could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $personals = $this->Delivries->Personals->find('list', ['limit' => 200]);
        
        $delivry->id = $id;
        $this->set(compact('delivry', 'personals'));
        $this->set('_serialize', ['delivry']);
    }
}
