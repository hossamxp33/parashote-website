<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\StoresettingsTable $Storesettings
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StoresettingsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['add','edit']); // the pages that available to user without need api token.
    }

    // public function add()
    // {
    //     $storesetting = $this->Storesettings->newEntity();
    //     if ($this->request->is('post')) {
    //         if(isset($this->request->data['photo']['name'])){
    //             $path_info = pathinfo($this->request->data['photo']['name']);
    //             chmod($this->request->data['photo']['tmp_name'], 0644);
    //             $photoo = time().mt_rand().".".$path_info['extension'];
    //             //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
    //             $fullpath = WWW_ROOT."library".'/'.'storesettingsplash';
    //             if(!is_dir($fullpath)) {
    //             mkdir($fullpath, 0777, true);
    //             }
    //             move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photoo);
    //             $this->request->data['photo'] = $photoo;
    //         }
      
    //         if(isset($this->request->data['logo']['name'])){
    //             $path_info = pathinfo($this->request->data['logo']['name']);
    //             chmod($this->request->data['logo']['tmp_name'], 0644);
    //             $photoo = time().mt_rand().".".$path_info['extension'];
    //             //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
    //             $fullpath = WWW_ROOT."library".'/'.'storesettinglogo';
    //             if(!is_dir($fullpath)) {
    //             mkdir($fullpath, 0777, true);
    //             }
    //             move_uploaded_file($this->request->data['logo']['tmp_name'], $fullpath.DS.$photoo);
    //             $this->request->data['logo'] = $photoo;
    //         }


    //         $storesetting = $this->Storesettings->patchEntity($storesetting, $this->request->data);
    //         if ($this->Storesettings->save($storesetting)) {

    //           // $this->Flash->success(___('the storesetting has been saved'), ['plugin' => 'Alaxos']);
    //             //return $this->redirect(['action' => 'view', $storesetting->id]);
    //         } else {
    //           //  $this->Flash->error(___('the storesetting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
    //         }
    //     }
    //     $stores = $this->Storesettings->Stores->find('list', ['limit' => 200]);
    //     $payments = $this->Storesettings->Payments->find('list', ['limit' => 200]);
    //     $designs = $this->Storesettings->Designs->find('list', ['limit' => 200]);
    //     $this->set(compact('storesetting', 'stores', 'payments', 'designs'));
    //     $this->set('_serialize', ['storesetting']);
    // }
    function add(){
        $data = $this->Storesettings->adddata($this->request->data);
        debug($data);
        $this->set('data',$data);
        $this->set('_serialize', ['data']);
        }

    public function edit($id)
    {
     $editstoresettings=$this->Storesettings->editData($this->request->data,$id);  
        $this->set(compact('editstoresettings'));
        $this->set('_serialize', ['editstoresettings']);
    }



}
