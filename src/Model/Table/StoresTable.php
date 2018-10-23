<?php
namespace App\Model\Table;

use App\Model\Entity\Store;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsTo $Subcats
 * @property \Cake\ORM\Association\BelongsTo $Logodesigns
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Designs
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\BelongsTo $Catgeories
 * @property \Cake\ORM\Association\HasMany $Coupons
 * @property \Cake\ORM\Association\HasMany $Favourite
 * @property \Cake\ORM\Association\HasMany $Logodesigns
 * @property \Cake\ORM\Association\HasMany $Menus
 * @property \Cake\ORM\Association\HasMany $Models
 * @property \Cake\ORM\Association\HasMany $Paymentstores
 * @property \Cake\ORM\Association\HasMany $Photographers
 * @property \Cake\ORM\Association\HasMany $Products
 * @property \Cake\ORM\Association\HasMany $Storerates
 * @property \Cake\ORM\Association\HasMany $Storesettings
 */
class StoresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('stores');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('Subcats', [
            'foreignKey' => 'subcat_id'
        ]);
        $this->belongsTo('Logodesigns', [
            'foreignKey' => 'logodesign_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Designs', [
            'foreignKey' => 'design_id'
        ]);
        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Catgeories', [
            'foreignKey' => 'catgeory_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Coupons', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Favourite', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Logodesigns', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Menus', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Models', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Paymentstores', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Photographers', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Storerates', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('Storesettings', [
            'foreignKey' => 'store_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->integer('id')
    //         ->allowEmpty('id', 'create');

    //     $validator
    //         ->allowEmpty('name');

    //     $validator
    //         ->allowEmpty('bank_accounts');

    //     $validator
    //         ->allowEmpty('phone');

    //     $validator
    //         ->allowEmpty('alternative_phone');

    //     $validator
    //         ->allowEmpty('commercial_register_photo');

    //     $validator
    //         ->integer('commercial_register_number')
    //         ->requirePresence('commercial_register_number', 'create')
    //         ->notEmpty('commercial_register_number');

    //     $validator
    //         ->allowEmpty('link');

    //     $validator
    //         ->allowEmpty('description');

    //     $validator
    //         ->integer('branches')
    //         ->allowEmpty('branches');

    //     $validator
    //         ->dateTime('birthdate')
    //         ->allowEmpty('birthdate');

    //     $validator
    //         ->boolean('visible')
    //         ->allowEmpty('visible');

    //     return $validator;
    // }
    public function getall($id,$contain=array()){
        $Data=$this->find('all')->where($id)->contain($contain)->toarray();
        return $Data;
    }
  
    
// function editData($data,$id){

//     $store = $this->get($id, [
//         'contain' => []
//     ]);
//     $var = $data;
//    // $store['template_id']=$data['Stores']['template_id'];
//       if(isset($data['photo']['name'])){
//         $path_info = pathinfo($data['photo']['name']);
//         chmod($data['photo']['tmp_name'], 0644);
//         $photoo = time().mt_rand().".".$path_info['extension'];
//         //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
//         $fullpath = WWW_ROOT.'library'.'/'.$this->save($store)->id.'/'.'storephoto';
//         $ahmed=URL.'library'.'/'.$this->save($store)->id.'/'.'storephoto';

//         if(!is_dir($fullpath)) {
//         mkdir($fullpath, 0777, true);
//         }
//         move_uploaded_file($data['photo']['tmp_name'], $fullpath.DS.$photoo);
//         $data['photo'] = $ahmed.DS.$photoo;
//       }

//       if(!empty($data['commercial_register_photo']['name'])){
//         $path_info = pathinfo($data['commercial_register_photo']['name']);
//         chmod($data['commercial_register_photo']['tmp_name'], 0644);
//         $photoo = time().mt_rand().".".$path_info['extension'];
//         //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
//         $fullpath = WWW_ROOT."library".'/'.'storecommericalregister';
//         if(!is_dir($fullpath)) {
//         mkdir($fullpath, 0777, true);
//         }
//         move_uploaded_file($data['commercial_register_photo']['tmp_name'], $fullpath.DS.$photoo);
//         $data['commercial_register_photo'] = $photoo;
//       }else{
//         $data['commercial_register_photo']= $store['commercial_register_photo'];
//       }
         
//         $store = $this->patchEntity($store, $data);
//         if ($this->save($store)) {
//             //$this->Flash->success(___('the store has been saved'), ['plugin' => 'Alaxos']);
//             //return $this->redirect(['action' => 'view', $store->id]);
//         } else {
//            // $this->Flash->error(___('the store could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
//         }
   

// return   $var;
//  }
public function editData($dataa,$id)
    {
       
        $store = $this->get($id, [
            'contain' => []
        ]);
        $var = $dataa;
       // $store['template_id']=$data['Stores']['template_id'];

     //   if ($this->request->is(['patch', 'post', 'put'])) {
            
            if(!empty($dataa)){
                   foreach($dataa as $key => $data){
                  if(!empty($data['name'])){
                    $path_info = pathinfo($dataa[$key]['name']);
                    debug($dataa[$key]['name']);
       chmod($dataa[$key]['tmp_name'], 0644);
    $photoo = time().mt_rand().".".$path_info['extension'];

    $fullpath = WWW_ROOT.'library'.'/'.$id.'/'.'storephoto';
    $ahmed=URL.'library'.'/'.$id.'/'.'storephoto';
    if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
    }
    move_uploaded_file($dataa[$key]['tmp_name'], $fullpath.DS.$photoo);

    $dataa[$key] = $ahmed.DS.$photoo;  
   }else {
       if( $data['name'] == ''){
        $dataa[$key] = $store[$key];
   }
   }
         
    }
    $store = $this->patchEntity($store, $dataa);
            if ($this->save($store)) {
            

            } else {

            }
     }
             
          
              
           
           
      //  }
       
  
     return   $var;
    }
