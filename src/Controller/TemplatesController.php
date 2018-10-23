<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Templates Controller
 *
 * @property \App\Model\Table\TemplatesTable $Templates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class TemplatesController extends AppController
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
        $this->set('templates', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['templates']);
    }

    /**
     * View method
     *
     * @param string|null $id Template id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => ['Body']
        ]);
        $this->set('template', $template);
        $this->set('_serialize', ['template']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $template = $this->Templates->newEntity();
        if ($this->request->is('post')) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(___('the template has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $template->id]);
            } else {
                $this->Flash->error(___('the template could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('template'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Template id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(___('the template has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $template->id]);
            } else {
                $this->Flash->error(___('the template could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('template'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Template id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $template = $this->Templates->get($id);
        
        try
        {
            if ($this->Templates->delete($template)) {
                $this->Flash->success(___('the template has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the template could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the template could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The template could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Templates->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected template has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected templates have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected templates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected templates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no template to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Template id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $template = $this->Templates->newEntity();
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(___('the template has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $template->id]);
            } else {
                $this->Flash->error(___('the template could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $template->id = $id;
        $this->set(compact('template'));
        $this->set('_serialize', ['template']);
    }
}
