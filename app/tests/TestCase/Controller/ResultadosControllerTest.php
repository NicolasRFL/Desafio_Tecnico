<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ResultadosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ResultadosController Test Case
 *
 * @link \App\Controller\ResultadosController
 */
class ResultadosControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @link \App\Controller\ResultadosController::index()
     */
    public function testIndex(): void
    {
        $this->get('/resultados');
        $this->assertResponseOk();
        $this->assertResponseContains('Resultados');
    }

    /**
     * Test view method
     *
     * @return void
     * @link \App\Controller\ResultadosController::view()
     */
    public function testView(): void
    {
        /* Dado un registro de resultado existente */
        $this->get('/resultados/view/1');

        /* Cuando se visualiza el detalle del resultado */
        $this->assertResponseOk();
        /* Entonces debe mostrarse la información del resultado */
        $this->assertResponseContains('Detalle del Resultado');
    }

    /**
     * Test add method
     *
     * @return void
     * @link \App\Controller\ResultadosController::add()
     */
    public function testAdd(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        /* Dado un nuevo registro de resultado válido */
        $data = [
            'muestra_id' => 1,
            'poder_germinativo' => 95.5,
            'pureza' => 97.2,
            'materiales_inertes' => 'Pequeñas impurezas',
        ];

        /* Cuando se envía el formulario de adición */
        $this->post('/resultados/add', $data);
        $this->assertResponseSuccess();
        $this->assertRedirectContains('/resultados');

        /* Entonces el registro debe existir en la base de datos */
        $resultados = $this->getTableLocator()->get('Resultados');
        $query = $resultados->find()->where(['poder_germinativo' => 95.5]);
        $this->assertSame(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     * @link \App\Controller\ResultadosController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @link \App\Controller\ResultadosController::delete()
     */
    public function testDelete(): void
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        /* Cuando se envía el formulario de eliminación */
        $this->delete('/resultados/delete/1');
        $this->assertRedirectContains('/resultados');

        /* Entonces el registro no debe existir en la base de datos */
        $resultados = $this->getTableLocator()->get('Resultados');
        $query = $resultados->find()->where(['id' => 1]);
        $this->assertSame(0, $query->count());
    }
}
