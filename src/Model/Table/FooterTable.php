<?php
namespace App\Model\Table;

use App\Model\Entity\Footer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Footer Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\HasMany $Designs
 */
class FooterTable extends Table
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

        $this->table('footer');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Designs', [
            'foreignKey' => 'footer_id'
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

    //     // $validator
    //     //     ->requirePresence('border_color', 'create')
    //     //     ->notEmpty('border_color');
    //     //
    //     // $validator
    //     //     ->requirePresence('background', 'create')
    //     //     ->notEmpty('background');
    //     //
    //     // $validator
    //     //     ->requirePresence('first_icon', 'create')
    //     //     ->notEmpty('first_icon');
    //     //
    //     // $validator
    //     //     ->requirePresence('first_label', 'create')
    //     //     ->notEmpty('first_label');
    //     //
    //     // $validator
    //     //     ->requirePresence('second_icon', 'create')
    //     //     ->notEmpty('second_icon');
    //     //
    //     // $validator
    //     //     ->requirePresence('second_label', 'create')
    //     //     ->notEmpty('second_label');
    //     //
    //     // $validator
    //     //     ->requirePresence('third_icon', 'create')
    //     //     ->notEmpty('third_icon');
    //     //
    //     // $validator
    //     //     ->requirePresence('third_label', 'create')
    //     //     ->notEmpty('third_label');
    //     //
    //     // $validator
    //     //     ->requirePresence('forth_icon', 'create')
    //     //     ->notEmpty('forth_icon');
    //     //
    //     // $validator
    //     //     ->requirePresence('forth_label', 'create')
    //     //     ->notEmpty('forth_label');
    //     //
    //     // $validator
    //     //     ->requirePresence('fifth_icon', 'create')
    //     //     ->notEmpty('fifth_icon');
    //     //
    //     // $validator
    //     //     ->requirePresence('fifth_label', 'create')
    //     //     ->notEmpty('fifth_label');

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
    //     $rules->add($rules->existsIn(['template_id'], 'Templates'));
    //     return $rules;
    // }
    public function editfooter($data,$id)
    {
        $vareditfooter=$data;
        $footeredit = $this->get($id, [
            'contain' => []
        ]);
        if(!empty($data['first_icon']['name'])){
            $path_info = pathinfo($data['first_icon']['name']);
            chmod($data['first_icon']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($footeredit)->id.'/'.'footerfirsticon';
            $ahmed=URL.'library'.'/'.$this->save($footeredit)->id.'/'.'footerfirsticon';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['first_icon']['tmp_name'], $fullpath.DS.$photoo);
            $data['first_icon'] = $ahmed.DS.$photoo;
            }else{
                $data['first_icon']= $footeredit['first_icon'];
              }
              if(!empty($data['second_icon']['name'])){
                $path_info = pathinfo($data['second_icon']['name']);
                chmod($data['second_icon']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($footeredit)->id.'/'.'footersecondicon';
                $ahmed=URL.'library'.'/'.$this->save($footeredit)->id.'/'.'footersecondicon';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['second_icon']['tmp_name'], $fullpath.DS.$photoo);
                $data['second_icon'] = $ahmed.DS.$photoo;
                }else{
                    $data['second_icon']= $footeredit['second_icon'];
                  }
                  if(!empty($data['third_icon']['name'])){
                    $path_info = pathinfo($data['third_icon']['name']);
                    chmod($data['third_icon']['tmp_name'], 0644);
                    $photoo = time().mt_rand().".".$path_info['extension'];
                    //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                    $fullpath = WWW_ROOT."library".'/'.$this->save($footeredit)->id.'/'.'footerthirdicon';
                    $ahmed=URL.'library'.'/'.$this->save($footeredit)->id.'/'.'footerthirdicon';
                    if(!is_dir($fullpath)) {
                    mkdir($fullpath, 0777, true);
                    }
                    move_uploaded_file($data['third_icon']['tmp_name'], $fullpath.DS.$photoo);
                    $data['third_icon'] = $ahmed.DS.$photoo;
                    }else{
                        $data['third_icon']= $footeredit['third_icon'];
                      }
                      if(!empty($data['forth_icon']['name'])){
                        $path_info = pathinfo($data['forth_icon']['name']);
                        chmod($data['forth_icon']['tmp_name'], 0644);
                        $photoo = time().mt_rand().".".$path_info['extension'];
                        //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                        $fullpath = WWW_ROOT."library".'/'.$this->save($footeredit)->id.'/'.'footerforthicon';
                        $ahmed=URL.'library'.'/'.$this->save($footeredit)->id.'/'.'footerforthicon';
                        if(!is_dir($fullpath)) {
                        mkdir($fullpath, 0777, true);
                        }
                        move_uploaded_file($data['forth_icon']['tmp_name'], $fullpath.DS.$photoo);
                        $data['forth_icon'] = $ahmed.DS.$photoo;
                        }else{
                            $data['forth_icon']= $footeredit['forth_icon'];
                          }

                          if(!empty($data['fifth_icon']['name'])){
                            $path_info = pathinfo($data['fifth_icon']['name']);
                            chmod($data['fifth_icon']['tmp_name'], 0644);
                            $photoo = time().mt_rand().".".$path_info['extension'];
                            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                            $fullpath = WWW_ROOT."library".'/'.$this->save($footeredit)->id.'/'.'footerfifthicon';
                            $ahmed=URL.'library'.'/'.$this->save($footeredit)->id.'/'.'footerfifthicon';
                            if(!is_dir($fullpath)) {
                            mkdir($fullpath, 0777, true);
                            }
                            move_uploaded_file($data['fifth_icon']['tmp_name'], $fullpath.DS.$photoo);
                            $data['fifth_icon'] = $ahmed.DS.$photoo;
                            }else{
                                $data['fifth_icon'] = $footeredit['fifth_icon'];
                              }
       // if ($this->request->is(['patch', 'post', 'put'])) {
        $footeredit = $this->patchEntity($footeredit, $data);
            if ($this->save($footeredit)) {
              //  $this->Flash->success(___('the header has been saved'), ['plugin' => 'Alaxos']);
            //    return $this->redirect(['action' => 'view', $header->id]);
            } else {
              //  $this->Flash->error(___('the header could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
       // }
            return $vareditfooter;
    }
    public function addfooter($data)
    {
        $varaddfooter=$data;
        $footer = $this->newEntity();
        if(isset($data['first_icon']['name'])){
            $path_info = pathinfo($data['first_icon']['name']);
            chmod($data['first_icon']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($footer)->id.'/'.'footerfirsticon';
            $ahmed=URL.'library'.'/'.$this->save($footer)->id.'/'.'footerfirsticon';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['first_icon']['tmp_name'], $fullpath.DS.$photoo);
            $data['first_icon'] = $ahmed.DS.$photoo;
            }else{
                $data['first_icon']= $footer['first_icon'];
              }
              if(isset($data['second_icon']['name'])){
                $path_info = pathinfo($data['second_icon']['name']);
                chmod($data['second_icon']['tmp_name'], 0644);
                $photoo = time().mt_rand().".".$path_info['extension'];
                //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                $fullpath = WWW_ROOT."library".'/'.$this->save($footer)->id.'/'.'footersecondicon';
                $ahmed=URL.'library'.'/'.$this->save($footer)->id.'/'.'footersecondicon';
                if(!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
                }
                move_uploaded_file($data['second_icon']['tmp_name'], $fullpath.DS.$photoo);
                $data['second_icon'] = $ahmed.DS.$photoo;
                }else{
                    $data['second_icon']= $footer['second_icon'];
                  }
                  if(isset($data['third_icon']['name'])){
                    $path_info = pathinfo($data['third_icon']['name']);
                    chmod($data['third_icon']['tmp_name'], 0644);
                    $photoo = time().mt_rand().".".$path_info['extension'];
                    //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                    $fullpath = WWW_ROOT."library".'/'.$this->save($footer)->id.'/'.'footerthirdicon';
                    $ahmed=URL.'library'.'/'.$this->save($footer)->id.'/'.'footerthirdicon';
                    if(!is_dir($fullpath)) {
                    mkdir($fullpath, 0777, true);
                    }
                    move_uploaded_file($data['third_icon']['tmp_name'], $fullpath.DS.$photoo);
                    $data['third_icon'] = $ahmed.DS.$photoo;
                    }else{
                        $data['third_icon']= $footer['third_icon'];
                      }
                      if(isset($data['forth_icon']['name'])){
                        $path_info = pathinfo($data['forth_icon']['name']);
                        chmod($data['forth_icon']['tmp_name'], 0644);
                        $photoo = time().mt_rand().".".$path_info['extension'];
                        //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                        $fullpath = WWW_ROOT."library".'/'.$this->save($footer)->id.'/'.'footerforthicon';
                        $ahmed=URL.'library'.'/'.$this->save($footer)->id.'/'.'footerforthicon';
                        if(!is_dir($fullpath)) {
                        mkdir($fullpath, 0777, true);
                        }
                        move_uploaded_file($data['forth_icon']['tmp_name'], $fullpath.DS.$photoo);
                        $data['forth_icon'] = $ahmed.DS.$photoo;
                        }else{
                            $data['forth_icon']= $footer['forth_icon'];
                          }

                          if(isset($data['fifth_icon']['name'])){
                            $path_info = pathinfo($data['fifth_icon']['name']);
                            chmod($data['fifth_icon']['tmp_name'], 0644);
                            $photoo = time().mt_rand().".".$path_info['extension'];
                            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
                            $fullpath = WWW_ROOT."library".'/'.$this->save($footer)->id.'/'.'footerfifthicon';
                            $ahmed=URL.'library'.'/'.$this->save($footer)->id.'/'.'footerfifthicon';
                            if(!is_dir($fullpath)) {
                            mkdir($fullpath, 0777, true);
                            }
                            move_uploaded_file($data['fifth_icon']['tmp_name'], $fullpath.DS.$photoo);
                            $data['fifth_icon'] = $ahmed.DS.$photoo;
                            }else{
                                $data['fifth_icon']= $footer['fifth_icon'];
                              }
            $footer = $this->patchEntity($footer, $data);
            if ($this->save($footer)) {
               // $this->Flash->success(___('the footer has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $footer->id]);
            } else {
               // $this->Flash->error(___('the footer could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $varaddfooter;
    }
}
