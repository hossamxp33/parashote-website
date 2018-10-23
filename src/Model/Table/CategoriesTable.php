<?php
namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \Cake\ORM\Association\HasMany $Products
 * @property \Cake\ORM\Association\HasMany $Subcats
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->hasMany('Products', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('Subcats', [
            'foreignKey' => 'category_id'
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
    //         ->requirePresence('name', 'create')
    //         ->notEmpty('name');

    //     $validator
    //         ->requirePresence('photo', 'create')
    //         ->notEmpty('photo');

    //     return $validator;
    // }
    public function getfavcategory($id,$contain=array()){
        $Data=$this->find('all')->where(['Categories.id'=>$id])->contain($contain)->toarray();
        return $Data;
    }
    public function add($data)
    {
        $varaddcategory=$data;
        $category = $this->newEntity();
        if(!empty($data['photo']['name'])){
            $path_info = pathinfo($data['photo']['name']);
            chmod($data['photo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($category)->id.'/'.'categoryphoto';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['photo']['tmp_name'], $fullpath.DS.$photoo);
            $data['photo'] = $photoo;
            }else{
                $data['Categories']['photo'] = null;
              }
        //if ($this->request->is('post')) {
            $category = $this->patchEntity($category, $data);
            if ($this->save($category)) {
               // $this->Flash->success(___('the category has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $category->id]);
            } else {
                //$this->Flash->error(___('the category could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        //}
        return $varaddcategory;
    }
    public function edit($data,$id)
    {
        $vareditcategory=$data;
        $category = $this->get($id, [
            'contain' => []
        ]);
        if(!empty($data['photo']['name'])){
            $path_info = pathinfo($data['photo']['name']);
            chmod($data['photo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library".'/'.$this->save($category)->id.'/'.'categoryphoto';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['photo']['tmp_name'], $fullpath.DS.$photoo);
            $data['photo'] = $photoo;
            }else{
                $data['photo'] = $category['photo'];
              }
       // if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->patchEntity($category, $data);
            if ($this->save($category)) {
                //$this->Flash->success(___('the category has been saved'), ['plugin' => 'Alaxos']);
                //return $this->redirect(['action' => 'view', $category->id]);
            } else {
                //$this->Flash->error(___('the category could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        //}
        return $vareditcategory;
    }
  
    
}

