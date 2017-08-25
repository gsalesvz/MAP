<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Arquivo[]|\Cake\Collection\CollectionInterface $arquivos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Arquivo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="arquivos index large-9 medium-8 columns content">
    <h3><?= __('Arquivos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disciplina') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caminhofisico') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('professor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arquivos as $arquivo): ?>
            <tr>
                <td><?= $this->Number->format($arquivo->id) ?></td>
                <td><?= h($arquivo->titulo) ?></td>
                <td><?= $this->Number->format($arquivo->tipo) ?></td>
                <td><?= $this->Number->format($arquivo->disciplina) ?></td>
                <td><?= $this->Number->format($arquivo->serie) ?></td>
                <td><?= h($arquivo->caminhofisico) ?></td>
                <td><?= h($arquivo->criado) ?></td>
                <td><?= h($arquivo->modificado) ?></td>
                <td><?= $this->Number->format($arquivo->professor) ?></td>
                <td><?= $this->Number->format($arquivo->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $arquivo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $arquivo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $arquivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
