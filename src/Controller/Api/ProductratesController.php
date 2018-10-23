<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductratesTable $Productrates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductratesController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getallproductdata','data','edit','add']); // the pages that available to user without need api token.
    }

    public function edit($id = null)
    {
      $editproductrates=$this->Productrates->editdata($this->request->data,$id);
        $this->set(compact('editproductrates'));
        $this->set('_serialize', ['editproductrates']);
    }
    public function add()
    {
      $addproductrates=$this->Productrates->adddata($this->request->data);
        $this->set(compact('addproductrates'));
        $this->set('_serialize', ['addproductrates']);
    }
 

}
