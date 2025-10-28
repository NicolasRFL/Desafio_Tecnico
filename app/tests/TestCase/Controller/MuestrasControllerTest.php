<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MuestrasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MuestrasController Test Case
 *
 * @link \App\Controller\MuestrasController
 */
class MuestrasControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @link \App\Controller\MuestrasController::index()
     */
    public function testIndex(): void
    {        
        $this->get('/muestras');
        $this->assertResponseOk();
        $this->assertResponseContains('Muestras');
    }

    /**
     * Test view method
     *
     * @return void
     * @link \App\Controller\MuestrasController::view()
     */
    public function testView(): void
    {
        $this->get('/muestras/view/1');
        $this->assertResponseOk();
        $this->assertResponseContains('Detalle de la Muestra');
    }

    /**
     * Test add method
     *
     * @return void
     * @link \App\Controller\MuestrasController::add()
     */
    public function testAdd(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        /* Dado un nuevo registro de resultado válido */

        $data = [
            'especie' => 'Girasol',
            'nro_precinto' => 'TEST 34',
            'empresa' => 'Semillas CO',
            'cantidad_semillas' => 123,
            'codigo_muestra' => 'MUE-20251012-0001'            
        ];
        /* Cuando se envía el formulario de adición */
        $this->post('/muestras/add', $data);
        $this->assertResponseSuccess();
        $this->assertRedirectContains('/muestras');

        /* Entonces el registro debe existir en la base de datos */
        $muestras = $this->getTableLocator()->get('Muestras');
        $query = $muestras->find()->where(['nro_precinto' => 'ABC123']);
        $this->assertSame(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     * @link \App\Controller\MuestrasController::edit()
     */
    public function testEdit(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        /* Dado un registro de muestra existente */
        $data = [
            'especie' => 'Soja Modificada',
            'nro_precinto' => 'EDIT 56',
            'empresa' => 'Agro Edit S.A.',
            'cantidad_semillas' => 200
        ];
        /* Cuando se envía el formulario de edición */
        $this->put('/muestras/edit/1', $data);
        $this->assertResponseSuccess();
        $this->assertRedirectContains('/muestras');

        /* Entonces el registro debe actualizarse en la base de datos */
        $muestras = $this->getTableLocator()->get('Muestras');
        $muestra = $muestras->get(1);
        $this->assertEquals('Soja Modificada', $muestra->especie);
        $this->assertEquals('EDIT 56', $muestra->nro_precinto);
    }

    /**
     * Test delete method
     *
     * @return void
     * @link \App\Controller\MuestrasController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
