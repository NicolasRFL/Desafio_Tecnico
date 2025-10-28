<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MuestrasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MuestrasTable Test Case
 */
class MuestrasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MuestrasTable
     */
    protected $Muestras;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Muestras',
        'app.Resultados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Muestras') ? [] : ['className' => MuestrasTable::class];
        $this->Muestras = $this->getTableLocator()->get('Muestras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Muestras);

        parent::tearDown();
    }

    /**
     * Test beforeSave method
     *
     * @return void
     * @link \App\Model\Table\MuestrasTable::beforeSave()
     */
    public function testBeforeSave(): void
    {
        /* Dado un nuevo registro de muestra */
        $data = [
            'nro_precinto' => 'XYZ789',
            'empresa' => 'Campo Norte SRL',
            'especie' => 'Sorgo',
            'cantidad_semillas' => 550,
        ];
        /* Cuando se guarda la entidad */
        $muestra = $this->Muestras->newEntity($data);
        $this->Muestras->save($muestra);
        /* Entonces debe generarse automáticamente el codigo de muestra */
        $this->assertNotEmpty($muestra->codigo_muestra, 'Debe generarse el código de muestra');
        $this->assertStringStartsWith('MUE-', $muestra->codigo_muestra);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\MuestrasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        /* Dado un nuevo registro de muestra con un código ya existente */
        $data = [
            'nro_precinto' => 'XYZ999',
            'empresa' => 'Agrotest',
            'especie' => 'Soja',
            'cantidad_semillas' => 30,
            'codigo_muestra' => 'MUE-20251027-0001',
        ];
        /* Cuando se intenta guardar la entidad */
        $muestra = $this->Muestras->newEntity($data);
        $this->Muestras->save($muestra);
        /* Entonces debe haber un error de regla de negocio por código duplicado */
        $this->assertNotEmpty($muestra->getErrors()['codigo_muestra']['unique'] ?? null);
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\MuestrasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        /* Dado un nuevo registro de muestra con datos válidos */
        $data = [
            'nro_precinto' => 'XYZ789',
            'empresa' => 'Campo Sur SRL',
            'especie' => 'Maíz',
            'cantidad_semillas' => 50,
        ];
        /* Cuando se guarda la entidad */
        $muestra = $this->Muestras->newEntity($data);
        $this->Muestras->save($muestra);
        /* Entonces debe generarse automáticamente el código de muestra */
        $this->assertNotEmpty($muestra->codigo_muestra, 'Debe generarse automáticamente el código');
        $this->assertStringStartsWith('MUE-', $muestra->codigo_muestra);
    }

    public function testValidaCamposObligatorios(): void
    {
        /* Dado un nuevo registro de muestra sin datos */
        $data = [
            'nro_precinto' => '',
            'empresa' => '',
            'especie' => '',
            'cantidad_semillas' => '',
        ];

        /* Cuando se intenta crear la entidad */

        $muestra = $this->Muestras->newEntity($data);
        /* Entonces debe haber errores de validación en los campos obligatorios */
        $this->assertNotEmpty($muestra->getErrors(), 'Debe haber errores de validación');
        $this->assertArrayHasKey('nro_precinto', $muestra->getErrors());
        $this->assertArrayHasKey('empresa', $muestra->getErrors());
    }

    public function testTimestampsAutomaticos(): void
    {
        /* Dado un nuevo registro de muestra con datos válidos */
        $data = [
        'nro_precinto' => 'ABC123',
        'empresa' => 'Test S.A.',
        'especie' => 'Trigo',
        'cantidad_semillas' => 100
        ];

        /* Cuando se guarda la entidad */
        $muestra = $this->Muestras->newEntity($data);
        $this->Muestras->save($muestra);

        /* Entonces deben generarse automáticamente los timestamps */
        $this->assertNotEmpty($muestra->fecha_creacion, 'Debe generarse fecha_creacion automáticamente');
        $this->assertNotEmpty($muestra->fecha_modificacion, 'Debe generarse fecha_modificacion automáticamente');
    }

}
