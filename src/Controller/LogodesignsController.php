<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Logodesigns Controller
 *
 * @property \App\Model\Table\LogodesignsTable $Logodesigns
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class LogodesignsController extends AppController
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
        $this->set('logodesigns', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['logodesigns']);
        
        $stores = $this->Logodesigns->Stores->find('list', ['limit' => 200]);
        $this->set(compact('stores'));
    }

    /**
     * View method
     *
     * @param string|null $id Logodesign id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logodesign = $this->Logodesigns->get($id, [
            'contain' => ['Stores']
        ]);
        $this->set('logodesign', $logodesign);
        $this->set('_serialize', ['logodesign']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logodesign = $this->Logodesigns->newEntity();
        if ($this->request->is('post')) {
            $logodesign = $this->Logodesigns->patchEntity($logodesign, $this->request->data);
            if ($this->Logodesigns->save($logodesign)) {
                $this->Flash->success(___('the logodesign has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $logodesign->id]);
            } else {
                $this->Flash->error(___('the logodesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Logodesigns->Stores->find('list', ['limit' => 200]);
        $this->set(compact('logodesign', 'stores'));
        $this->set('_serialize', ['logodesign']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Logodesign id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logodesign = $this->Logodesigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logodesign = $this->Logodesigns->patchEntity($logodesign, $this->request->data);
            if ($this->Logodesigns->save($logodesign)) {
                $this->Flash->success(___('the logodesign has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $logodesign->id]);
            } else {
                $this->Flash->error(___('the logodesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Logodesigns->Stores->find('list', ['limit' => 200]);
        $this->set(compact('logodesign', 'stores'));
        $this->set('_serialize', ['logodesign']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Logodesign id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logodesign = $this->Logodesigns->get($id);
        
        try
        {
            if ($this->Logodesigns->delete($logodesign)) {
                $this->Flash->success(___('the logodesign has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the logodesign could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the logodesign could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The logodesign could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Logodesigns->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected logodesign has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected logodesigns have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected logodesigns could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected logodesigns could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no logodesign to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Logodesign id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $logodesign = $this->Logodesigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logodesign = $this->Logodesigns->newEntity();
            $logodesign = $this->Logodesigns->patchEntity($logodesign, $this->request->data);
            if ($this->Logodesigns->save($logodesign)) {
                $this->Flash->success(___('the logodesign has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $logodesign->id]);
            } else {
                $this->Flash->error(___('the logodesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $stores = $this->Logodesigns->Stores->find('list', ['limit' => 200]);
        
        $logodesign->id = $id;
        $this->set(compact('logodesign', 'stores'));
        $this->set('_serialize', ['logodesign']);
    }
}
