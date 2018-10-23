<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Designer Controller
 *
 * @property \App\Model\Table\DesignerTable $Designer
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class DesignerController extends AppController
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
        $this->set('designer', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['designer']);
    }

    /**
     * View method
     *
     * @param string|null $id Designer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $designer = $this->Designer->get($id, [
            'contain' => []
        ]);
        $this->set('designer', $designer);
        $this->set('_serialize', ['designer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $designer = $this->Designer->newEntity();
        if ($this->request->is('post')) {
            $designer = $this->Designer->patchEntity($designer, $this->request->data);
            if ($this->Designer->save($designer)) {
                $this->Flash->success(___('the designer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $designer->id]);
            } else {
                $this->Flash->error(___('the designer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('designer'));
        $this->set('_serialize', ['designer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Designer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $designer = $this->Designer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $designer = $this->Designer->patchEntity($designer, $this->request->data);
            if ($this->Designer->save($designer)) {
                $this->Flash->success(___('the designer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $designer->id]);
            } else {
                $this->Flash->error(___('the designer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('designer'));
        $this->set('_serialize', ['designer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Designer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $designer = $this->Designer->get($id);
        
        try
        {
            if ($this->Designer->delete($designer)) {
                $this->Flash->success(___('the designer has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the designer could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the designer could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The designer could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Designer->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected designer has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected designer have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected designer could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected designer could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no designer to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Designer id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $designer = $this->Designer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $designer = $this->Designer->newEntity();
            $designer = $this->Designer->patchEntity($designer, $this->request->data);
            if ($this->Designer->save($designer)) {
                $this->Flash->success(___('the designer has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $designer->id]);
            } else {
                $this->Flash->error(___('the designer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $designer->id = $id;
        $this->set(compact('designer'));
        $this->set('_serialize', ['designer']);
    }
}
