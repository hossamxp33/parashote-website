<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\TemplatesTable $Products
 * @property \Alaxos\Controller\Component\filterComponent $filter
 */
class TemplatesController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['getalldata','data']); // the pages that available to user without need api token.
    }

function data($id){
$data = $this->Templates->getalldata($id);
$this->set('data',$data);
$this->set('_serialize', ['data']);
}

}
