<?php
namespace App\Model\Table;

use App\Model\Entity\Logodesign;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logodesigns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stores
 */
class LogodesignsTable extends Table
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

        $this->table('logodesigns');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
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
    //         ->requirePresence('description', 'create')
    //         ->notEmpty('description');

    //     return $validator;
    // }
    public function adddata($data)
    {
        $varaddlogodesign=$data;
        $logodesign = $this->newEntity();
            $logodesign = $this->patchEntity($logodesign,$data);
            if ($this->save($logodesign)) {
                //$this->Flash->success(___('the logodesign has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $logodesign->id]);
            } else {
               // $this->Flash->error(___('the logodesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $varaddlogodesign;
    }
    public function editdata($data,$id)
    {
        $vareditlogodesign=$data;
        $logodesign = $this->get($id, [
            'contain' => []
        ]);
            $logodesign = $this->patchEntity($logodesign, $data);
            if ($this->save($logodesign)) {
                //$this->Flash->success(___('the logodesign has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $logodesign->id]);
            } else {
               // $this->Flash->error(___('the logodesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $vareditlogodesign;
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
    //     return $rules;
    // }
}
