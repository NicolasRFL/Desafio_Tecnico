<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resultado $resultado
 * @var \Cake\Collection\CollectionInterface|string[] $muestras
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados form content">
            <?= $this->Form->create($resultado) ?>
            <fieldset>
                <legend><?= __('Crear Resultado') ?></legend>
                <?php
                    echo $this->Form->control('id', [
                        'name' => 'muestra_id',
                        'options' => $muestras,
                        'empty' => __('Seleccione una muestra'),
                        'label' => __('Código de Muestra'),
                    ]);
                    echo $this->Form->control('poder_germinativo',
                        [
                            'type' => 'number', 
                            'step' => '0.01',
                            'min' => '0',
                            'max' => '100',
                            'label' => 'Poder Germinativo (%)'
                        ]);
                    echo $this->Form->control('pureza',
                        [
                            'type' => 'number',
                            'step' => '0.01',
                            'min' => '0',
                            'max' => '100',
                            'label' => 'Pureza (%)'
                        ]);
                    echo $this->Form->control('materiales_inertes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
