<?php
namespace App\Model\Table;

use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Subcats
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Stores
 * @property \Cake\ORM\Association\HasMany $Favourite
 * @property \Cake\ORM\Association\HasMany $Offers
 * @property \Cake\ORM\Association\HasMany $Orders
 * @property \Cake\ORM\Association\HasMany $Productcolors
 * @property \Cake\ORM\Association\HasMany $Productfavs
 * @property \Cake\ORM\Association\HasMany $Productphotos
 * @property \Cake\ORM\Association\HasMany $Productrates
 * @property \Cake\ORM\Association\HasMany $Productsizes
 */
class ProductsTable extends Table
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

        $this->table('products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Subcats', [
            'foreignKey' => 'subcat_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Favourite', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Offers', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productcolors', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productfavs', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productphotos', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productrates', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productsizes', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('TotalRating', [
            'foreignKey' => 'product_id',
              'className'=>'Productrates'
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
    //         ->allowEmpty('id', 'create');

    //     $validator
    //         ->requirePresence('name', 'create')
    //         ->notEmpty('name');

    //     $validator
    //         ->requirePresence('price', 'create')
    //         ->notEmpty('price');

    //     $validator
    //         ->requirePresence('last_price', 'create')
    //         ->notEmpty('last_price');

    //     $validator
    //         ->requirePresence('description', 'create')
    //         ->notEmpty('description');

    //     $validator
    //         ->requirePresence('brand', 'create')
    //         ->notEmpty('brand');

    //     $validator
    //         ->requirePresence('product_info', 'create')
    //         ->notEmpty('product_info');

    //     $validator
    //         ->requirePresence('amount', 'create')
    //         ->notEmpty('amount');

    //     $validator
    //         ->requirePresence('guarantee', 'create')
    //         ->notEmpty('guarantee');

    //     $validator
    //         ->requirePresence('visible', 'create')
    //         ->notEmpty('visible');

    //     return $validator;
    // }
 
    public function editdata($data,$id,$username)
    {
        $product = $this->get($id, [
            'contain' => []
        ]);
        $var=$data;
            $product = $this->patchEntity($product, $data);
            if ($this->save($product)) {
               // $this->Flash->success(___('the product has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $product->id]);
            } else {
               // $this->Flash->error(___('the product could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        
            return $var;
    }
    public function adddata($data)
    {
        $var=$data;
        $product = $this->newEntity();
            $product = $this->patchEntity($product, $data);
            if ($this->save($product)) {
               // $this->Flash->success(___('the product has been saved'), ['plugin' => 'Alaxos']);
                //return $this->redirect(['action' => 'view', $product->id]);
            } else {
               // $this->Flash->error(___('the product could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $data;

    }
    public function getproductrates($contain=array(),$select=array()){

        $Data = $this->find('all')->contain([$contain=> function($osama) {
                                        $osama->select([
                                            'Productrates.product_id',
                                            'stars' => $osama->func()->sum('Productrates.rate'),
                                            'count' => $osama->func()->count('Productrates.product_id')
                                        ])
                                        ->group(['Productrates.product_id']);
                                        return $osama;
                                    }])->toarray();

                           return $Data;
    }
    public function getall($id,$contain=array()){
        $Data=$this->find('all')->where(['Products.id'=>$id])->contain($contain)->toarray();
        return $Data;
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
    //     $rules->add($rules->existsIn(['subcat_id'], 'Subcats'));
    //     $rules->add($rules->existsIn(['category_id'], 'Categories'));
    //     $rules->add($rules->existsIn(['store_id'], 'Stores'));
    //     return $rules;
    // }
}
