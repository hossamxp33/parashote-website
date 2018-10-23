<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class CategoriesController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getdata','addcategory','editcategory']); // the pages that available to user without need api token.
    }

public function getdata($id){
    $Data=$this->Categories->getfavcategory($id,['Products'=>['Productfavs']]);
    $this->set('data',$Data);
    $this->set('_serialize', ['data']);
}
public function addcategory()
{
  $addcategory=$this->Categories->add($this->request->data);
    $this->set(compact('addcategory'));
    $this->set('_serialize', ['addcategory']);
}
public function editcategory($id = null)
{
  $editcategory=$this->Categories->edit($this->request->data,$id);
    $this->set(compact('editcategory'));
    $this->set('_serialize', ['editcategory']);
}


}
