<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="conteudo">
    <nav>
        <ul>
            <li><?= $this->Form->postLink(__('Deletar'),
            ['action' => 'delete', $professor->rf],
            ['confirm' => __('Tem certeza de que quer deletar # {0}?', $professor->nome)]
            )
            ?></li>
            <li><?= $this->Html->link(__('Listar Professores'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Listar Escolas'), ['controller' => 'Escolas', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Nova Escola'), ['controller' => 'Escolas', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="professores">
        <?= $this->Form->create($professor) ?>
        <fieldset>
            <legend><?= __('Editar professor ') ?><?= $professor->nome ?></legend>
            <?php
            echo $this->Form->control('iniciopg', ['empty' => true, 'type' => 'text', 'label' => 'Início na Prefeitura']);
            echo $this->Form->control('nascimento', ['empty' => true, 'type' => 'text', 'label' => 'Data de nascimento']);
            echo $this->Form->control('telefone');
            echo $this->Form->control('endereco', ['label' => 'Endereço']);
            echo $this->Form->control('numero', ['label' => 'Número']);
            echo $this->Form->control('complemento');
            echo $this->Form->control('bairro');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado', ['options' => [
                    '' => '', 'Acre' => 'Acre', 'Alagoas' => 'Alagoas', 'Amapá' => 'Amapá', 'Amazonas' => 'Amazonas',
                    'Bahia' => 'Bahia',
                    'Ceará' => 'Ceará',
                    'Distrito Federal' => 'Distrito Federal',
                    'Espírito Santo' => 'Espírito Santo',
                    'Goiás' => 'Goiás',
                    'Maranhão' => 'Maranhão', 'Mato Grosso' => 'Mato Grosso', 'Mato Grosso do Sul' => 'Mato Grosso do Sul', 'Minas Gerais' => 'Minas Gerais',
                    'Pará' => 'Pará', 'Paraíba'  => 'Paraíba', 'Paraná' => 'Paraná', 'Pernambuco' => 'Pernambuco', 'Piauí' => 'Piauí',
                    'Rio de Janeiro' => 'Rio de Janeiro', 'Rio Grande do Norte'  => 'Rio Grande do Norte', ' Rio Grande do Sul' => 'Rio Grande do Sul', 'Rondônia' => 'Rondônia', 'Roraima' => 'Roraima',
                    'Santa Catarina' => 'Santa Catarina', 'São Paulo' => 'São Paulo', 'Sergipe' => 'Sergipe',
                    'Tocantins' => 'Tocantins'
                    ]]);
            if (isset($selected))
                echo $this->Form->control('professores_escolas', ['options' => $options, 'default' => $selected, 'multiple' => 'multiple', 'type' => 'select', 'label' => 'Escolas']);
            else
                echo $this->Form->control('professores_escolas', ['options' => $options, 'multiple' => 'multiple', 'type' => 'select', 'label' => 'Escolas']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php
    $this->append('script');
    echo $this->Html->script('jquery.mask');
    echo $this->Html->script('professores');
    $this->end();
?>