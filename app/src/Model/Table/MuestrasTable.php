<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\Event\EventInterface;
use Cake\Datasource\EntityInterface;
use ArrayObject;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Muestras Model
 *
 * @method \App\Model\Entity\Muestra newEmptyEntity()
 * @method \App\Model\Entity\Muestra newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Muestra> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Muestra get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Muestra findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Muestra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Muestra> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Muestra|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Muestra saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Muestra>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Muestra> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MuestrasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('muestras');
        $this->setDisplayField('nro_precinto');
        $this->setPrimaryKey('id');

        $this->hasMany('Resultados', [
            'foreignKey' => 'muestra_id',
        ]);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'fecha_creacion' => 'new',
                    'fecha_modificacion' => 'always'
                ]
            ]
        ]);
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options)
    {
        if ($entity->isNew() && empty($entity->codigo_muestra)) {
            $countToday = $this->find()
                ->where(['DATE(fecha_creacion)' => date('Y-m-d')])
                ->count();

            $entity->codigo_muestra = sprintf(
                'MUE-%s-%03d',
                date('dmY'),
                $countToday + 1
            );
        }
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
            ->scalar('nro_precinto')
            ->maxLength('nro_precinto', 50)
            ->requirePresence('nro_precinto', 'create')
            ->notEmptyString('nro_precinto');

        $validator
            ->scalar('empresa')
            ->maxLength('empresa', 100)
            ->requirePresence('empresa', 'create')
            ->notEmptyString('empresa');

        $validator
            ->scalar('especie')
            ->maxLength('especie', 100)
            ->requirePresence('especie', 'create')
            ->notEmptyString('especie');

        $validator
            ->integer('cantidad_semillas')
            ->greaterThanOrEqual('cantidad_semillas', 0, 'La cantidad de semillas no puede ser negativa.')
            ->requirePresence('cantidad_semillas', 'create')
            ->notEmptyString('cantidad_semillas');

        $validator
            ->dateTime('fecha_creacion')
            ->allowEmptyDateTime('fecha_creacion');

        $validator
            ->dateTime('fecha_modificacion')
            ->allowEmptyDateTime('fecha_modificacion');

        $validator
            ->scalar('codigo_muestra')
            ->maxLength('codigo_muestra', 20)
            ->allowEmptyString('codigo_muestra',null,'create')
            ->add('codigo_muestra', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['codigo_muestra']), ['errorField' => 'codigo_muestra']);

        return $rules;
    }
}
