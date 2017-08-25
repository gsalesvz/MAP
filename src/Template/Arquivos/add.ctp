<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Arquivos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="arquivos form large-9 medium-8 columns content">
    <?= $this->Form->create($arquivo) ?>
    <fieldset>
        <legend><?= __('Add Arquivo') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('tipo');
            echo $this->Form->control('disciplina');
            echo $this->Form->control('serie');
            echo $this->Form->control('caminhofisico');
            echo $this->Form->control('criado');
            echo $this->Form->control('modificado');
            echo $this->Form->control('professor');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
