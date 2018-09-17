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

$cakeDescription = 'Couter Guru';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>

        <?= $this->Html->meta('icon') ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <?= $this->Html->css('style.css') ?>
        <?= $this->fetch('script') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
    </head>

    <title>Material Design Bootstrap</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <body class="cyan lighten-5">
        <header>
            <nav>
                <div class="nav-wrapper">
                <a href="/users/dashboard" class="brand-logo logo-adjustment">Counter Guru</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="/counters/add">My Counters</a></li>
                        <li><a href="/usercounters/statistics">Statistics</a></li>
                        <li><a href="/users/logout">Logout</a></li>
                    </ul>
                </div>
            </nav>

            <ul class="sidenav" id="mobile-demo">
                <li><a href="/counters/add">My Counters</a></li>
                <li><a href="/usercounters/statistics">Statistics</a></li>
                <li><a href="/users/logout">Logout</a></li>
            </ul>
        </header>
        <main>
            <?= $this->Flash->render() ?>
            <div class="container">
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Counter Guru</h5>
                        <p class="grey-text text-lighten-4">This project is completed as an assignment.</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © <?php echo date('Y');?> Copyright owned by Sandeep Kumar.
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>
    </body>
    <?php
        echo $this->Html->script('jquery.js');
        echo $this->Html->script('popper.min.js');
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

   <?php
        echo $this->Html->script('chart.js');
        echo $this->Html->script('custom.js');
    ?>
</html>
