<?php
namespace App\Model\Table;

use App\Model\Entity\Productphoto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productphotos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 */
class ProductphotosTable extends Table
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

        $this->table('productphotos');
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
    //         ->requirePresence('photo', 'create')
    //         ->notEmpty('photo');

    //     $validator
    //         ->requirePresence('main', 'create')
    //         ->notEmpty('main');

    //     return $validator;
    // }
    public function editdata($data,$id)
    {
        $vareditproductphoto=$data;
        $productphoto = $this->get($id, [
            'contain' => []
        ]);
        $path_info = pathinfo($data['photo']['name']);
            chmod($data['photo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
           //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
           $fullpath = WWW_ROOT."library/".'/'.$this->save($productphoto)->id.'/'.'productphoto';
           if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
           move_uploaded_file($data['photo']['tmp_name'], $fullpath.DS.$photoo);
           $data['photo'] = $photoo;
            $productphoto = $this->patchEntity($productphoto, $data);
            if ($this->save($productphoto)) {
               // $this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
                //return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
                //$this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        return $vareditproductphoto;
    }
    public function adddata($data,$username)
    {
        
        $varaddproductphoto=$data;
        $productphoto = $this->newEntity();
        if(isset($data['photo']['name'])){
            $path_info = pathinfo($data['photo']['name']);
            chmod($data['photo']['tmp_name'], 0644);
            $photoo = time().mt_rand().".".$path_info['extension'];
            //$fullpath = WWW_ROOT."library".'/'.'rwnak'.'/salons';
            $fullpath = WWW_ROOT."library/".$this->save($productphoto)->id.'/'.'productphoto';
            if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
            move_uploaded_file($data['photo']['tmp_name'], $fullpath.DS.$photoo);
            $data['photo'] = $photoo;
          }else{
            $data['photo']['name']= $productphoto['photo'];
          }
            $productphoto = $this->patchEntity($productphoto, $data);
            if ($this->save($productphoto)) {
                //$this->Flash->success(___('the productphoto has been saved'), ['plugin' => 'Alaxos']);
               // return $this->redirect(['action' => 'view', $productphoto->id]);
            } else {
               // $this->Flash->error(___('the productphoto could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        
            return $varaddproductphoto;
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
