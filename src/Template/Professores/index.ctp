<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Professor[]|\Cake\Collection\CollectionInterface $professores
  */
?>
<div class="conteudo">
    <h1><?= __('Professores') ?></h1>
    <nav>
        <ul>
            <li><?= $this->Html->link(__('Novo professor'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Listar Escolas'), ['controller' => 'Escolas', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Nova Escola'), ['controller' => 'Escolas', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="professores">
        <?php if (count($professores) > 0)  { ?>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('rf') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor): ?>
                <tr>
                    <td><?= h($professor->rf) ?></td>
                    <td><?= h($professor->nome) ?></td>
                    <td><?php foreach ($status as $statu) { if ($statu->id == $professor->status) {echo $statu->status;} } ?></td>
                    <td>
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $professor->rf]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $professor->rf]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $professor->rf], ['confirm' => __('Tem certeza de que quer deletar # {0}?', $professor->nome)]) ?>
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
        <h3>Não há nenhum professor cadastrado!</h3>
        <?php } ?>
    </div>
</div>
