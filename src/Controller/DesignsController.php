<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Designs Controller
 *
 * @property \App\Model\Table\DesignsTable $Designs
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class DesignsController extends AppController
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
            'contain' => ['Header', 'Body', 'Footer']
        ];
        $this->set('designs', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['designs']);
        
        $header = $this->Designs->Header->find('list', ['limit' => 200]);
        $bodies = $this->Designs->Body->find('list', ['limit' => 200]);
        $footer = $this->Designs->Footer->find('list', ['limit' => 200]);
        $this->set(compact('header', 'body', 'footer'));
    }

    /**
     * View method
     *
     * @param string|null $id Design id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $design = $this->Designs->get($id, [
            'contain' => ['Header', 'Body', 'Footer', 'Slider']
        ]);
        $this->set('design', $design);
        $this->set('_serialize', ['design']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $design = $this->Designs->newEntity();
        if ($this->request->is('post')) {
            $design = $this->Designs->patchEntity($design, $this->request->data);
            if ($this->Designs->save($design)) {
                $this->Flash->success(___('the design has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $design->id]);
            } else {
                $this->Flash->error(___('the design could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $header = $this->Designs->Header->find('list', ['limit' => 200]);
        $bodies = $this->Designs->Body->find('list', ['limit' => 200]);
        $footer = $this->Designs->Footer->find('list', ['limit' => 200]);
        $this->set(compact('design', 'header', 'body', 'footer'));
        $this->set('_serialize', ['design']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Design id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $design = $this->Designs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $design = $this->Designs->patchEntity($design, $this->request->data);
            if ($this->Designs->save($design)) {
                $this->Flash->success(___('the design has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $design->id]);
            } else {
                $this->Flash->error(___('the design could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $header = $this->Designs->Header->find('list', ['limit' => 200]);
        $bodies = $this->Designs->Body->find('list', ['limit' => 200]);
        $footer = $this->Designs->Footer->find('list', ['limit' => 200]);
        $this->set(compact('design', 'header', 'body', 'footer'));
        $this->set('_serialize', ['design']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Design id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $design = $this->Designs->get($id);
        
        try
        {
            if ($this->Designs->delete($design)) {
                $this->Flash->success(___('the design has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the design could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the design could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The design could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Designs->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected design has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected designs have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected designs could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected designs could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no design to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Design id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $design = $this->Designs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $design = $this->Designs->newEntity();
            $design = $this->Designs->patchEntity($design, $this->request->data);
            if ($this->Designs->save($design)) {
                $this->Flash->success(___('the design has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $design->id]);
            } else {
                $this->Flash->error(___('the design could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $header = $this->Designs->Header->find('list', ['limit' => 200]);
        $bodies = $this->Designs->Body->find('list', ['limit' => 200]);
        $footer = $this->Designs->Footer->find('list', ['limit' => 200]);
        
        $design->Id = $id;
        $this->set(compact('design', 'header', 'body', 'footer'));
        $this->set('_serialize', ['design']);
    }
}
