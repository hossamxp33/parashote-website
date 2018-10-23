<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 * @property \Cake\ORM\Association\HasMany $Deliveryrates
 * @property \Cake\ORM\Association\HasMany $Favourite
 * @property \Cake\ORM\Association\HasMany $Orders
 * @property \Cake\ORM\Association\HasMany $Storerates
 * @property \Cake\ORM\Association\HasMany $UserActivities
 * @property \Cake\ORM\Association\HasMany $UserContacts
 * @property \Cake\ORM\Association\HasMany $UserDetails
 * @property \Cake\ORM\Association\HasMany $UserEmailRecipients
 * @property \Cake\ORM\Association\HasMany $UserEmailSignatures
 * @property \Cake\ORM\Association\HasMany $UserEmailTemplates
 * @property \Cake\ORM\Association\HasMany $UserSocials
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Deliveryrates', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Favourite', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Storerates', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserActivities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserContacts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserEmailRecipients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserEmailSignatures', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserEmailTemplates', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserSocials', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

      /*  $validator
            ->integer('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');*/

      /*  $validator
            ->integer('email_verified')
            ->requirePresence('email_verified', 'create')
            ->notEmpty('email_verified');*/

      /*  $validator
            ->requirePresence('long', 'create')
            ->allowEmpty('long');

        $validator
            ->requirePresence('lat', 'create')
            ->allowEmpty('lat');

        $validator
            ->requirePresence('gender', 'create')
            ->allowEmpty('gender');

        $validator
            ->requirePresence('phone', 'create')
            ->allowEmpty('phone');

        $validator
            ->integer('purchase_way')
            ->requirePresence('purchase_way', 'create')
            ->allowEmpty('purchase_way');

        $validator
            ->requirePresence('points', 'create')
            ->allowEmpty('points');

        $validator
            ->requirePresence('type_phone', 'create')
            ->allowEmpty('type_phone');*/

    /*    $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');*/

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function adddata($data)
    {
        $varadduser=$data;
        $user = $this->newEntity();
       

            $user = $this->patchEntity($user, $data);
            if ($this->save($user)) {
                //$this->Flash->success(___('the productdesign has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productdesign->id]);
            } else {
               // $this->Flash->error(___('the productdesign could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $user;
        return $varadduser;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        return $rules;
    }
}
