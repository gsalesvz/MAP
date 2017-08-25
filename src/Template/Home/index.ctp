<!-- File: src/Template/Home/index.ctp -->

<div class="pesquisa"><input type="text" id="search" class="idle" /></div>
<div class="conteudo">
    <h1>Explore</h1>
    <nav class="explore" role="navigation">
        <ul>
            <li class="series selected">Série</li>
            <li class="disciplinas">Disciplina</li>
            <li class="recentes">Recentes</li>
        </ul>
    </nav>
    <div class="series">
        <ul>
            <li>1ª Série</li>
            <li>2ª Série</li>
            <li>3ª Série</li>
            <li>4ª Série</li>
            <li>5ª Série</li>
            <li>6ª Série</li>
            <li>7ª Série</li>
            <li>8ª Série</li>
            <li>9ª Série</li>
        </ul>
    </div>
    <div class="disciplinas">
        <ul>
            <li>Português</li>
            <li>Matemática</li>
            <li>Física</li>
            <li>Geografia</li>
            <li>História</li>
            <li>Biologia</li>
            <li>Inglês</li>
            <li>Artes</li>
            <li>Educação Física</li>
        </ul>
    </div>
    <div class="recentes">
        <ul>
            <li>Teste de recentes</li>
        </ul>
    </div>
</div>
<?php

$this->append('script');
echo $this->Html->script('home');
$this->end();

/*$this->append('css');
echo $this->Html->css('home');
$this->end();*/

?>