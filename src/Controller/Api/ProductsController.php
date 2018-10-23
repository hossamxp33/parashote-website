<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\TemplatesTable $Products
 * @property \Alaxos\Controller\Component\filterComponent $filter
 */
class ProductsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getallproductdata','data','edit','add','getproductrates','GetDoctorServices','getallproductrates']); // the pages that available to user without need api token.
    }

    public function edit($id = null)
    {
      $editproduct=$this->Products->editdata($this->request->data,$id,$this->Auth->user('username'));
        $this->set(compact('editproduct'));
        $this->set('_serialize', ['editproduct']);
    }
    public function add()
    {
      $addproduct=$this->Products->adddata($this->request->data);
        $this->set(compact('addproduct'));
        $this->set('_serialize', ['addproduct']);
    }
    public function getallproductdata($id){
        $Data = $this->Products->getall($id,['Productcolors','Productfavs','Productphotos','Productrates','Productsizes']);
         $this->set('data',$Data);
         $this->set('_serialize', ['data']);
       }
      //  public function getallproductsrate(){
      //   $getrate=$this->Products->getproductrates();
      //   $this->set(compact('getrate',$getrate));
      //   $this->set('_serialize', ['getrate']);
      // }
    //   public function getproductrates(){

    //     $Data = $this->Products->find('all')->contain(['Productrates'=> function($osama) {
    //                                     $osama->select([
    //                                         'Productrates.product_id',
    //                                         'stars' => $osama->func()->sum('Productrates.rate'),
    //                                         'count' => $osama->func()->count('Productrates.product_id')
    //                                     ])
    //                                     ->group(['Productrates.product_id']);
    //                                     return $osama;
    //                                 }])->toarray();

    //                                 $this->set('data', $Data);
    //                                 $this->set('_serialize', ['data']);
    // }
    public function getallproductrates(){

      $Data = $this->Products->getproductrates('Productrates');
      $this->set('data', $Data);
      $this->set('_serialize', ['data']);
  }

    function GetDoctorServices($id){
      $Data = $this->Products->find('all')->where(['Products.id'=>$id])->contain(['Productrates'=>['Users'],'TotalRating'=> function($osama) {
                                      $osama->select([
                                          'TotalRating.product_id',
                                          'TotalRating.user_id',
                                          'stars' => $osama->func()->sum('TotalRating.rate'),
                                          'count' => $osama->func()->count('TotalRating.product_id'),

                                      ]);
                                      return $osama;
                                  }])->toarray();

           $this->set('data', $Data);
      $this->set('_serialize', ['data']);
    }
 
}
