<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token','register','addusers']);
    }
    // public function addusers()
    // {
    //     $user = $this->Users->newEntity();
    //     if ($this->request->is('post')) {
    //         $user = $this->Users->patchEntity($user, $this->request->data);
    //         if ($this->Users->save($user)) {
    //           $this->loadModel('Stores');
    //         $arraystore=array();
    //       $arraystore['name']='ahmed567';
    //       $arraystore['user_id']=$user->id;
    //       $store = $this->Stores->newEntity();
    //    $store = $this->Stores->patchEntity($store,$arraystore);
    //    $this->Stores->save($store);    
     
    //            // $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
    //             //return $this->redirect(['action' => 'view', $user->id]);
    //         } else {
    //            // $this->Flash->error(___('the user could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
    //         }
    //     }
    //     $this->set(compact('user'));
    //     $this->set('_serialize', ['user']);
    // }
    public function addusers(){
      $adduser=$this->Users->adddata($this->request->data);
   
 
  $this->loadModel('Body');
  $this->loadModel('Footer');
  $this->loadModel('Header');
  $this->loadModel('Designs');
$arrayheader=array();
$arrayheader['background']='#67236c';

$arrayheader['template_id']=$this->request->data['template_id'];
$header = $this->Header->newEntity();
$arrayheader['logo']='http://localhost/parashote/library'.'/'.'default'.'/'.'15371356551079414738.jpg';
$arrayheader['right_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'1538817047785890060.png';
$arrayheader['left_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'15388170471708638659.png';


$header = $this->Header->patchEntity($header,$arrayheader);
$this->Header->save($header);


$arraybody=array();
$arraybody['background']='#e6eaed';
$arraybody['first_label']='اختر حسب القسم';
$arraybody['second_label']='تصفح الافضل تقيما';
$arraybody['third_label']='تصفح حسب الفئه';
$arraybody['template_id']=$this->request->data['template_id'];
$arraybody['categorybackground']='#ffffff';
$body = $this->Body->newEntity();
$body = $this->Body->patchEntity($body, $arraybody);
$this->Body->save($body);



$arrayfooter=array();
$arrayfooter['border']='false';
$arrayfooter['shadow']='false';
$arrayfooter['background']='#ffffff';
$arrayfooter['first_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'15388186611922255985.png';
$arrayfooter['first_label']='الرئيسيه';
$arrayfooter['second_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'1538818661553888991.png';
$arrayfooter['second_label']='طلباتي';
$arrayfooter['third_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'15388186612053260190.png';
$arrayfooter['third_label']='عروض';
$arrayfooter['forth_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'1538818661253716771.png';
$arrayfooter['forth_label']='اشعارات';
$arrayfooter['fifth_icon']='http://localhost/parashote/library'.'/'.'default'.'/'.'1538818661177352465.png';
$arrayfooter['fifth_label']='المزيد';
$arrayfooter['template_id']=$this->request->data['template_id'];
$arrayfooter['font_color']='#686868';
$footer = $this->Footer->newEntity();
$footer = $this->Footer->patchEntity($footer, $arrayfooter);
$this->Footer->save($footer);
$footer =  $this->Footer->save($footer);

$designarr = array();
$designarr['header_id']=$header->id;
$designarr['footer_id']=$footer->id;
$designarr['body_id']=$body->id;

$design = $this->Designs->newEntity();
$design = $this->Designs->patchEntity($design, $designarr);
$this->Designs->save($design);
$this->loadModel('Stores');
$arraystore=array();

//$arraystore['name']=$this->request->data['Stores']['name'];
$arraystore['name']=$this->request->data['name'];
$arraystore['user_id']=$adduser->id;
$arraystore['template_id']=$this->request->data['template_id'];
$arraystore['design_id']=$design->Id;
$arraystore['commercial_register_photo']='http://localhost/parashote/library'.'/'.'default'.'/'.'15395160301444450787.png';
$store = $this->Stores->newEntity();
$store = $this->Stores->patchEntity($store,$arraystore);
$this->Stores->save($store);
if ($this->Designs->save($design)) {
 $this->loadModel('Storesettings');
 $arraystoresetting=array();
 $arraystoresetting['store_id']=$store->id;
 $arraystoresetting['payment_id']=1;
 $arraystoresetting['design_id']=$design->Id;
 $arraystoresetting['font']='jf flat';
 $arraystoresetting['first_splash']='http://localhost/parashote/library'.'/'.'default'.'/'.'15395177111912353612.png';
 $arraystoresetting['second_splash']='http://localhost/parashote/library'.'/'.'default'.'/'.'15395177111068108577.png';
 $arraystoresetting['third_splash']='http://localhost/parashote/library'.'/'.'default'.'/'.'15395177112091139752.png';
 $arraystoresetting['forth_splash']='http://localhost/parashote/library'.'/'.'default'.'/'.'15395177111800883608.png';
 $arraystoresetting['logo']='http://localhost/parashote/library'.'/'.'default'.'/'.'15395177111708407597.png';
 $arraystoresetting['longitude']=10;
 $arraystoresetting['latitude']=25;
 $storesetting = $this->Storesettings->newEntity();
 $storesetting = $this->Storesettings->patchEntity($storesetting, $arraystoresetting);
 $this->Storesettings->save($storesetting);
 }
 $this->loadModel('Categories');
 $arraycategory=array();
 $arraycategory['name']='صيدليات';
 $arraycategory['photo']='http://localhost/parashote/library'.'/'.'default'.'/'.'15390011022075448618.png';
 
 $category = $this->Categories->newEntity();
 $category = $this->Categories->patchEntity($category, $arraycategory);
 $this->Categories->save($category);

 foreach($arraycategory as $key=>$row){
  $arrayahmed=array();
  $arrayahmed['name']='مطاعم';
  $arrayahmed['photo']='http://localhost/parashote/library'.'/'.'default'.'/'.'15390008811521779367.png';
$category = $this->Categories->newEntity();
  $category = $this->Categories->patchEntity($category, $arrayahmed);
  $this->Categories->save($category);
 }



 $this->set(compact('adduser','store','header','body','footer','design','storesetting','category'));
 $this->set('_serialize', ['adduser','store','header','body','footer','design','storesetting','category']);
}

  

    public function add()
{
  $this->loadModel('Stores');
            $arraystore=array();
          $arraystore['name']=$this->request->data['Stores']['name'];
//$arraystore['user_id']=$this->request->data['Users']['id'];
//$arraystore['template_id']=1;
// $store = $this->Stores->newEntity();
// $store = $this->Stores->patchEntity($store,$arraystore);
// $this->Stores->save($store);
    $this->Crud->on('afterSave', function(Event $event) {
        if ($event->subject->created) {
            $this->set('data', [
                'id' => $event->subject->entity->id,
                'token' => JWT::encode(
                    [
                        'sub' => $event->subject->entity->id,
                        'exp' =>  time() + 604800
                    ],
                Security::salt())
            ]);
          
            $this->Crud->action()->config('serialize.data', 'data');
        }
    });

    return $this->Crud->execute();
}
public function token()
{
    $user = $this->Auth->identify();
    if (!$user) {
        throw new UnauthorizedException('Invalid username or password');
    }

    $this->set([
        'success' => true,
        'data' => [
            'token' => JWT::encode([
                'sub' => $user['id'],
                'exp' =>  time() + 604800
            ],
            Security::salt())
        ],
        '_serialize' => ['success', 'data']
    ]);
}
public function register() {
  debug($this->request->data);
  $this->viewBuilder()->layout('default') ;
  $userId = $this->UserAuth->getUserId();
  if($userId) {
    $this->redirect(['action'=>'dashboard']);
  }
  if(SITE_REGISTRATION) {
    $this->loadModel('Usermgmt.UserGroups');
    $userGroups = $this->UserGroups->getGroupsForRegistration();
    if($this->request->is('post') && $this->UserAuth->canUseRecaptha('registration') && !$this->request->is('ajax')) {
      $this->request->data['Users']['captcha'] = (isset($this->request->data['g-recaptcha-response'])) ? $this->request->data['g-recaptcha-response'] : "";
    }
    $userEntity = $this->Users->newEntity($this->request->data, ['validate'=>'forRegister']);
    if($this->request->is('post')) {
      $errors = $userEntity->errors();
      if($this->request->is('ajax')) {
        if(empty($errors)) {
          $response = ['error'=>0, 'message'=>'success'];
        } else {
          $response = ['error'=>1, 'message'=>'failure'];
          $response['data']['Users'] = $errors;
        }
        echo json_encode($response);exit;
      } else {
        if(empty($errors)) {
          if(!isset($this->request->data['Users']['user_group_id'])) {
            $userEntity['user_group_id'] = DEFAULT_GROUP_ID;
          }
          if(!EMAIL_VERIFICATION) {
            $userEntity['email_verified'] = 1;
          }
          $userEntity['active'] = 1;
          $userEntity['ip_address'] = $this->request->clientIp();
          $userEntity['password'] = $this->UserAuth->makeHashedPassword($userEntity['password']);
          // $userEntity['first_name'] = $userEntity['first_name'];
          // $userEntity['last_name'] = $userEntity['last_name'];
          if($this->Users->save($userEntity, ['validate'=>false])) {
            $userId = $userEntity['id'];


            $this->loadModel('Usermgmt.UserDetails');
            $userDetailEntity = $this->UserDetails->newEntity();
            $userDetailEntity['user_id'] = $userId;
            $this->UserDetails->save($userDetailEntity, ['validate'=>false]);
            if(EMAIL_VERIFICATION) {
              $this->Users->sendVerificationMail($userEntity);
            }
            if(SEND_REGISTRATION_MAIL) {
              $this->Users->sendRegistrationMail($userEntity);
            }
            if(isset($userEntity['active']) && $userEntity['active'] && !EMAIL_VERIFICATION) {
              $user = $this->Users->getUserById($userId);
              $user = $user->toArray();
              $this->UserAuth->login($user);
              $this->redirect($this->Auth->redirectUrl());
            } else {
              $this->Flash->success(__('We have sent an email to you, please confirm your registration'));
              //$this->redirect(['action'=>'login']);
            }
          } else {
            $this->Flash->error(__('Unable to register user, please try again'));
          }
        }
      }
    }
    $this->set(compact('userGroups', 'userEntity'));
  } else {
    $this->Flash->info(__('Sorry new registration is currently disabled, please try again later'));
    $this->redirect(['action'=>'login']);
  }
}
}
