<?php
namespace App\Model\Table;

use App\Model\Entity\Productcolor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productcolors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 */
class ProductcolorsTable extends Table
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

        $this->table('productcolors');
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
    //         ->requirePresence('color_hex', 'create')
    //         ->notEmpty('color_hex');

    //     $validator
    //         ->requirePresence('red', 'create')
    //         ->notEmpty('red');

    //     $validator
    //         ->requirePresence('blue', 'create')
    //         ->notEmpty('blue');

    //     $validator
    //         ->requirePresence('green', 'create')
    //         ->notEmpty('green');

    //     return $validator;
    // }
    public function editdata($data,$id)
    {
        $productcolor = $this->get($id, [
            'contain' => []
        ]);
        $vareditproductcolor=$data;
            $productcolor = $this->patchEntity($productcolor, $data);
            if ($this->save($productcolor)) {
               // $this->Flash->success(___('the productcolor has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productcolor->id]);
            } else {
               // $this->Flash->error(___('the productcolor could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $vareditproductcolor;
    }
    public function adddata($data)
    {
        $addproductcolor=$data;
        $productcolor = $this->newEntity();
            $productcolor = $this->patchEntity($productcolor, $data);
            if ($this->save($productcolor)) {
               // $this->Flash->success(___('the productcolor has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productcolor->id]);
            } else {
               // $this->Flash->error(___('the productcolor could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $addproductcolor;
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
