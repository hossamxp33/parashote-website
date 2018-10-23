<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
* Productfavs Controller
 *
 * @property \App\Model\Table\ProductfavsTable $Productfavs
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductfavsController extends AppController
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
        $editproductfav=$this->Productfavs->editdata($this->request->data,$id);
        $this->set(compact('editproductfav'));
        $this->set('_serialize', ['editproductfav']);
    }
    public function add(){
        $addproductfav=$this->Productfavs->adddata($this->request->data);
        $this->set(compact('addproductfav'));
        $this->set('_serialize', ['addproductfav']);
    }
       

}
