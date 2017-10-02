<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restaurant</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Logo</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lunch <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?menu=Polish">Polish cuisine</a></li>
                            <li><a href="index.php?menu=Mexican">Mexican cuisine</a></li>
                            <li><a href="index.php?menu=Italian">Italian cuisine</a></li>
                            <li><a href="index.php?menu=Desserts">Dessert</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?menu=Drinks">Drinks</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php?cart"><?= $cart->count(); ?> items <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
    </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
        </div>
        <!-- /.container -->
