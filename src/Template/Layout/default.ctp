<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

$session = $this->request->session();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('standard.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <div class="principal">
            <div class="logo"><div>LOGO MAP</div></div>
            <nav class="menu-principal" role="navigation">
                <ul>
                    <li class="name"><?= $this->Html->link('Home', ['controller' => 'home', 'action' => 'index']) ?></li>
                    <li class="name"><?= $this->Html->link('Tutorial', ['controller' => 'home', 'action' => 'index']) ?></li>
                    <li class="name"><?= $this->Html->link('Sobre', ['controller' => 'home', 'action' => 'index']) ?></li>
                    <li class="name"><?= $this->Html->link('Ajuda', ['controller' => 'home', 'action' => 'index']) ?></li>
                </ul>
            </nav>

            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>

            <footer>
            </footer>
        </div>

        <div class="sidebar">
            <div class="user-menu">
                <h1>Perfil</h1>
                <div class="foto"></div>
                <nav role="navigation">
                    <ul>
                        <li><?= $this->Html->link('Nome', ['controller' => 'home', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Caixa de entrada', ['controller' => 'home', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Editar Perfil', ['controller' => 'home', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Adicionar Arquivo', ['controller' => 'home', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Logout', ['controller' => 'home', 'action' => 'index']) ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>
