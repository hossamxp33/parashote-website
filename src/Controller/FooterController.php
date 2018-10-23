<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Footer Controller
 *
 * @property \App\Model\Table\FooterTable $Footer
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class FooterController extends AppController
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
        $this->set('footer', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['footer']);
    }

    /**
     * View method
     *
     * @param string|null $id Footer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $footer = $this->Footer->get($id, [
            'contain' => ['Designs']
        ]);
        $this->set('footer', $footer);
        $this->set('_serialize', ['footer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $footer = $this->Footer->newEntity();
        if ($this->request->is('post')) {
            $footer = $this->Footer->patchEntity($footer, $this->request->data);
            if ($this->Footer->save($footer)) {
                $this->Flash->success(___('the footer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $footer->id]);
            } else {
                $this->Flash->error(___('the footer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('footer'));
        $this->set('_serialize', ['footer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Footer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $footer = $this->Footer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $footer = $this->Footer->patchEntity($footer, $this->request->data);
            if ($this->Footer->save($footer)) {
                $this->Flash->success(___('the footer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $footer->id]);
            } else {
                $this->Flash->error(___('the footer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('footer'));
        $this->set('_serialize', ['footer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Footer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $footer = $this->Footer->get($id);
        
        try
        {
            if ($this->Footer->delete($footer)) {
                $this->Flash->success(___('the footer has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the footer could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the footer could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The footer could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Footer->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected footer has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected footer have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected footer could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected footer could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no footer to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Footer id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $footer = $this->Footer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $footer = $this->Footer->newEntity();
            $footer = $this->Footer->patchEntity($footer, $this->request->data);
            if ($this->Footer->save($footer)) {
                $this->Flash->success(___('the footer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $footer->id]);
            } else {
                $this->Flash->error(___('the footer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $footer->id = $id;
        $this->set(compact('footer'));
        $this->set('_serialize', ['footer']);
    }
}
