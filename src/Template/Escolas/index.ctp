<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Escola[]|\Cake\Collection\CollectionInterface $escolas
  */
?>
<div class="conteudo">
    <h1><?= __('Escolas') ?></h1>
    <nav>
        <ul>
            <li><?= $this->Html->link(__('Nova Escola'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Listar Professores'), ['controller' => 'Professores', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Novo Professor'), ['controller' => 'Professores', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="escolas">
        <?php if (count($escolas) > 0) { ?>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fundacao') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('criado') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($escolas as $escola): ?>
                    <tr>
                        <td><?= h($escola->nome) ?></td>
                        <td><?= h($escola->fundacao) ?></td>
                        <td><?= h($escola->criado) ?></td>
                        <td><?= h($escola->modificado) ?></td>
                        <td><?= $this->Number->format($escola->status) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $escola->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $escola->id]) ?>
                            <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $escola->id], ['confirm' => __('Tem certeza de que quer deletar # {0}?', $escola->nome)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
                <?= $this->Paginator->prev('< ' . __('anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('próximo') . ' >') ?>
                <?= $this->Paginator->last(__('último') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?></p>
        </div>
        <?php } else { ?>
        <h3>Não existem escolas cadastradas!</h3>
        <?php } ?>
    </div>
</div>