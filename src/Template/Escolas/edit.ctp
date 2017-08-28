<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="conteudo">
    <nav>
        <ul>
            <li><?= __('Ações') ?></li>
            <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $escola->id],
                ['confirm' => __('Você tem certeza de que quer deletar {0}?', $escola->nome)]
                )
                ?></li>
            <li><?= $this->Html->link(__('Listar Escolas'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Listar Professores'), ['controller' => 'Professores', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Novo Professor'), ['controller' => 'Professores', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="escolas">
        <?= $this->Form->create($escola) ?>
        <fieldset>
            <legend><?= __('Editar Escola') ?></legend>
            <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('telefone');
            echo $this->Form->control('endereco', ['label' => 'Endereço']);
            echo $this->Form->control('numero', ['label' => 'Número']);
            echo $this->Form->control('bairro');
            echo $this->Form->control('fundacao', ['empty' => true, 'type' => 'text']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<?php
    $this->append('script');
    echo $this->Html->script('jquery.mask');
    echo $this->Html->script('escolas');
    $this->end();
?>
