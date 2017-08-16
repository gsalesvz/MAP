<!-- File: src/Template/Home/index.ctp -->
<div class="search"><input type="text" id="search" class="idle" /></div>
<div class="conteudo">
    <h1>Explore</h1>
    <nav class="explore">
        <ul>
            <li class="series selected">Série</li>
            <li class="disciplinas">Disciplina</li>
            <li class="recentes">Recentes</li>
        </ul>
    </nav>
    <ul class="series">
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
    <ul class="disciplinas">
        <li>Teste de disciplinas</li>
    </ul>
    <ul class="recentes">
        <li>Teste de recentes</li>
        
    </ul>
</div>
<?php
    $this->append('script');
    echo $this->Html->script('jquery');
    echo $this->Html->script('home');
    $this->end();
    
    $this->append('css');
    echo $this->Html->css('home');
    $this->end();
?>