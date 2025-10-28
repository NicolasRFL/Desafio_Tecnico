<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
?>
<div class="home-container">
    <h1>Sistema de gestión de muestras y resultados de INASE.</h1>

    <h2>Descripción</h2>
    <p>
        Esta aplicación permite registrar muestras de semillas, agregar resultados de germinación y pureza,
        y generar reportes filtrables por especie y rango de fechas.
    </p>

    <h2>Documentación rápida</h2>
    <ul>
        <li><strong>Módulo Muestras:</strong> registrar nuevas muestras y ver listado.</li>
        <li><strong>Módulo Resultados:</strong> agregar o editar resultados para cada muestra.</li>
        <li><strong>Reportes:</strong> ver resumen de todas las muestras con resultados.</li>
    </ul>

    <p>Podes navegar entre los módulos usando el menú superior.</p>
</div>