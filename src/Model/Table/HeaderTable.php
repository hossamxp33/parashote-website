<?php
namespace App\Model\Table;

use App\Model\Entity\Header;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Header Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\HasMany $Designs
 */
class HeaderTable extends Table
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

        $this->table('header');
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
            'foreignKey' => 'header_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
     /*
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('background', 'create')
            ->notEmpty('background');

        $validator
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        $validator
            ->requirePresence('right_icon', 'create')
            ->notEmpty('right_icon');

        $validator
            ->requirePresence('left_icon', 'create')
            ->notEmpty('left_icon');

        return $validator;
    }*/

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
     
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['template_id'], 'Templates'));
        return $rules;
    }
    public function addheader($data,$username){
        $varaddheader=$data;
      $headeradd=$this->newEntity();
    //  if ($this->request->is('post')) {
if(isset($data['logo']['name'])){
$path_info = pathinfo($data['logo']['name']);
chmod($data['logo']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
$fullpath = WWW_ROOT."library".'/'.$this->save($headeradd)->id.'/'.'headerlogo';
if(!is_dir($fullpath)) {
mkdir($fullpath, 0777, true);
}
move_uploaded_file($data['logo']['tmp_name'], $fullpath.DS.$photoo);
$data['logo'] = $photoo;
}else{
    $data['logo']['name']= $headeradd['logo'];
  }
if(isset($data['right_icon']['name'])){
$path_info = pathinfo($data['right_icon']['name']);
chmod($data['right_icon']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
$fullpath = WWW_ROOT."library".'/'.$this->save($headeradd)->id.'/'.'headerrighticon';
if(!is_dir($fullpath)) {
mkdir($fullpath, 0777, true);
}
move_uploaded_file($data['right_icon']['tmp_name'], $fullpath.DS.$photoo);
$data['right_icon'] = $photoo;
}else{
    $data['right_icon']['name']= $headeradd['right_icon'];
  }
if(isset($data['left_icon']['name'])){
$path_info = pathinfo($data['left_icon']['name']);
chmod($data['left_icon']['tmp_name'], 0644);
$photoo = time().mt_rand().".".$path_info['extension'];
//$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
$fullpath = WWW_ROOT."library".'/'.$this->save($headeradd)->id.'/'.'headerlefticon';
if(!is_dir($fullpath)) {
mkdir($fullpath, 0777, true);
}
move_uploaded_file($data['left_icon']['tmp_name'], $fullpath.DS.$photoo);
$data['left_icon'] = $photoo;
}else{
    $data['left_icon']['name']= $headeradd['left_icon'];
  }
          $headeradd = $this->patchEntity($headeradd, $data);
          if ($this->save($headeradd)) {
            //  $this->Flash->success(___('the body has been saved'), ['plugin' => 'Alaxos']);
            //  return $this->redirect(['action' => 'view', $body->id]);
          } else {
            //  $this->Flash->error(___('the body could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
          }
      //}
      return  $varaddheader;
    }

    public function editheader($data,$id)
    {
        $vareditheader=$data;
        $headeredit = $this->get($id, [
            'contain' => []
        ]);
        if(!empty($data['logo']['name'])){
            $path_info = pathinfo($data['logo']['name']);
            chmod($data['logo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($headeredit)->id.'/'.'headerlogo';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['logo']['tmp_name'], $fullpath.DS.$photoo);
            $data['logo'] = $photoo;
            }else{
                $data['logo']= $headeredit['logo'];
              }
            if(!empty($data['right_icon']['name'])){
            $path_info = pathinfo($data['right_icon']['name']);
            chmod($data['right_icon']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($headeredit)->id.'/'.'headerrighticon';
            $ahmed=URL.'library'.'/'.$this->save($headeredit)->id.'/'.'headerrighticon';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['right_icon']['tmp_name'], $fullpath.DS.$photoo);
            $data['right_icon'] =$ahmed.DS.$photoo;
            }else{
                $data['right_icon']= $headeredit['right_icon'];
              }
            if(!empty($data['left_icon']['name'])){
            $path_info = pathinfo($data['left_icon']['name']);
            chmod($data['left_icon']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($headeredit)->id.'/'.'headerlefticon';
            $ahmed=URL.'library'.'/'.$this->save($headeredit)->id.'/'.'headerlefticon';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['left_icon']['tmp_name'], $fullpath.DS.$photoo);
            $data['left_icon'] = $ahmed.DS.$photoo;
            }else{
                $data['left_icon']= $headeredit['left_icon'];
              }
       
       // if ($this->request->is(['patch', 'post', 'put'])) {
            $headeredit = $this->patchEntity($headeredit, $data);
            if ($this->save($headeredit)) {
              //  $this->Flash->success(___('the header has been saved'), ['plugin' => 'Alaxos']);
            //    return $this->redirect(['action' => 'view', $header->id]);
            } else {
              //  $this->Flash->error(___('the header could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
            return $vareditheader;
       // }

    }

}
