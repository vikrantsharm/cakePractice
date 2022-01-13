<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notice Model
 *
 * @method \App\Model\Entity\Notice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notice findOrCreate($search, callable $callback = null, $options = [])
 */
class NoticeTable extends Table
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

        $this->setTable('notice');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->hasOne('Users', [
            'className' => 'Users',
            'foreignKey' => false,
//            'type' => 'inner',
            'conditions' => 'Users.Id=Notice.Author'
        ]);
//        $this->belongsTo('Users');
    }
    public function isOwnedBy($noticeId, $userId)
    {
        return $this->exists(['id' => $noticeId, 'Author' => $userId]);
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('Subject')
            ->maxLength('Subject', 255)
            ->notEmptyString('Subject','Subject can not be empty.');

        $validator
            ->scalar('Content')
            ->maxLength('Content', 3000)
            ->notEmptyString('Content','Content can not be empty.');

        $validator
            ->integer('Author')
            ->allowEmptyString('Author');

        $validator
            ->dateTime('Creation_Date')
            ->allowEmptyDateTime('Creation_Date');

        $validator
            ->dateTime('Update_Date')
            ->allowEmptyDateTime('Update_Date');

        $validator
            ->boolean('IsDeleted')
            ->allowEmptyString('IsDeleted');

        return $validator;
    }
}
