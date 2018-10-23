<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Body Controller
 *
 * @property \App\Model\Table\BodyTable $Body
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class BodyController extends AppController
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
            'contain' => ['Templates']
        ];
        $this->set('body', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['body']);

        $templates = $this->Body->Templates->find('list', ['limit' => 200]);
        $this->set(compact('templates'));
    }

    /**
     * View method
     *
     * @param string|null $id Body id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $body = $this->Body->get($id, [
            'contain' => ['Templates', 'Designs']
        ]);
        $this->set('body', $body);
        $this->set('_serialize', ['body']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $body = $this->Body->newEntity();
        if ($this->request->is('post')) {
            $body = $this->Body->patchEntity($body, $this->request->data);
            if ($this->Body->save($body)) {
                $this->Flash->success(___('the body has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $body->id]);
            } else {
                $this->Flash->error(___('the body could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $templates = $this->Body->Templates->find('list', ['limit' => 200]);
        $this->set(compact('body', 'templates'));
        $this->set('_serialize', ['body']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Body id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $body = $this->Body->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $body = $this->Body->patchEntity($body, $this->request->data);
            if ($this->Body->save($body)) {
                $this->Flash->success(___('the body has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $body->id]);
            } else {
                $this->Flash->error(___('the body could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $templates = $this->Body->Templates->find('list', ['limit' => 200]);
        $this->set(compact('body', 'templates'));
        $this->set('_serialize', ['body']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Body id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $body = $this->Body->get($id);

        try
        {
            if ($this->Body->delete($body)) {
                $this->Flash->success(___('the body has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the body could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the body could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The body could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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

            $query = $this->Body->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);

            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected body has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected body have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected body could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected body could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no body to delete'), ['element' => 'Alaxos.error']);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Copy method
     *
     * @param string|null $id Body id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $body = $this->Body->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $body = $this->Body->newEntity();
            $body = $this->Body->patchEntity($body, $this->request->data);
            if ($this->Body->save($body)) {
                $this->Flash->success(___('the body has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $body->id]);
            } else {
                $this->Flash->error(___('the body could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $templates = $this->Body->Templates->find('list', ['limit' => 200]);

        $body->id = $id;
        $this->set(compact('body', 'templates'));
        $this->set('_serialize', ['body']);
    }
}
