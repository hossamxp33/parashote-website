<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Subcats Controller
 *
 * @property \App\Model\Table\SubcatsTable $Subcats
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class SubcatsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getrandomdata']); // the pages that available to user without need api token.
    }

public function getrandomdata(){
    $Data=$this->Subcats->getdata();
    $this->set('data',$Data);
    $this->set('_serialize', ['data']);
}

}