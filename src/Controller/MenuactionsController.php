<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Menuactions Controller
 *
 * @property \App\Model\Table\MenuactionsTable $Menuactions
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MenuactionsController extends AppController
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
        $this->set('menuactions', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['menuactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Menuaction id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuaction = $this->Menuactions->get($id, [
            'contain' => ['Menus']
        ]);
        $this->set('menuaction', $menuaction);
        $this->set('_serialize', ['menuaction']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuaction = $this->Menuactions->newEntity();
        if ($this->request->is('post')) {
            $menuaction = $this->Menuactions->patchEntity($menuaction, $this->request->data);
            if ($this->Menuactions->save($menuaction)) {
                $this->Flash->success(___('the menuaction has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $menuaction->id]);
            } else {
                $this->Flash->error(___('the menuaction could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('menuaction'));
        $this->set('_serialize', ['menuaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menuaction id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuaction = $this->Menuactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuaction = $this->Menuactions->patchEntity($menuaction, $this->request->data);
            if ($this->Menuactions->save($menuaction)) {
                $this->Flash->success(___('the menuaction has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $menuaction->id]);
            } else {
                $this->Flash->error(___('the menuaction could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('menuaction'));
        $this->set('_serialize', ['menuaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menuaction id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuaction = $this->Menuactions->get($id);
        
        try
        {
            if ($this->Menuactions->delete($menuaction)) {
                $this->Flash->success(___('the menuaction has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the menuaction could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the menuaction could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The menuaction could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Menuactions->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected menuaction has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected menuactions have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected menuactions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected menuactions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no menuaction to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Menuaction id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $menuaction = $this->Menuactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuaction = $this->Menuactions->newEntity();
            $menuaction = $this->Menuactions->patchEntity($menuaction, $this->request->data);
            if ($this->Menuactions->save($menuaction)) {
                $this->Flash->success(___('the menuaction has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $menuaction->id]);
            } else {
                $this->Flash->error(___('the menuaction could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $menuaction->id = $id;
        $this->set(compact('menuaction'));
        $this->set('_serialize', ['menuaction']);
    }
}
