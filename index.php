<?php
require_once 'Database.php';
function getLastID(): int {
    $database = new Database();
    return $database->getLastId();
}

function getTextButton(): String {
    $database = new Database();
    return $database->getText();
}

?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wongwahmen Filip-counting</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div style="background-image: url('img/VdoWVmU.gif')" class="main">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="cursive">Days since Filip left Wingwahmens</h1>
                <h2 class="sub">This is so sad, can we get 100 likes?</h2>
            </div>
        </div>
        <!-- countdown-->
        <div id="countdown" class="countdown">
            <div class="row">
                <div class="countdown-item col-sm-3 col-xs-6">
                    <div id="countdown-days" class="countdown-number">&nbsp;</div>
                    <div class="countdown-label">days</div>
                </div>
                <div class="countdown-item col-sm-3 col-xs-6">
                    <div id="countdown-hours" class="countdown-number">&nbsp;</div>
                    <div class="countdown-label">hours</div>
                </div>
                <div class="countdown-item col-sm-3 col-xs-6">
                    <div id="countdown-minutes" class="countdown-number">&nbsp;</div>
                    <div class="countdown-label">minutes</div>
                </div>
                <div class="countdown-item col-sm-3 col-xs-6">
                    <div id="countdown-seconds" class="countdown-number">&nbsp;</div>
                    <div class="countdown-label">seconds</div>
                </div>
            </div>
        </div>
        <!-- /.countdown-->
    </div>
    <div class="row" id="buttonContainer">
        <div class="col-sm-12">
            <button id="input"><?= getTextButton() ?></button>
            <p id="id" hidden><?= getLastID() ?></p>
            <button id="history">Ukaž záznamy</button>
            <table id="entries">
            </table>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy;2018 Wingwahmens production</p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- JAVASCRIPT FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="javascripts/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/front.js"></script>
<script src="js/ajaxCalls.js"></script>
</body>
</html>