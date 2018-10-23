<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MenusController extends AppController
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
            'contain' => ['Menuactions', 'Stores', 'UserGroups']
        ];
        $this->set('menus', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['menus']);
        
        $menuactions = $this->Menus->Menuactions->find('list', ['limit' => 200]);
        $stores = $this->Menus->Stores->find('list', ['limit' => 200]);
        $userGroups = $this->Menus->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('menuactions', 'stores', 'userGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => ['Menuactions', 'Stores', 'UserGroups']
        ]);
        $this->set('menu', $menu);
        $this->set('_serialize', ['menu']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->data);
            if ($this->Menus->save($menu)) {
                $this->Flash->success(___('the menu has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $menu->id]);
            } else {
                $this->Flash->error(___('the menu could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $menuactions = $this->Menus->Menuactions->find('list', ['limit' => 200]);
        $stores = $this->Menus->Stores->find('list', ['limit' => 200]);
        $userGroups = $this->Menus->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('menu', 'menuactions', 'stores', 'userGroups'));
        $this->set('_serialize', ['menu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu = $this->Menus->patchEntity($menu, $this->request->data);
            if ($this->Menus->save($menu)) {
                $this->Flash->success(___('the menu has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $menu->id]);
            } else {
                $this->Flash->error(___('the menu could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $menuactions = $this->Menus->Menuactions->find('list', ['limit' => 200]);
        $stores = $this->Menus->Stores->find('list', ['limit' => 200]);
        $userGroups = $this->Menus->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('menu', 'menuactions', 'stores', 'userGroups'));
        $this->set('_serialize', ['menu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        
        try
        {
            if ($this->Menus->delete($menu)) {
                $this->Flash->success(___('the menu has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the menu could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the menu could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The menu could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Menus->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected menu has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected menus have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected menus could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected menus could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no menu to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Menu id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu = $this->Menus->newEntity();
            $menu = $this->Menus->patchEntity($menu, $this->request->data);
            if ($this->Menus->save($menu)) {
                $this->Flash->success(___('the menu has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $menu->id]);
            } else {
                $this->Flash->error(___('the menu could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $menuactions = $this->Menus->Menuactions->find('list', ['limit' => 200]);
        $stores = $this->Menus->Stores->find('list', ['limit' => 200]);
        $userGroups = $this->Menus->UserGroups->find('list', ['limit' => 200]);
        
        $menu->id = $id;
        $this->set(compact('menu', 'menuactions', 'stores', 'userGroups'));
        $this->set('_serialize', ['menu']);
    }
}
