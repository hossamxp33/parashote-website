<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fonts Controller
 *
 * @property \App\Model\Table\FontsTable $Fonts
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class FontsController extends AppController
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
        $this->set('fonts', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['fonts']);
    }

    /**
     * View method
     *
     * @param string|null $id Font id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $font = $this->Fonts->get($id, [
            'contain' => []
        ]);
        $this->set('font', $font);
        $this->set('_serialize', ['font']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $font = $this->Fonts->newEntity();
        if ($this->request->is('post')) {
            $font = $this->Fonts->patchEntity($font, $this->request->data);
            if ($this->Fonts->save($font)) {
                $this->Flash->success(___('the font has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $font->id]);
            } else {
                $this->Flash->error(___('the font could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('font'));
        $this->set('_serialize', ['font']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Font id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $font = $this->Fonts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $font = $this->Fonts->patchEntity($font, $this->request->data);
            if ($this->Fonts->save($font)) {
                $this->Flash->success(___('the font has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $font->id]);
            } else {
                $this->Flash->error(___('the font could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('font'));
        $this->set('_serialize', ['font']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Font id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $font = $this->Fonts->get($id);
        
        try
        {
            if ($this->Fonts->delete($font)) {
                $this->Flash->success(___('the font has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the font could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the font could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The font could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Fonts->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected font has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected fonts have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected fonts could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected fonts could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no font to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Font id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $font = $this->Fonts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $font = $this->Fonts->newEntity();
            $font = $this->Fonts->patchEntity($font, $this->request->data);
            if ($this->Fonts->save($font)) {
                $this->Flash->success(___('the font has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $font->id]);
            } else {
                $this->Flash->error(___('the font could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $font->id = $id;
        $this->set(compact('font'));
        $this->set('_serialize', ['font']);
    }
}
