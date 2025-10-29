<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resultado $resultado
 */
?>
<h1>Detalle del Resultado</h1>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Resultado'), ['action' => 'edit', $resultado->muestra_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Resultado'), ['action' => 'delete', $resultado->muestra_id], ['confirm' => __('¿Estas seguro de que deseas eliminar este resultado?', $resultado->muestra_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Resultado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados view content">
            <h3><?= $resultado->hasValue('muestra') ? h($resultado->muestra->codigo_muestra) : '' ?></h3>
            <table>
                <tr>
                    <th><?= __('Muestra') ?></th>
                    <td><?= $resultado->hasValue('muestra') ? $this->Html->link($resultado->muestra->codigo_muestra, ['controller' => 'Muestras', 'action' => 'view', $resultado->muestra->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Materiales Inertes') ?></th>
                    <td><?= h($resultado->materiales_inertes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Poder Germinativo') ?></th>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pureza') ?></th>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Creacion') ?></th>
                    <td><?= h($resultado->fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Modificacion') ?></th>
                    <td><?= h($resultado->fecha_modificacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>