<?php
namespace App\Model\Table;

use App\Model\Entity\Font;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fonts Model
 *
 */
class FontsTable extends Table
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

        $this->table('fonts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');
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
    //         ->requirePresence('fontname', 'create')
    //         ->notEmpty('fontname');

    //     return $validator;
    // }
    public function view(){
        $Data=$this->find('all')->toarray();
        return $Data;
    }
}
