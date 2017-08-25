<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Professor $professor
  */
?>
<div class="conteudo">
    <nav>
        <ul>
            <li><?= __('Ações') ?></li>
            <li><?= $this->Html->link(__('Editar professor'), ['action' => 'edit', $professor->rf]) ?> </li>
            <li><?= $this->Form->postLink(__('Deletar professor'), ['action' => 'delete', $professor->rf], ['confirm' => __('Tem certeza de que quer deletar # {0}?', $professor->rf)]) ?> </li>
            <li><?= $this->Html->link(__('Listar professores'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Novo professor'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('Listar Escolas'), ['controller' => 'Escolas', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Nova Escola'), ['controller' => 'Escolas', 'action' => 'add']) ?> </li>
        </ul>
    </nav>
    <div class="professores">
        <h3><?= h($professor->nome) ?></h3>
        <table>
            <tr>
                <th scope="row"><?= __('Registro Funcional') ?></th>
                <td><?= h($professor->rf) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nome') ?></th>
                <td><?= h($professor->nome) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Sexo') ?></th>
                <td>
                <?php if(h($professor->sexo) === 'F') {echo 'Feminino';} elseif (h($professor->sexo) === 'M') {echo 'Masculino';} ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Telefone') ?></th>
                <td><?= h($professor->telefone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Endereço') ?></th>
                <td><?= h($professor->endereco) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Número') ?></th>
                <td><?= h($professor->numero) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Complemento') ?></th>
                <td><?= h($professor->complemento) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Bairro') ?></th>
                <td><?= h($professor->bairro) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cidade') ?></th>
                <td><?= h($professor->cidade) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Estado') ?></th>
                <td><?= h($professor->estado) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Status') ?></th>
                <td><?= h($status) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Início na Prefeitura') ?></th>
                <td><?= h($professor->iniciopg) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Data de nascimento') ?></th>
                <td><?= h($professor->nascimento) ?></td>
            </tr>
        </table>
        <div>
            <?php if (!empty($professor->escolas)): ?>
                <h4><?= __('Escolas relacionadas') ?></h4>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Nome') ?></th>
                        <th scope="col" class="actions"><?= __('Ações') ?></th>
                    </tr>
                    <?php foreach ($professor->escolas as $escolas): ?>
                        <tr>
                            <td><?= h($escolas->nome) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Escolas', 'action' => 'view', $escolas->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Escolas', 'action' => 'edit', $escolas->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Escolas', 'action' => 'delete', $escolas->id], ['confirm' => __('Tem certeza de que quer deletar # {0}?', $escolas->nome)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>