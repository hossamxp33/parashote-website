<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class SlidersController extends AppController
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
            'contain' => ['Designs']
        ];
        $this->set('sliders', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['sliders']);
        
        $designs = $this->Sliders->Designs->find('list', ['limit' => 200]);
        $this->set(compact('designs'));
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => ['Designs']
        ]);
        $this->set('slider', $slider);
        $this->set('_serialize', ['slider']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
            $slider = $this->Sliders->patchEntity($slider, $this->request->data);
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(___('the slider has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $slider->id]);
            } else {
                $this->Flash->error(___('the slider could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $designs = $this->Sliders->Designs->find('list', ['limit' => 200]);
        $this->set(compact('slider', 'designs'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slider = $this->Sliders->patchEntity($slider, $this->request->data);
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(___('the slider has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $slider->id]);
            } else {
                $this->Flash->error(___('the slider could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $designs = $this->Sliders->Designs->find('list', ['limit' => 200]);
        $this->set(compact('slider', 'designs'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        
        try
        {
            if ($this->Sliders->delete($slider)) {
                $this->Flash->success(___('the slider has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the slider could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the slider could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The slider could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Sliders->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected slider has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected sliders have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected sliders could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected sliders could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no slider to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Slider id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slider = $this->Sliders->newEntity();
            $slider = $this->Sliders->patchEntity($slider, $this->request->data);
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(___('the slider has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $slider->id]);
            } else {
                $this->Flash->error(___('the slider could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $designs = $this->Sliders->Designs->find('list', ['limit' => 200]);
        
        $slider->id = $id;
        $this->set(compact('slider', 'designs'));
        $this->set('_serialize', ['slider']);
    }
}
