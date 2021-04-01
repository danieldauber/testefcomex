<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Processos Model
 *
 * @method \App\Model\Entity\Processo newEmptyEntity()
 * @method \App\Model\Entity\Processo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Processo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Processo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Processo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Processo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Processo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Processo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Processo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Processo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Processo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Processo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Processo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProcessosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('processos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('identificador')
            ->maxLength('identificador', 50)
            ->requirePresence('identificador', 'create')
            ->notEmptyString('identificador')
            ->add('identificador', 'unique', [
                'rule' => 'validateUnique', 
                'message' => __('Já existe outro processo com esse identificador.'), 
                'provider' => 'table']);

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 1)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('pais_destino')
            ->maxLength('pais_destino', 100)
            ->allowEmptyString('pais_destino');

        $validator
            ->decimal('valor_total')
            ->allowEmptyString('valor_total');

        $validator
            ->scalar('via_transporte')
            ->maxLength('via_transporte', 1)
            ->allowEmptyString('via_transporte');

        $validator
            ->numeric('peso_bruto')
            ->allowEmptyString('peso_bruto');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['identificador']));

        return $rules;
    }
}
