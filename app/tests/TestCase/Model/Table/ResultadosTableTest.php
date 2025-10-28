<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResultadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResultadosTable Test Case
 */
class ResultadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResultadosTable
     */
    protected $Resultados;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Resultados',
        'app.Muestras',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Resultados') ? [] : ['className' => ResultadosTable::class];
        $this->Resultados = $this->getTableLocator()->get('Resultados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Resultados);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ResultadosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        /* Dado un nuevo registro de resultado con datos válidos */
        $data = [
        'muestra_id' => 1,
        'poder_germinativo' => 95.5,
        'pureza' => 99.9,
        'materiales_inertes' => 'Arena',
        ];
        /* Cuando se valida el registro */
        $resultado = $this->Resultados->newEntity($data);
        /* Entonces no debe haber errores de validación */
        $this->assertEmpty($resultado->getErrors(), 'No debe haber errores de validación con datos válidos');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ResultadosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        /* Dado un nuevo registro de resultado con muestra_id inválido */
        $data = [
        'muestra_id' => 1,
        'poder_germinativo' => 150,
        'pureza' => 90,
        ];

        /* Cuando se valida el registro */
        $resultado = $this->Resultados->newEntity($data);
        /* Entonces debe haber errores de validación */
        $this->assertArrayHasKey('poder_germinativo', $resultado->getErrors());
    }

    public function testValidacionPurezaFueraDeRango(): void
    {
        /* Dado un nuevo registro de resultado con pureza fuera de rango */
        $data = [
        'muestra_id' => 1,
        'poder_germinativo' => 80,
        'pureza' => -5,
        ];

        /* Cuando se valida el registro */
        $resultado = $this->Resultados->newEntity($data);
        /* Entonces debe haber errores de validación */
        $this->assertArrayHasKey('pureza', $resultado->getErrors());
    }

    public function testValidacionMaterialesInertesTooLong(): void
    {
        /* Dado un nuevo registro de resultado con materiales_inertes demasiado largo */
        $data = [
        'muestra_id' => 1,
        'poder_germinativo' => 80,
        'pureza' => 80,
        'materiales_inertes' => str_repeat('a', 300),
        ];

        /* Cuando se valida el registro */
        $resultado = $this->Resultados->newEntity($data);
        /* Entonces debe haber errores de validación */
        $this->assertArrayHasKey('materiales_inertes', $resultado->getErrors());
    }
}
