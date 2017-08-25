<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $escola->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $escola->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Escolas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Professores'), ['controller' => 'Professores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professore'), ['controller' => 'Professores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="escolas form large-9 medium-8 columns content">
    <?= $this->Form->create($escola) ?>
    <fieldset>
        <legend><?= __('Edit Escola') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('telefone');
            echo $this->Form->control('endereco');
            echo $this->Form->control('numero');
            echo $this->Form->control('bairro');
            echo $this->Form->control('fundacao', ['empty' => true]);
            echo $this->Form->control('criado');
            echo $this->Form->control('modificado');
            echo $this->Form->control('status');
            echo $this->Form->control('professores._ids', ['options' => $professores]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
