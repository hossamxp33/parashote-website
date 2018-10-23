<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
/**
 * Products Controller
 *
 * @property \App\Model\Table\StoresTable $Stores
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StoresController extends AppController
{
 public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['add','edit','getallstoredata','getstoreid','getheader','getbody','getfooter','getallstoredesigndata','getalluserstoredata','gettemplatedata']); // the pages that available to user without need api token.
    }

    // public function add()
    // {
    //     $store = $this->Stores->newEntity();
    //     if ($this->request->is('post')) {
    //       if(isset($this->request->data['photo']['name'])){
    //         $path_info = pathinfo($this->request->data['photo']['name']);
    //         chmod($this->request->data['photo']['tmp_name'], 0644);
    //         $photoo = time().mt_rand().".".$path_info['extension'];
    //         //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
    //         $fullpath = WWW_ROOT."library".'/'.'storephoto';
    //         if(!is_dir($fullpath)) {
    //         mkdir($fullpath, 0777, true);
    //         }
    //         move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photoo);
    //         $this->request->data['photo'] = $photoo;
    //       }else{
    //         $this->request->data['photo']['name']= $store['photo'];
    //       }

    //       if(isset($this->request->data['commercial_register_photo']['name'])){
    //         $path_info = pathinfo($this->request->data['commercial_register_photo']['name']);
    //         chmod($this->request->data['commercial_register_photo']['tmp_name'], 0644);
    //         $photoo = time().mt_rand().".".$path_info['extension'];
    //         //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
    //         $fullpath = WWW_ROOT."library".'/'.'storecommericalregister';
    //         if(!is_dir($fullpath)) {
    //         mkdir($fullpath, 0777, true);
    //         }
    //         move_uploaded_file($this->request->data['commercial_register_photo']['tmp_name'], $fullpath.DS.$photoo);
    //         $this->request->data['commercial_register_photo'] = $photoo;
    //       }

    //       $this->request->data['template_id']=1;
    //       $this->loadModel('Users');
          
    //         $store = $this->Stores->patchEntity($store, $this->request->data);
    //         if ($this->Stores->save($store)) {
    //           $this->loadModel('Body');
    //           $this->loadModel('Footer');
    //           $this->loadModel('Header');
    //           $this->loadModel('Designs');
    //         $arrayheader=array();
    //         $arrayheader['background']='#67236c';
    //         $arrayheader['logo']='15371356551079414738.jpg';
    //         $arrayheader['right_icon']='1538817047785890060.png';
    //         $arrayheader['left_icon']='15388170471708638659.png';
    //         $arrayheader['template_id']=1;
    //         $header = $this->Header->newEntity();
    //         $header = $this->Header->patchEntity($header,$arrayheader);
    //         $this->Header->save($header);
            
            
    //         $arraybody=array();
    //         $arraybody['background']='#a6eaed';
    //         $arraybody['first_label']='اختر حسب القسم';
    //         $arraybody['second_label']='تصفح الافضل تقيما';
    //         $arraybody['third_label']='تصفح حسب الفئه';
    //         $arraybody['template_id']=1;
    //         $arraybody['categorybackground']='#ffffff';
    //         $body = $this->Body->newEntity();
    //         $body = $this->Body->patchEntity($body, $arraybody);
    //         $this->Body->save($body);
            
            
            
    //         $arrayfooter=array();
    //         $arrayfooter['border']='false';
    //         $arrayfooter['shadow']='false';
    //         $arrayfooter['background']='#ffffff';
    //         $arrayfooter['first_icon']='15388186611922255985.png';
    //         $arrayfooter['first_label']='الرئيسيه';
    //         $arrayfooter['second_icon']='1538818661553888991.png';
    //         $arrayfooter['second_label']='طلباتي';
    //         $arrayfooter['third_icon']='15388186612053260190.png';
    //         $arrayfooter['third_label']='عروض';
    //         $arrayfooter['forth_icon']='1538818661253716771.png';
    //         $arrayfooter['forth_label']='اشعارات';
    //         $arrayfooter['fifth_icon']='1538818661177352465.png';
    //         $arrayfooter['fifth_label']='المزيد';
    //         $arrayfooter['template_id']=1;
    //         $arrayfooter['font_color']='#686868';
    //         $footer = $this->Footer->newEntity();
    //         $footer = $this->Footer->patchEntity($footer, $arrayfooter);
    //         $this->Footer->save($footer);
    //         $footer =  $this->Footer->save($footer);
            
    //         $deisgnarr = array();
            
    //         $deisgnarr['header_id']=$header->id;
    //         $deisgnarr['footer_id']=$footer->id;
    //         $deisgnarr['body_id']=$body->id;
            
    //         $design = $this->Designs->newEntity();
    //         $design = $this->Designs->patchEntity($design, $deisgnarr);
    //         $this->Designs->save($design);
 

    //           //  $this->Flash->success(___('the store has been saved'), ['plugin' => 'Alaxos']);
    //         } else {
    //         }
    //     }

    //     $this->set(compact('store', 'cities', 'subcats', 'users', 'designs','footer'));
    //     $this->set('_serialize', ['store','footer']);
    // }
    public function add(){
      $addstore=$this->Stores->adddata($this->request->data);
      $this->loadModel('Body');
      $this->loadModel('Footer');
      $this->loadModel('Header');
      $this->loadModel('Designs');
    $arrayheader=array();
    $arrayheader['background']='#67236c';
    $arrayheader['logo']='15371356551079414738.jpg';
    $arrayheader['right_icon']='1538817047785890060.png';
    $arrayheader['left_icon']='15388170471708638659.png';
    $arrayheader['template_id']=1;
    $header = $this->Header->newEntity();
    $header = $this->Header->patchEntity($header,$arrayheader);
    $this->Header->save($header);
    
    
    $arraybody=array();
    $arraybody['background']='#a6eaed';
    $arraybody['first_label']='اختر حسب القسم';
    $arraybody['second_label']='تصفح الافضل تقيما';
    $arraybody['third_label']='تصفح حسب الفئه';
    $arraybody['template_id']=1;
    $arraybody['categorybackground']='#ffffff';
    $body = $this->Body->newEntity();
    $body = $this->Body->patchEntity($body, $arraybody);
    $this->Body->save($body);
    
    
    
    $arrayfooter=array();
    $arrayfooter['border']='false';
    $arrayfooter['shadow']='false';
    $arrayfooter['background']='#ffffff';
    $arrayfooter['first_icon']='15388186611922255985.png';
    $arrayfooter['first_label']='الرئيسيه';
    $arrayfooter['second_icon']='1538818661553888991.png';
    $arrayfooter['second_label']='طلباتي';
    $arrayfooter['third_icon']='15388186612053260190.png';
    $arrayfooter['third_label']='عروض';
    $arrayfooter['forth_icon']='1538818661253716771.png';
    $arrayfooter['forth_label']='اشعارات';
    $arrayfooter['fifth_icon']='1538818661177352465.png';
    $arrayfooter['fifth_label']='المزيد';
    $arrayfooter['template_id']=1;
    $arrayfooter['font_color']='#686868';
    $footer = $this->Footer->newEntity();
    $footer = $this->Footer->patchEntity($footer, $arrayfooter);
    $this->Footer->save($footer);
    $footer =  $this->Footer->save($footer);
    
    $deisgnarr = array();
    
    $deisgnarr['header_id']=$header->id;
    $deisgnarr['footer_id']=$footer->id;
    $deisgnarr['body_id']=$body->id;
    
    $design = $this->Designs->newEntity();
    $design = $this->Designs->patchEntity($design, $deisgnarr);
    $this->Designs->save($design);

    $this->set(compact('addstore', 'cities', 'subcats', 'users', 'designs','footer'));
    $this->set('_serialize', ['addstore','footer']);
  }

    public function edit($id)
    {

//       $editvar2 = ($this->request->header('Authorization'));
//       $editvar = substr($editvar2,7);
//       JWT::encode(
//         [
//             'sub' => $event->subject->entity->id,
//             'exp' =>  time() + 604800
//         ],
//     Security::salt())
// ]);
        $editstore=$this->Stores->editData($this->request->data,$id);
        $this->set(compact('editstore'));
        $this->set('_serialize', ['editstore']);
    }
    public function getallstoredata($id){
     $Data = $this->Stores->getall(['Stores.id'=>$id],["Storesettings"]);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function getalluserstoredata($id){
      $Data=$this->Stores->getall(['Stores.user_id'=>$id],['Storesettings'=>['Designs'=>['Header','Body','Footer']]]);

       $this->set('data',$Data);
       $this->set('_serialize', ['data']);
     }
     public function gettemplatedata($id){
      $Data=$this->Stores->getall(['Stores.user_id'=>$id],['Templates']);

       $this->set('data',$Data);
       $this->set('_serialize', ['data']);
     }
    public function getstoreid($id){
      $Data = $this->Stores->getall($id,[]);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function getheader($id){
      $Data=$this->Stores->getall($id,['Designs'=>['Header']]);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function getbody($id){
      $Data=$this->Stores->getall($id,['Designs'=>['Body']]);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function getfooter($id){
      $Data=$this->Stores->getall($id,['Designs'=>['Footer']]);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function getallstoredesigndata($id){
      $Data=$this->Stores->getall($id,['Storesettings','Designs'=>['Header','Body','Footer']]);
      $this->set('data',$Data);
      $this->set('_serialize', ['data']);
    }
    public function home(){
      
    }
    







}
