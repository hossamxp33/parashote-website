<?php
namespace App\Model\Table;

use App\Model\Entity\Paymentstore;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paymentstores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stores
 * @property \Cake\ORM\Association\BelongsTo $Payments
 */
class PaymentstoresTable extends Table
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

        $this->table('paymentstores');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
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

    //     return $validator;
    // }
    public function adddata($data)
    {
        $varaddpaymentstore=$data;
        $paymentstore = $this->newEntity();
            $paymentstore = $this->patchEntity($paymentstore, $data);
            if ($this->save($paymentstore)) {
                //$this->Flash->success(___('the paymentstore has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $paymentstore->id]);
            } else {
               // $this->Flash->error(___('the paymentstore could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        
            return $varaddpaymentstore;
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
    //     $rules->add($rules->existsIn(['store_id'], 'Stores'));
    //     $rules->add($rules->existsIn(['payment_id'], 'Payments'));
    //     return $rules;
    // }
}
