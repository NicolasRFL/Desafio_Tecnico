<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resultados Model
 *
 * @property \App\Model\Table\MuestrasTable&\Cake\ORM\Association\BelongsTo $Muestras
 *
 * @method \App\Model\Entity\Resultado newEmptyEntity()
 * @method \App\Model\Entity\Resultado newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Resultado> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resultado get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Resultado findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Resultado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Resultado> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resultado|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Resultado saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ResultadosTable extends Table
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

        $this->setTable('resultados');
        $this->setDisplayField('muestra_id');
        $this->setPrimaryKey('muestra_id');

        $this->belongsTo('Muestras', [
            'foreignKey' => 'muestra_id',
            'joinType' => 'INNER',
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

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('muestra_id')
            ->notEmptyString('muestra_id','Debe seleccionar una muestra.');

        $validator
            ->decimal('poder_germinativo')
            ->greaterThanOrEqual('poder_germinativo', 0, 'El poder germinativo debe ser al menos 0.')
            ->lessThanOrEqual('poder_germinativo', 100, 'El poder germinativo no puede exceder 100.')
            ->requirePresence('poder_germinativo', 'create')
            ->notEmptyString('poder_germinativo');

        $validator
            ->decimal('pureza')
            ->greaterThanOrEqual('pureza', 0, 'La pureza debe ser al menos 0.')
            ->lessThanOrEqual('pureza', 100, 'La pureza no puede exceder 100.')
            ->requirePresence('pureza', 'create')
            ->notEmptyString('pureza');

        $validator
            ->scalar('materiales_inertes')
            ->maxLength('materiales_inertes', 255)
            ->allowEmptyString('materiales_inertes');

        $validator
            ->dateTime('fecha_creacion')
            ->allowEmptyDateTime('fecha_creacion');

        $validator
            ->dateTime('fecha_modificacion')
            ->allowEmptyDateTime('fecha_modificacion');

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
        $rules->add($rules->existsIn(['muestra_id'], 'Muestras'), ['errorField' => 'muestra_id']);

        return $rules;
    }
}
