<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Disciplinas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="disciplinas form large-9 medium-8 columns content">
    <?= $this->Form->create($disciplina) ?>
    <fieldset>
        <legend><?= __('Add Disciplina') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('criado');
            echo $this->Form->control('modificado');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
