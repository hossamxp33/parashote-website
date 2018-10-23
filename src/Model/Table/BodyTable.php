<?php
namespace App\Model\Table;

use App\Model\Entity\Body;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Body Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\HasMany $Designs
 */
class BodyTable extends Table
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

        $this->table('body');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Designs', [
            'foreignKey' => 'body_id'
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
    //         ->requirePresence('background', 'create')
    //         ->notEmpty('background');

    //     $validator
    //         ->requirePresence('first_label', 'create')
    //         ->notEmpty('first_label');

    //     $validator
    //         ->requirePresence('second_label', 'create')
    //         ->notEmpty('second_label');

    //     $validator
    //         ->requirePresence('third_label', 'create')
    //         ->notEmpty('third_label');

    //     return $validator;
    // }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
     public function addbody(){
       $bodyadd=$this->newEntity();
       if ($this->request->is('post')) {
           $bodyadd = $this->patchEntity($bodyadd, $this->request->data);
           if ($this->save($bodyadd)) {
           } else {
           }
       }
     }
     public function editdata($data,$id)
     {
         $vareditbody=$data;
         $body = $this->get($id, [
             'contain' => []
         ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
             $body = $this->patchEntity($body, $data);
             if ($this->save($body)) {
                // $this->Flash->success(_('the body has been saved'), ['plugin' => 'Alaxos']);
                // return $this->redirect(['action' => 'view', $body->id]);
             } else {
               //  $this->Flash->error(_('the body could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
             }
         //}
         return $vareditbody;
     }
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['template_id'], 'Templates'));
    //     return $rules;
    // }
}
