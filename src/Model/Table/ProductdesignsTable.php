<?php
namespace App\Model\Table;

use App\Model\Entity\Productdesign;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productdesigns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $StoreSettings
 * @property \Cake\ORM\Association\BelongsTo $ProductTemplates
 */
class ProductdesignsTable extends Table
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

        $this->table('productdesigns');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('StoreSettings', [
            'foreignKey' => 'store_setting_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProductTemplates', [
            'foreignKey' => 'product_template_id',
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
    //         ->requirePresence('ShippingButtonColor', 'create')
    //         ->notEmpty('ShippingButtonColor');

    //     $validator
    //         ->requirePresence('AddCartColorButton', 'create')
    //         ->notEmpty('AddCartColorButton');

    //     return $validator;
    // }
    public function editdata($data,$id)
    {
        $productdesign = $this->get($id, [
            'contain' => []
        ]);
        $vareditproductdesign=$data;
            $productdesign = $this->patchEntity($productdesign, $data);
            if ($this->save($productdesign)) {
               // $this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
               // $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $vareditproductdesign;
    }

    public function adddata($data)
    {
        $varaddproductdesign=$data;
        $productdesign = $this->newEntity();
            $productdesign = $this->patchEntity($productdesign, $data);
            if ($this->save($productdesign)) {
                //$this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
               // $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $varaddproductdesign;
    }
    public function getproducttemplate($id,$select=array()){
        $Data=$this->find('all')->where(['id'=>$id])->select($select)->toarray();
        return $Data;
    }
    public function view($id){
        $data=$this->find('all')->where(['productdesigns.store_setting_id'=>$id])->toarray();
        return $data;

    }
    
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['store_setting_id'], 'StoreSettings'));
    //     $rules->add($rules->existsIn(['product_template_id'], 'ProductTemplates'));
    //     return $rules;
    // }
}
