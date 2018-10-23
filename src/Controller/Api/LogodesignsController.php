<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Logodesigns Controller
 *
 * @property \App\Model\Table\LogodesignsTable $Logodesigns
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class LogodesignsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['add','edit']); // the pages that available to user without need api token.
    }

function add(){
$addlogodesign = $this->Logodesigns->adddata($this->request->data);
$this->set('addlogodesign',$addlogodesign);
$this->set('_serialize', ['addlogodesign']);
}
public function edit($id)
{
  $editlogodesign=$this->Logodesigns->editdata($this->request->data,$id);
    $this->set(compact('editlogodesign',$editlogodesign));
    $this->set('_serialize', ['editlogodesign']);
}

}
