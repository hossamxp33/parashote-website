<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Paymentstores Controller
 *
 * @property \App\Model\Table\PaymentstoresTable $Paymentstores
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class PaymentstoresController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getallpayment','add']); // the pages that available to user without need api token.
    }

    public function add()
    {
        $addpaymentstore=$this->Paymentstores->adddata($this->request->data);
        $this->set(compact('addpaymentstore'));
        $this->set('_serialize', ['addpaymentstore']);
    }
    







}
