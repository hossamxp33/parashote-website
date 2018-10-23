<?php
namespace App\Model\Table;

use App\Model\Entity\Productrate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productrates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 */
class ProductratesTable extends Table
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

        $this->table('productrates');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
    //         ->integer('rate')
    //         ->requirePresence('rate', 'create')
    //         ->notEmpty('rate');

    //     return $validator;
    // }
    public function editdata($data,$id)
    {
        $productrate = $this->get($id, [
            'contain' => []
        ]);
            $varproductrate=$data;
            $productrate = $this->patchEntity($productrate,$data);
            if ($this->save($productrate)) {
               // $this->Flash->success(___('the productrate has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productrate->id]);
            } else {
               // $this->Flash->error(___('the productrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $varproductrate;

    }
    public function adddata($data)
    {
        $varaddproductrates=$data;
        $productrate = $this->newEntity();
            $productrate = $this->patchEntity($productrate, $data);
            if ($this->save($productrate)) {
               // $this->Flash->success(___('the productrate has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productrate->id]);
            } else {
               // $this->Flash->error(___('the productrate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $varaddproductrates;
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
