<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
* Productcolors Controller
 *
  * @property \App\Model\Table\ProductcolorsTable $Productcolors
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductcolorsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['edit','add']); // the pages that available to user without need api token.
    }
    public function edit($id)
    {
        $editproductcolor=$this->Productcolors->editdata($this->request->data,$id);
        $this->set(compact('editproductcolor'));
        $this->set('_serialize', ['editproductcolor']);
    }
    public function add(){
        $addproductcolor=$this->Productcolors->adddata($this->request->data);
        $this->set(compact('addproductcolor'));
        $this->set('_serialize', ['addproductcolor']);
    }
       

}
