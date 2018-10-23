<?php
namespace App\Model\Table;

use App\Model\Entity\Productsize;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productsizes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 */
class ProductsizesTable extends Table
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

        $this->table('productsizes');
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
    //         ->requirePresence('size', 'create')
    //         ->notEmpty('size');

    //     return $validator;
    // }
    public function editdata($data,$id)
    {
        $productsize = $this->get($id, [
            'contain' => []
        ]);
        $varproductsize=$data;
            $productsize = $this->patchEntity($productsize,$data);
            if ($this->save($productsize)) {
               // $this->Flash->success(___('the productsize has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productsize->id]);
            } else {
                //$this->Flash->error(___('the productsize could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $varproductsize;
    }
    public function adddata($data)
    {
        $varaddproductsize=$data;
            $productsize = $this->newEntity();
            $productsize = $this->patchEntity($productsize, $data);
            if ($this->save($productsize)) {
                //$this->Flash->success(___('the productsize has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productsize->id]);
            } else {
              //  $this->Flash->error(___('the productsize could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
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
    //     $rules->add($rules->existsIn(['product_id'], 'Products'));
    //     return $rules;
    // }
}
