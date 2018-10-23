<?php
namespace App\Model\Table;

use App\Model\Entity\Design;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Designs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Header
 * @property \Cake\ORM\Association\BelongsTo $Bodies
 * @property \Cake\ORM\Association\BelongsTo $Footer
 * @property \Cake\ORM\Association\HasMany $Sliders
 * @property \Cake\ORM\Association\HasMany $Stores
 * @property \Cake\ORM\Association\HasMany $Storesettings
 */
class DesignsTable extends Table
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

        $this->table('designs');
        $this->displayField('Id');
        $this->primaryKey('Id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Header', [
            'foreignKey' => 'header_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Body', [
            'foreignKey' => 'body_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Footer', [
            'foreignKey' => 'footer_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Sliders', [
            'foreignKey' => 'design_id'
        ]);
        $this->hasMany('Stores', [
            'foreignKey' => 'design_id'
        ]);
        $this->hasMany('Storesettings', [
            'foreignKey' => 'design_id'
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
            ->integer('Id')
            ->allowEmpty('Id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['header_id'], 'Header'));
        $rules->add($rules->existsIn(['body_id'], 'Body'));
        $rules->add($rules->existsIn(['footer_id'], 'Footer'));
        return $rules;
    }
}
