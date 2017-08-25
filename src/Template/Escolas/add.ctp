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
    $this->end();
?>
<script type="text/javascript">
    $(document).ready(function () {
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, "").length === 11 ? "(00) 00000-0000" : "(00) 0000-00009";
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            },
            placeholder: "(__) ____-____"
        }

        $("#fundacao").mask("00/00/0000", {
            placeholder: "__/__/____",
            clearIfNotMatch: true
        }).focusout(function() {
            var objeto = $(this);
            if (objeto.val().length > 0) {
                var dia = parseInt(objeto.val().substring(0, 2));
                var mes = parseInt(objeto.val().substring(3, 6));
                var ano = parseInt(objeto.val().substring(6, 11));

                var meses30 = [4, 6, 9, 11];
                
                if (dia <= 0 || dia > 31 || mes <= 0 || mes > 12 || ano < 1900 || ano > new Date().getFullYear())
                    objeto.val("");
                
                if (mes == 2 && (dia > 29 || (ano % 4 > 0 && dia > 28)))
                    objeto.val("");

                if ($.inArray(mes, meses30) >= 0 && dia > 30)
                    objeto.val("");
            }
        });
        $("#telefone").mask(SPMaskBehavior, spOptions);
    })
</script>