<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Escola $escola
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Escola'), ['action' => 'edit', $escola->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Escola'), ['action' => 'delete', $escola->id], ['confirm' => __('Are you sure you want to delete # {0}?', $escola->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Escolas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Escola'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professores'), ['controller' => 'Professores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professore'), ['controller' => 'Professores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="escolas view large-9 medium-8 columns content">
    <h3><?= h($escola->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($escola->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($escola->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($escola->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($escola->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bairro') ?></th>
            <td><?= h($escola->bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($escola->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($escola->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fundacao') ?></th>
            <td><?= h($escola->fundacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($escola->criado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($escola->modificado) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Professores') ?></h4>
        <?php if (!empty($escola->professores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Rf') ?></th>
                <th scope="col"><?= __('Senha') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Sexo') ?></th>
                <th scope="col"><?= __('Iniciopg') ?></th>
                <th scope="col"><?= __('Nascimento') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Complemento') ?></th>
                <th scope="col"><?= __('Bairro') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('Criado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($escola->professores as $professores): ?>
            <tr>
                <td><?= h($professores->rf) ?></td>
                <td><?= h($professores->senha) ?></td>
                <td><?= h($professores->nome) ?></td>
                <td><?= h($professores->sexo) ?></td>
                <td><?= h($professores->iniciopg) ?></td>
                <td><?= h($professores->nascimento) ?></td>
                <td><?= h($professores->telefone) ?></td>
                <td><?= h($professores->endereco) ?></td>
                <td><?= h($professores->numero) ?></td>
                <td><?= h($professores->complemento) ?></td>
                <td><?= h($professores->bairro) ?></td>
                <td><?= h($professores->cidade) ?></td>
                <td><?= h($professores->estado) ?></td>
                <td><?= h($professores->criado) ?></td>
                <td><?= h($professores->modificado) ?></td>
                <td><?= h($professores->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Professores', 'action' => 'view', $professores->rf]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Professores', 'action' => 'edit', $professores->rf]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Professores', 'action' => 'delete', $professores->rf], ['confirm' => __('Are you sure you want to delete # {0}?', $professores->rf)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
