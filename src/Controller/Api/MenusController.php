<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MenusController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getdata','add']); // the pages that available to user without need api token.
    }

    public function getdata(){
      $Data=$this->Menus->getmenudata(['Menuactions']);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function add(){
        $addmenu=$this->Menus->adddata($this->request->data);
        $this->set(compact('addmenu'));
        $this->set('_serialize', ['addmenu']);
    }







}
