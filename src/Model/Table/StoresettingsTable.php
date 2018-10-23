<?php
namespace App\Model\Table;

use App\Model\Entity\Storesetting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storesettings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stores
 * @property \Cake\ORM\Association\BelongsTo $Payments
 * @property \Cake\ORM\Association\BelongsTo $Designs
 */
class StoresettingsTable extends Table
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

        $this->table('storesettings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Designs', [
            'foreignKey' => 'design_id',
            'joinType' => 'INNER'
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
    //
    //     $validator
    //         ->requirePresence('font', 'create')
    //         ->notEmpty('font');
    //
    //     $validator
    //         ->requirePresence('photo', 'create')
    //         ->notEmpty('photo');
    //
    //     $validator
    //         ->requirePresence('longitude', 'create')
    //         ->notEmpty('longitude');
    //
    //     $validator
    //         ->requirePresence('latitude', 'create')
    //         ->notEmpty('latitude');
    //
    //     return $validator;
    // }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function editData($data,$id)
    {
        $storesetting = $this->get($id, [
            'contain' => []
        ]);
            $editstoresetting=$data;
            if(!empty($data['first_splash']['name'])){
                $path_info = pathinfo($data['first_splash']['name']);
                chmod($data['first_splash']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($storesetting)->id.'/'.'storesettingfirstsplash';
                $ahmed=URL.'library'.'/'.$this->save($storesetting)->id.'/'.'storesettingfirstsplash';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['first_splash']['tmp_name'], $fullpath.DS.$photoo);
                $data['first_splash'] = $ahmed.DS.$photoo;
            }else{
                $data['first_splash']= $storesetting['first_splash'];
              }
    
            if(!empty($data['second_splash']['name'])){
                $path_info = pathinfo($data['second_splash']['name']);
                chmod($data['second_splash']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($storesetting)->id.'/'.'storesettingsecondsplash';
                $ahmed=URL.'library'.'/'.$this->save($storesetting)->id.'/'.'storesettingsecondsplash';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['second_splash']['tmp_name'], $fullpath.DS.$photoo);
                $data['second_splash'] = $ahmed.DS.$photoo;
            }else{
                $data['second_splash']= $storesetting['second_splash'];
              }
    
              if(!empty($data['third_splash']['name'])){
                $path_info = pathinfo($data['third_splash']['name']);
                chmod($data['third_splash']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($storesetting)->id.'/'.'storesettingthirdsplash';
                $ahmed=URL.'library'.'/'.$this->save($storesetting)->id.'/'.'storesettingthirdsplash';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['third_splash']['tmp_name'], $fullpath.DS.$photoo);
                $data['third_splash'] = $ahmed.DS.$photoo;
            }else{
                $data['third_splash']= $storesetting['third_splash'];
              }
    
              if(!empty($data['forth_splash']['name'])){
                $path_info = pathinfo($data['forth_splash']['name']);
                chmod($data['forth_splash']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($storesetting)->id.'/'.'storesettingforthsplash';
                $ahmed=URL.'library'.'/'.$this->save($storesetting)->id.'/'.'storesettingforthsplash';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['forth_splash']['tmp_name'], $fullpath.DS.$photoo);
                $data['forth_splash'] = $ahmed.DS.$photoo;
            }else{
                $data['forth_splash']= $storesetting['forth_splash'];
              }
    
            if(!empty($data['logo']['name'])){
                $path_info = pathinfo($data['logo']['name']);
                chmod($data['logo']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($storesetting)->id.'/'.'storesettinglogo';
                $ahmed=URL.'library'.'/'.$this->save($storesetting)->id.'/'.'storesettinglogo';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['logo']['tmp_name'], $fullpath.DS.$photoo);
                $data['logo'] = $ahmed.DS.$photoo;
            }else{
                $data['logo']= $storesetting['logo'];
              }

   

            $storesetting = $this->patchEntity($storesetting, $data);
            if ($this->save($storesetting)) {
                //$this->Flash->success(___('the storesetting has been saved'), ['plugin' => 'Alaxos']);
                //return $this->redirect(['action' => 'view', $storesetting->id]);
            } else {
              //  $this->Flash->error(___('the storesetting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
       return $editstoresetting;

    }

    public function adddata($data)
    {
        
        $varaddstoresettingdata=$data;
        $addstoresetting = $this->newEntity();
        if(!empty($data['first_splash']['name'])){
            $path_info = pathinfo($data['first_splash']['name']);
            chmod($data['first_splash']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($addstoresetting)->id.'/'.'storesettingfirstsplash';
            
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['first_splash']['tmp_name'], $fullpath.DS.$photoo);
            $data['first_splash'] = $photoo;
        }else{
            $data['first_splash']= $addstoresetting['first_splash'];
          }

        if(!empty($data['second_splash']['name'])){
            $path_info = pathinfo($data['second_splash']['name']);
            chmod($data['second_splash']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($addstoresetting)->id.'/'.'storesettingsecondsplash';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['second_splash']['tmp_name'], $fullpath.DS.$photoo);
            $data['second_splash'] = $photoo;
        }else{
            $data['second_splash']= $addstoresetting['second_splash'];
          }

          if(!empty($data['third_splash']['name'])){
            $path_info = pathinfo($data['third_splash']['name']);
            chmod($data['third_splash']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($addstoresetting)->id.'/'.'storesettingthirdsplash';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['third_splash']['tmp_name'], $fullpath.DS.$photoo);
            $data['third_splash'] = $photoo;
        }else{
            $data['third_splash']= $addstoresetting['third_splash'];
          }

          if(!empty($data['forth_splash']['name'])){
            $path_info = pathinfo($data['forth_splash']['name']);
            chmod($data['forth_splash']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($addstoresetting)->id.'/'.'storesettingforthsplash';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['forth_splash']['tmp_name'], $fullpath.DS.$photoo);
            $data['forth_splash'] = $photoo;
        }else{
            $data['forth_splash']= $addstoresetting['forth_splash'];
          }

        if(!empty($data['logo']['name'])){
            $path_info = pathinfo($data['logo']['name']);
            chmod($data['logo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($addstoresetting)->id.'/'.'storesettinglogo';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['logo']['tmp_name'], $fullpath.DS.$photoo);
            $data['logo'] = $photoo;
        }else{
            $data['logo']= $addstoresetting['logo'];
          }


          $addstoresetting = $this->patchEntity($addstoresetting, $data);
            if ($this->save($addstoresetting)) {
                //$this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
               // $this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        
            return $varaddstoresettingdata;
    }
    //  public function buildRules(RulesChecker $rules)
    //  {
    //     $rules->add($rules->existsIn(['store_id'], 'Stores'));
    //     $rules->add($rules->existsIn(['payment_id'], 'Payments'));
    //      $rules->add($rules->existsIn(['design_id'], 'Designs'));
    //      return $rules;
    //  }
}
