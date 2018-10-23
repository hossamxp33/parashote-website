<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\FooterTable $Footer
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class FooterController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['edit','data','editdata']); // the pages that available to user without need api token.
    }

   
    function data(){
      $data = $this->Footer->addfooter($this->request->data);
      $this->set('data',$data);
      $this->set('_serialize', ['data']);
      }
      function editdata($id){
        $data = $this->Footer->editfooter($this->request->data,$id);
        $this->set('data',$data);
        $this->set('_serialize', ['data']);
        }
    
}
