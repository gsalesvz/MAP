<?php
/**
  * @var \App\View\AppView $this
  */

?>
<div class="conteudo">
    <nav>
        <ul>
            <li><?= $this->Html->link(__('Listar Professores'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Listar Escolas'), ['controller' => 'Escolas', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Nova Escola'), ['controller' => 'Escolas', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="professores">
        <?= $this->Form->create($professor) ?>
        <fieldset>
            <legend><?= __('Adicionar Professor') ?></legend>
            <?php
                echo $this->Form->control('rf', ['type' => 'text', 'label' => 'Registro Funcional']);
                echo $this->Form->control('senha', ['type' => 'password']);
                echo $this->Form->control('confirme', ['type' => 'password', 'label' => 'Confirmar senha']);
                echo $this->Form->control('nome');
                echo $this->Form->control('sexo', ['options' => ['' => '', 'F' => 'Feminino', 'M' => 'Masculino']]);
                echo $this->Form->control('iniciopg', ['empty' => true, 'label' => 'Início na Prefeitura', 'type' => 'text']);
                echo $this->Form->control('nascimento', ['empty' => true, 'label' => 'Data de nascimento', 'type' => 'text']);
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
                // echo $this->Form->control('escolas._id', ['options' => $options, 'multiple' => 'multiple', 'type' => 'select']);
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