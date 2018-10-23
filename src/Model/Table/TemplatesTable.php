<?php
namespace App\Model\Table;

use App\Model\Entity\Template;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Templates Model
 *
 * @property \Cake\ORM\Association\HasMany $Body
 * @property \Cake\ORM\Association\HasMany $Footer
 * @property \Cake\ORM\Association\HasMany $Header
 */
class TemplatesTable extends Table
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

        $this->table('templates');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->hasMany('Body', [
            'foreignKey' => 'template_id'
        ]);
        $this->hasMany('Footer', [
            'foreignKey' => 'template_id'
        ]);
        $this->hasMany('Header', [
            'foreignKey' => 'template_id'
        ]);
        $this->hasMany('Stores', [
            'foreignKey' => 'template_id'
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
            ->requirePresence('html', 'create')
            ->notEmpty('html');

        return $validator;
    }
    public function getalldata($id){
      $data=$this->find('all')->where(['id'=>$id])->toarray();
      return $data;
    }
}
