<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muestra $muestra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Listar Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras form content">
            <?= $this->Form->create($muestra) ?>
            <fieldset>
                <legend><?= __('Agregar Muestra') ?></legend>
                <?php
                    echo $this->Form->control('nro_precinto');
                    echo $this->Form->control('empresa');
                    echo $this->Form->control('especie');
                    echo $this->Form->control('cantidad_semillas', ['type' => 'number', 'min' => '0']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
