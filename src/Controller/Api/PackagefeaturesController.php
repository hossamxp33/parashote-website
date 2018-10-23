<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Packagefeatures Controller
 *
 * @property \App\Model\Table\PackagefeaturesTable $Packagefeatures
 * @property \Alaxos\Controller\Component\filterComponent $filter
 */
class PackagefeaturesController extends AppController
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
    public $components = ['Alaxos.filter'];

    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Package']
        ];
        $this->set('packagefeatures', $this->paginate($this->filter->getfilterQuery()));
        $this->set('_serialize', ['packagefeatures']);

        $packages = $this->Packagefeatures->Package->find('list', ['limit' => 200]);
        $this->set(compact('packages'));
    }

    /**
     * View method
     *
     * @param string|null $id Packagefeature id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $packagefeature = $this->Packagefeatures->get($id, [
            'contain' => ['Package']
        ]);
        $this->set('packagefeature', $packagefeature);
        $this->set('_serialize', ['packagefeature']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $packagefeature = $this->Packagefeatures->newEntity();
        if ($this->request->is('post')) {
            $packagefeature = $this->Packagefeatures->patchEntity($packagefeature, $this->request->data);
            if ($this->Packagefeatures->save($packagefeature)) {
                $this->Flash->success(___('the packagefeature has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $packagefeature->id]);
            } else {
                $this->Flash->error(___('the packagefeature could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $packages = $this->Packagefeatures->Package->find('list', ['limit' => 200]);
        $this->set(compact('packagefeature', 'packages'));
        $this->set('_serialize', ['packagefeature']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Packagefeature id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $packagefeature = $this->Packagefeatures->get($id, [
            'contain' => []
        ]);
    debug($this->request->data);
      //  if ($this->request->is(['patch', 'post', 'put'])) {
        if(isset($this->request->data['Image']['name'])){
          $path_info = pathinfo($this->request->data['Image']['name']);
          chmod($this->request->data['Image']['tmp_name'], 0644);
        $photoo = time().mt_rand().".".$path_info['extension'];
        //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
          $fullpath = WWW_ROOT."library".'/'.'packagefeatures';
        if(!is_dir($fullpath)) {
               mkdir($fullpath, 0777, true);
        }
        move_uploaded_file($this->request->data['Image']['tmp_name'], $fullpath.DS.$photoo);
        $this->request->data['Image'] = $photoo;
    }else{
        $this->request->data['Image']['name']=  $packagefeature['Image'];
      }
            $packagefeature = $this->Packagefeatures->patchEntity($packagefeature, $this->request->data);
            if ($this->Packagefeatures->save($packagefeature)) {

                $this->Flash->success(___('the packagefeature has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $packagefeature->id]);
            } else {
                $this->Flash->error(___('the packagefeature could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        //}
        $packages = $this->Packagefeatures->Package->find('list', ['limit' => 200]);
        $this->set(compact('packagefeature', 'packages'));
        $this->set('_serialize', ['packagefeature']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Packagefeature id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $packagefeature = $this->Packagefeatures->get($id);

        try
        {
            if ($this->Packagefeatures->delete($packagefeature)) {
                $this->Flash->success(___('the packagefeature has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the packagefeature could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the packagefeature could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The packagefeature could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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

            $query = $this->Packagefeatures->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);

            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected packagefeature has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected packagefeatures have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected packagefeatures could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected packagefeatures could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no packagefeature to delete'), ['element' => 'Alaxos.error']);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Copy method
     *
     * @param string|null $id Packagefeature id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $packagefeature = $this->Packagefeatures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $packagefeature = $this->Packagefeatures->newEntity();
            $packagefeature = $this->Packagefeatures->patchEntity($packagefeature, $this->request->data);
            if ($this->Packagefeatures->save($packagefeature)) {
                $this->Flash->success(___('the packagefeature has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $packagefeature->id]);
            } else {
                $this->Flash->error(___('the packagefeature could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $packages = $this->Packagefeatures->Package->find('list', ['limit' => 200]);

        $packagefeature->id = $id;
        $this->set(compact('packagefeature', 'packages'));
        $this->set('_serialize', ['packagefeature']);
    }

}
