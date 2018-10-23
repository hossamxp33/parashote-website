<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class PaymentsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getallpayment']); // the pages that available to user without need api token.
    }

    public function getallpayment(){
      $Data=$this->Payments->getall();
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }







}
