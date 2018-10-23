<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paymentstores Controller
 *
 * @property \App\Model\Table\PaymentstoresTable $Paymentstores
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class PaymentstoresController extends AppController
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
            'contain' => ['Stores', 'Payments']
        ];
        $this->set('paymentstores', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['paymentstores']);
        
        $stores = $this->Paymentstores->Stores->find('list', ['limit' => 200]);
        $payments = $this->Paymentstores->Payments->find('list', ['limit' => 200]);
        $this->set(compact('stores', 'payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Paymentstore id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentstore = $this->Paymentstores->get($id, [
            'contain' => ['Stores', 'Payments']
        ]);
        $this->set('paymentstore', $paymentstore);
        $this->set('_serialize', ['paymentstore']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentstore = $this->Paymentstores->newEntity();
        if ($this->request->is('post')) {
            $paymentstore = $this->Paymentstores->patchEntity($paymentstore, $this->request->data);
            if ($this->Paymentstores->save($paymentstore)) {
                $this->Flash->success(___('the paymentstore has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $paymentstore->id]);
            } else {
                $this->Flash->error(___('the paymentstore could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Paymentstores->Stores->find('list', ['limit' => 200]);
        $payments = $this->Paymentstores->Payments->find('list', ['limit' => 200]);
        $this->set(compact('paymentstore', 'stores', 'payments'));
        $this->set('_serialize', ['paymentstore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paymentstore id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentstore = $this->Paymentstores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentstore = $this->Paymentstores->patchEntity($paymentstore, $this->request->data);
            if ($this->Paymentstores->save($paymentstore)) {
                $this->Flash->success(___('the paymentstore has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $paymentstore->id]);
            } else {
                $this->Flash->error(___('the paymentstore could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Paymentstores->Stores->find('list', ['limit' => 200]);
        $payments = $this->Paymentstores->Payments->find('list', ['limit' => 200]);
        $this->set(compact('paymentstore', 'stores', 'payments'));
        $this->set('_serialize', ['paymentstore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paymentstore id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentstore = $this->Paymentstores->get($id);
        
        try
        {
            if ($this->Paymentstores->delete($paymentstore)) {
                $this->Flash->success(___('the paymentstore has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the paymentstore could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the paymentstore could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The paymentstore could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Paymentstores->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected paymentstore has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected paymentstores have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected paymentstores could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected paymentstores could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no paymentstore to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Paymentstore id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $paymentstore = $this->Paymentstores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentstore = $this->Paymentstores->newEntity();
            $paymentstore = $this->Paymentstores->patchEntity($paymentstore, $this->request->data);
            if ($this->Paymentstores->save($paymentstore)) {
                $this->Flash->success(___('the paymentstore has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $paymentstore->id]);
            } else {
                $this->Flash->error(___('the paymentstore could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Paymentstores->Stores->find('list', ['limit' => 200]);
        $payments = $this->Paymentstores->Payments->find('list', ['limit' => 200]);
        
        $paymentstore->id = $id;
        $this->set(compact('paymentstore', 'stores', 'payments'));
        $this->set('_serialize', ['paymentstore']);
    }
}
