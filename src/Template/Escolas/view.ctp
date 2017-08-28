<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Escola $escola
  */
?>
<div class="conteudo">
    <nav>
        <ul>
            <li><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('Editar Escola'), ['action' => 'edit', $escola->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Deletar Escola'), ['action' => 'delete', $escola->id], ['confirm' => __('Você tem certeza de que quer deletar {0}?', $escola->nome)]) ?> </li>
            <li><?= $this->Html->link(__('Listar Escolas'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Nova Escola'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('Listar Professores'), ['controller' => 'Professores', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Novo Professor'), ['controller' => 'Professores', 'action' => 'add']) ?> </li>
        </ul>
    </nav>
    <div class="escolas">
        <h3>Escola</h3>
        <table>
            <tr>
                <th scope="row"><?= __('Nome') ?></th>
                <td><?= h($escola->nome) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Telefone') ?></th>
                <td><?= h($escola->telefone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Endereço') ?></th>
                <td><?= h($escola->endereco) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Número') ?></th>
                <td><?= h($escola->numero) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Bairro') ?></th>
                <td><?= h($escola->bairro) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Status') ?></th>
                <td><?= h($status) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Fundação') ?></th>
                <td><?= h($escola->fundacao) ?></td>
            </tr>
        </table>
    </div>
</div>