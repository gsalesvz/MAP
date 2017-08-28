<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="conteudo">
    <nav>
        <ul>
            <li><?= $this->Html->link(__('Listar Escolas'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Listar Professores'), ['controller' => 'Professores', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Novo Professor'), ['controller' => 'Professores', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="escolas">
        <?= $this->Form->create($escola) ?>
        <fieldset>
            <legend><?= __('Adicionar Escola') ?></legend>
            <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('telefone');
            echo $this->Form->control('endereco', ['label' => 'Endereço']);
            echo $this->Form->control('numero', ['label' => 'Número']);
            echo $this->Form->control('bairro');
            echo $this->Form->control('fundacao', ['empty' => true, 'label' => 'Fundação', 'type' => 'text']);
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