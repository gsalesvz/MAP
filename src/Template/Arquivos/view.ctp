<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Arquivo $arquivo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Arquivo'), ['action' => 'edit', $arquivo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Arquivo'), ['action' => 'delete', $arquivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Arquivos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arquivo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="arquivos view large-9 medium-8 columns content">
    <h3><?= h($arquivo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($arquivo->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caminhofisico') ?></th>
            <td><?= h($arquivo->caminhofisico) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($arquivo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($arquivo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disciplina') ?></th>
            <td><?= $this->Number->format($arquivo->disciplina) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serie') ?></th>
            <td><?= $this->Number->format($arquivo->serie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Professor') ?></th>
            <td><?= $this->Number->format($arquivo->professor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($arquivo->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($arquivo->criado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($arquivo->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($arquivo->descricao)); ?>
    </div>
</div>
