<?php
namespace App\Model\Table;

use App\Model\Entity\Menu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Menuactions
 * @property \Cake\ORM\Association\BelongsTo $Stores
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 */
class MenusTable extends Table
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

        $this->table('menus');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Menuactions', [
            'foreignKey' => 'menuaction_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
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

    //     $validator
    //         ->requirePresence('first_label', 'create')
    //         ->notEmpty('first_label');

    //     $validator
    //         ->requirePresence('first_icon', 'create')
    //         ->notEmpty('first_icon');

    //     $validator
    //         ->requirePresence('second_label', 'create')
    //         ->notEmpty('second_label');

    //     $validator
    //         ->requirePresence('second_icon', 'create')
    //         ->notEmpty('second_icon');

    //     $validator
    //         ->requirePresence('third_label', 'create')
    //         ->notEmpty('third_label');

    //     $validator
    //         ->requirePresence('third_icon', 'create')
    //         ->notEmpty('third_icon');

    //     $validator
    //         ->requirePresence('border', 'create')
    //         ->notEmpty('border');

    //     return $validator;
    // }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function getmenudata($contain=array()){
        $Data=$this->find('all')->contain($contain)->toarray();
        return $Data;
    }
    public function adddata($data)
    {
        $varmenuadd=$data;
        $menu = $this->newEntity();
        if(isset($data['icon']['name'])){
            $path_info = pathinfo($data['icon']['name']);
            chmod($data['icon']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library/".$this->save($menu)->id.'/'.'menuicon';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['icon']['tmp_name'], $fullpath.DS.$photoo);
            $data['icon'] = $photoo;
          }else{
            $data['icon']['name']= $menu['photo'];
          }
       // if ($this->request->is('post')) {
            $menu = $this->patchEntity($menu, $data);
            if ($this->save($menu)) {
              //  $this->Flash->success(___('the menu has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $menu->id]);
            } else {
               // $this->Flash->error(___('the menu could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        //}
            return $varmenuadd;
    }
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['menuaction_id'], 'Menuactions'));
    //     $rules->add($rules->existsIn(['store_id'], 'Stores'));
    //     $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
    //     return $rules;
    // }
}
