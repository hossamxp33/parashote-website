<?php
namespace App\Model\Table;

use App\Model\Entity\Productfav;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productfavs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 */
class ProductfavsTable extends Table
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

        $this->table('productfavs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
    //         ->integer('amount')
    //         ->requirePresence('amount', 'create')
    //         ->notEmpty('amount');

    //     return $validator;
    // }
    public function editdata($data,$id)
    {
        $productfav = $this->get($id, [
            'contain' => []
        ]);
        $vareditproductfav=$data;
            $productfav = $this->patchEntity($productfav,$data);
            if ($this->save($productfav)) {
               // $this->Flash->success(___('the productfav has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productfav->id]);
            } else {
               // $this->Flash->error(___('the productfav could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
       
            return $vareditproductfav;
    }
    public function adddata($data)
    {
        $varaddproductfav=$data;
        $productfav = $this->newEntity();
            $productfav = $this->patchEntity($productfav, $data);
            if ($this->save($productfav)) {
                //$this->Flash->success(___('the productfav has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productfav->id]);
            } else {
                //$this->Flash->error(___('the productfav could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
       
            return $varaddproductfav;
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
    //     $rules->add($rules->existsIn(['product_id'], 'Products'));
    //     return $rules;
    // }
}
