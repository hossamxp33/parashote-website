<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Header Controller
 *
 * @property \App\Model\Table\HeaderTable $Header
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class HeaderController extends AppController
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
        $this->set('header', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['header']);
    }

    /**
     * View method
     *
     * @param string|null $id Header id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $header = $this->Header->get($id, [
            'contain' => ['Designs']
        ]);
        $this->set('header', $header);
        $this->set('_serialize', ['header']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $header = $this->Header->newEntity();
        if ($this->request->is('post')) {
          $path_info = pathinfo($this->request->data['background']['name']);
  chmod($this->request->data['background']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
  $fullpath = WWW_ROOT."library".'/'.'headerbackground';
if(!is_dir($fullpath)) {
       mkdir($fullpath, 0777, true);
}
move_uploaded_file($this->request->data['background']['tmp_name'], $fullpath.DS.$photoo);
$this->request->data['background'] = $photoo;

$path_info = pathinfo($this->request->data['logo']['name']);
chmod($this->request->data['logo']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
$fullpath = WWW_ROOT."library".'/'.'headerlogo';
if(!is_dir($fullpath)) {
mkdir($fullpath, 0777, true);
}
move_uploaded_file($this->request->data['logo']['tmp_name'], $fullpath.DS.$photoo);
$this->request->data['logo'] = $photoo;

$path_info = pathinfo($this->request->data['right_icon']['name']);
chmod($this->request->data['right_icon']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
$fullpath = WWW_ROOT."library".'/'.'headerrighticon';
if(!is_dir($fullpath)) {
mkdir($fullpath, 0777, true);
}
move_uploaded_file($this->request->data['right_icon']['tmp_name'], $fullpath.DS.$photoo);
$this->request->data['right_icon'] = $photoo;

$path_info = pathinfo($this->request->data['left_icon']['name']);
chmod($this->request->data['left_icon']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
$fullpath = WWW_ROOT."library".'/'.'headerlefticon';
if(!is_dir($fullpath)) {
mkdir($fullpath, 0777, true);
}
move_uploaded_file($this->request->data['left_icon']['tmp_name'], $fullpath.DS.$photoo);
$this->request->data['left_icon'] = $photoo;

            $header = $this->Header->patchEntity($header, $this->request->data);
            if ($this->Header->save($header)) {
                $this->Flash->success(___('the header has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $header->id]);
            } else {
                $this->Flash->error(___('the header could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('header'));
        $this->set('_serialize', ['header']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Header id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
     public function edit($id = null)
     {
         $header = $this->Header->get($id, [
             'contain' => []
         ]);
         if ($this->request->is(['patch', 'post', 'put'])) {
     $path_info = pathinfo($this->request->data['background']['name']);
     chmod($this->request->data['background']['tmp_name'], 0644);
     $photoo = time().mt_rand().".".$path_info['extension'];
     //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
     $fullpath = WWW_ROOT."library".'/'.'headerbackground';
     if(!is_dir($fullpath)) {
        mkdir($fullpath, 0777, true);
     }
     move_uploaded_file($this->request->data['background']['tmp_name'], $fullpath.DS.$photoo);
     $this->request->data['background'] = $photoo;

     $path_info = pathinfo($this->request->data['logo']['name']);
     chmod($this->request->data['logo']['tmp_name'], 0644);
     $photoo = time().mt_rand().".".$path_info['extension'];
     //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
     $fullpath = WWW_ROOT."library".'/'.'headerlogo';
     if(!is_dir($fullpath)) {
     mkdir($fullpath, 0777, true);
     }
     move_uploaded_file($this->request->data['logo']['tmp_name'], $fullpath.DS.$photoo);
     $this->request->data['logo'] = $photoo;

     $path_info = pathinfo($this->request->data['right_icon']['name']);
     chmod($this->request->data['right_icon']['tmp_name'], 0644);
     $photoo = time().mt_rand().".".$path_info['extension'];
     //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
     $fullpath = WWW_ROOT."library".'/'.'headerrighticon';
     if(!is_dir($fullpath)) {
     mkdir($fullpath, 0777, true);
     }
     move_uploaded_file($this->request->data['right_icon']['tmp_name'], $fullpath.DS.$photoo);
     $this->request->data['right_icon'] = $photoo;

     $path_info = pathinfo($this->request->data['left_icon']['name']);
     chmod($this->request->data['left_icon']['tmp_name'], 0644);
     $photoo = time().mt_rand().".".$path_info['extension'];
     //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
     $fullpath = WWW_ROOT."library".'/'.'headerlefticon';
     if(!is_dir($fullpath)) {
     mkdir($fullpath, 0777, true);
     }
     move_uploaded_file($this->request->data['left_icon']['tmp_name'], $fullpath.DS.$photoo);
     $this->request->data['left_icon'] = $photoo;

             $header = $this->Header->patchEntity($header, $this->request->data);
             if ($this->Header->save($header)) {
               // $this->Flash->success(___('the header has been saved'), ['plugin' => 'Alaxos']);
                //return $this->redirect(['action' => 'view', $header->id]);
             } else {
                $this->Flash->error(___('the header could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
             }
         }
         $this->set(compact('header'));
         $this->set('_serialize', ['header']);
     }


    /**
     * Delete method
     *
     * @param string|null $id Header id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $header = $this->Header->get($id);

        try
        {
            if ($this->Header->delete($header)) {
                $this->Flash->success(___('the header has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the header could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the header could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The header could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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

            $query = $this->Header->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);

            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected header has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected header have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected header could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected header could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no header to delete'), ['element' => 'Alaxos.error']);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Copy method
     *
     * @param string|null $id Header id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $header = $this->Header->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $header = $this->Header->newEntity();
            $header = $this->Header->patchEntity($header, $this->request->data);
            if ($this->Header->save($header)) {
                $this->Flash->success(___('the header has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $header->id]);
            } else {
                $this->Flash->error(___('the header could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }

        $header->id = $id;
        $this->set(compact('header'));
        $this->set('_serialize', ['header']);
    }
}
