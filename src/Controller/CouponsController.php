<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Coupons Controller
 *
 * @property \App\Model\Table\CouponsTable $Coupons
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class CouponsController extends AppController
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
        $this->set('coupons', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['coupons']);
    }

    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['Stores']
        ]);
        $this->set('coupon', $coupon);
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coupon = $this->Coupons->newEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->data);
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(___('the coupon has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $coupon->id]);
            } else {
                $this->Flash->error(___('the coupon could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->data);
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(___('the coupon has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $coupon->id]);
            } else {
                $this->Flash->error(___('the coupon could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        
        try
        {
            if ($this->Coupons->delete($coupon)) {
                $this->Flash->success(___('the coupon has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the coupon could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the coupon could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The coupon could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Coupons->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected coupon has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected coupons have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected coupons could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected coupons could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no coupon to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Coupon id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->newEntity();
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->data);
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(___('the coupon has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $coupon->id]);
            } else {
                $this->Flash->error(___('the coupon could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $coupon->id = $id;
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }
}
