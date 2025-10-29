<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resultado> $resultados
 */
?>
<div class="resultados index content">
    <?= $this->Html->link(__('New Resultado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Resultados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('muestra_id') ?></th>
                    <th><?= $this->Paginator->sort('poder_germinativo') ?></th>
                    <th><?= $this->Paginator->sort('pureza') ?></th>
                    <th><?= $this->Paginator->sort('materiales_inertes') ?></th>
                    <th><?= $this->Paginator->sort('fecha_creacion') ?></th>
                    <th><?= $this->Paginator->sort('fecha_modificacion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= $resultado->hasValue('muestra') ? $this->Html->link($resultado->muestra->nro_precinto, ['controller' => 'Muestras', 'action' => 'view', $resultado->muestra->id]) : '' ?></td>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
                    <td><?= h($resultado->materiales_inertes) ?></td>
                    <td><?= h($resultado->fecha_creacion) ?></td>
                    <td><?= h($resultado->fecha_modificacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $resultado->muestra_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resultado->muestra_id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $resultado->muestra_id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $resultado->muestra_id),
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