<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('users');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');
//        $this->hasMany('Notice', [
//            'className' => 'Notice',
//            'foreignKey' => 'Author'
////            'type' => 'inner',
////            'conditions' => 'Users.Id=Notice.Author'
//        ]);
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
            ->allowEmptyString('Id', null, 'create');

        $validator
            ->scalar('Username')
            ->maxLength('Username', 75)
            ->notEmptyString('Username','Please enter the username')
            ->add('Username', 'email', ['rule' => 'email','message' =>'Please enter a valid email.'])
            ->add('Username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message' =>'Provided Username already exists.']);

        $validator
            ->scalar('Name')
            ->maxLength('Name', 45)
            ->notEmptyString('Name','Please enter name');

        $validator
            ->scalar('Password')
            ->maxLength('Password', 45)
            ->minLength('Password',8,'Password must be at least 8 characters.');
        $validator->add('Confirm_Password',
            'compareWith', [
                'rule' => ['compareWith', 'Password'],
                'message' => 'Passwords not equal.'
            ]
        );
        $validator->scalar('Current_Password')
            ->notEmptyString('Current_Password');
        $validator->scalar('NewPassword')
            ->notEmptyString('NewPassword')
            ->minLength('NewPassword',8,'Password must be at least 8 characters.');
        $validator->add('Confirm_NewPassword',
            'compareWith', [
                'rule' => ['compareWith', 'NewPassword'],
                'message' => 'Passwords not equal.'
            ]
        );
        $validator
            ->integer('Phonenumber','Phone number should only have numbers.')
            ->maxLength('Phonenumber', 10)
            ->minLength('Phonenumber',10,'Phone number should have 10 digits.')
            ->notEmptyString('Phonenumber','Please enter phone number.');

        $validator
            ->scalar('Type')
            ->maxLength('Type', 45)
            ->allowEmptyString('Type');

        $validator
            ->dateTime('Creation_Date')
            ->allowEmptyDateTime('Creation_Date');

        $validator
            ->dateTime('Update_Date')
            ->allowEmptyDateTime('Update_Date');

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
        $rules->add($rules->isUnique(['Username']));

        return $rules;
    }
}
