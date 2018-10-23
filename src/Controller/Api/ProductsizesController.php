<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsizesTable $Productsizes
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductsizesController extends AppController
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
        $editproductsize=$this->Productsizes->editdata($this->request->data,$id);
        $this->set(compact('editproductsize'));
        $this->set('_serialize', ['editproductsize']);
    }
    public function add(){
        $addproductsize=$this->Productsizes->adddata($this->request->data);
        $this->set(compact('addproductsize'));
        $this->set('_serialize',['addproductsize']);
    }

  

}
