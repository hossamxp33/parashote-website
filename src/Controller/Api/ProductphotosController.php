<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Productphotos Controller
 *
 * @property \App\Model\Table\ProductphotosTable $Productphotos
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductphotosController extends AppController
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
        $editproductphoto=$this->Productphotos->editdata($this->request->data,$id);
        $this->set(compact('editproductphoto'));
        $this->set('_serialize', ['editproductphoto']);
    }
    public function add(){
        $addproductphoto=$this->Productphotos->adddata($this->request->data,$this->Auth->user('username'));
        $this->set(compact('addproductphoto'));
        $this->set('_serialize', ['addproductphoto']);
    }
       

}
