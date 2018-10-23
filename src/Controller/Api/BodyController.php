<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\BodyTable $Body
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class BodyController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['addbody','data','edit','editbody']); // the pages that available to user without need api token.
    }

function data(){
$data = $this->Body->addbody();
debug($data);
$this->set('data',$data);
$this->set('_serialize', ['data']);
}
public function edit($id = null)
{
    $body = $this->Body->get($id, [
        'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $body = $this->Body->patchEntity($body, $this->request->data);
        if ($this->Body->save($body)) {
        //    $this->Flash->success(___('the body has been saved'), ['plugin' => 'Alaxos']);
          //  return $this->redirect(['action' => 'view', $body->id]);
        } else {
          //  $this->Flash->error(___('the body could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
        }
    }
    $templates = $this->Body->Templates->find('list', ['limit' => 200]);
    $this->set(compact('body', 'templates'));
    $this->set('_serialize', ['body']);
}
function editbody($id){
    $data=$this->Body->editdata($this->request->data,$id);
    debug($data);
    $this->set('data',$data);
    $this->set('_serialize',['data']);
    }

}