public function adddata($data)
    {
        
        $varaddstoredata=$data;
        $addstore = $this->newEntity();
        if(!empty($data['commercial_register_photo']['name'])){
            $path_info = pathinfo($data['commercial_register_photo']['name']);
            chmod($data['commercial_register_photo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($addstore)->id.'/'.'storecommericalregister';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['commercial_register_photo']['tmp_name'], $fullpath.DS.$photoo);
            $data['commercial_register_photo'] = $photoo;
          }else{
            $data['commercial_register_photo']= $addstore['commercial_register_photo'];
          }
            $addstore = $this->patchEntity($addstore, $data);
            if ($this->save($addstore)) {
                //$this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
               // $this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        
            return $varaddstoredata;
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->integer('id')
    //         ->allowEmpty('id', 'create');

    //     $validator
    //         ->allowEmpty('name');

    //     $validator
    //         ->allowEmpty('bank_accounts');

    //     $validator
    //         ->allowEmpty('phone');

    //     $validator
    //         ->allowEmpty('alternative_phone');

    //     $validator
    //         ->allowEmpty('commercial_register');

    //     $validator
    //         ->allowEmpty('link');

    //     $validator
    //         ->allowEmpty('description');

    //     $validator
    //         ->integer('branches')
    //         ->allowEmpty('branches');

    //     $validator
    //         ->dateTime('birthdate')
    //         ->allowEmpty('birthdate');

    //     $validator
    //         ->allowEmpty('visible');

    //     return $validator;
    // }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['city_id'], 'Cities'));
    //     $rules->add($rules->existsIn(['subcat_id'], 'Subcats'));
    //     $rules->add($rules->existsIn(['logodesign_id'], 'Logodesigns'));
    //     $rules->add($rules->existsIn(['user_id'], 'Users'));
    //     $rules->add($rules->existsIn(['design_id'], 'Designs'));
    //     $rules->add($rules->existsIn(['template_id'], 'Templates'));
    //     return $rules;
    // }
}
