<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $setting["title"] ?></title>
    <!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="http://localhost/public/views/home/css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="http://localhost/public/views/home/css/templatemo-style.css"> <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>

    <div class="tm-header">
        <div class="container-fluid">
            <div class="tm-header-inner">
                <a href="http://localhost" class="navbar-brand tm-site-name"><?= $setting["title"] ?></a>

                <!-- navbar -->
                <nav class="navbar tm-main-nav">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                        &#9776;
                    </button>

                    <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                        <ul class="nav navbar-nav">
                            <?php foreach ($menus as $menu) { ?>
                                <li class="nav-item active">
                                    <a href="<?= $menu["link"] ?>" class="nav-link"><?= $menu["title"] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </nav>

            </div>
        </div>
    </div>