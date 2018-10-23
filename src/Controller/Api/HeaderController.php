<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\HeaderTable $Header
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class HeaderController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['addheader','data','edit','editdata']); // the pages that available to user without need api token.
    }

function data(){
$data = $this->Header->addheader($this->request->data,$this->Auth->user('username'));
$this->set('data',$data);
$this->set('_serialize', ['data']);
}

function editdata($id){
$data=$this->Header->editheader($this->request->data,$id);
debug($data);
$this->set('data',$data);
$this->set('_serialize',['data']);
}
public function edit($id = null)
{
    $header = $this->Header->get($id, [
        'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        if(isset($this->request->data['logo']['name'])){
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
        }else{
            $this->request->data['logo']['name']=  $header['logo'];
          }       

        if(isset($this->request->data['right_icon']['name'])){
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
        }else{
            $this->request->data['right_icon']['name']=  $header['right_icon'];
          }

        if(isset($this->request->data['left_icon']['name'])){
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
        }else{
            $this->request->data['left_icon']['name']=  $header['left_icon'];
          }


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
}
