<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Fonts Controller
 *
 * @property \App\Model\Table\FontsTable $Fonts
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class FontsController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getallFonts']); // the pages that available to user without need api token.
    }

    public function getallFonts(){
      $Data=$this->Fonts->view();
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }







}
