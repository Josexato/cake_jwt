<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Weightings Model
 *
 * @property \App\Model\Table\WordsTable|\Cake\ORM\Association\BelongsTo $Words
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\Weighting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Weighting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Weighting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Weighting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Weighting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Weighting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Weighting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Weighting findOrCreate($search, callable $callback = null, $options = [])
 */
class WeightingsTable extends Table
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

        $this->setTable('weightings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Words', [
            'foreignKey' => 'word_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('value')
            ->maxLength('value', 45)
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['word_id'], 'Words'));
        $rules->add($rules->existsIn(['book_id'], 'Books'));

        return $rules;
    }
}
