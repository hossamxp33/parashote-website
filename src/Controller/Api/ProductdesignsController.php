<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductdesignsTable $Productdesigns
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ProductdesignsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['edit','add','getproducttemplatedata','getproduct']); // the pages that available to user without need api token.
    }
    public function edit($id)
    {
        $editproductdesign=$this->Productdesigns->editdata($this->request->data,$id);
        $this->set(compact('editproductdesign'));
        $this->set('_serialize', ['editproductdesign']);
    }
    public function add(){
        $addproductdesign=$this->Productdesigns->adddata($this->request->data);
        $this->set(compact('addproductdesign'));
        $this->set('_serialize',['addproductdesign']);
    }

    public function getproducttemplatedata($id){
        $Data = $this->Productdesigns->getproducttemplate($id,["product_template_id"]);
         $this->set('data',$Data);
         $this->set('_serialize', ['data']);
       }
     public function getproduct($id){
         $data=$this->Productdesigns->view($id);
         $this->set(compact('data'));
         $this->set('_serialize',['data']);
     }  
       

}
