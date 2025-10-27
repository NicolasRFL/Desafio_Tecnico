<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resultado> $resultados
 */
?>
<div class="resultados index content">
    <?= $this->Html->link(__('Nuevo Resultado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Resultados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('Código de muestra') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('poder_germinativo') ?></th>
                    <th><?= $this->Paginator->sort('pureza') ?></th>
                    <th><?= $this->Paginator->sort('materiales_inertes') ?></th>
                    <th><?= $this->Paginator->sort('fecha_creacion') ?></th>
                    <th><?= $this->Paginator->sort('fecha_modificacion') ?></th>
                    <th class="actions"><?= __('Ver detalles') ?></th>
                    <th class="actions"><?= __('Editar') ?></th>
                    <th class="actions"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= $resultado->hasValue('muestra') ? $this->Html->link($resultado->muestra->codigo_muestra, ['controller' => 'Muestras', 'action' => 'view', $resultado->muestra->id]) : '' ?></td>
                    <td><?= $this->Number->format($resultado->id) ?></td>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
                    <td><?= h($resultado->materiales_inertes) ?></td>
                    <td><?= h($resultado->fecha_creacion) ?></td>
                    <td><?= h($resultado->fecha_modificacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver detalles'), ['action' => 'view', $resultado->id]) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $resultado->id]) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $resultado->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Estás seguro que querés eliminar al resultado # {0}?', $resultado->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>