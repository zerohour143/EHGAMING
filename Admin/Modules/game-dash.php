<?php
    include_once '../../configs/config.php';
    $ops = new functions;
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EH Gaming Dashboard Edit</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/dashboard-game.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../index.html">EH GAMING</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container-fluid" id="cont">
        <div id="title">
            <span>Games Dashboard</span>
        </div>
        <hr>
    
        <address id="cont2">
           <div id="tumbnail-cont">
               <div class="col-lg-2 gtumb"></div>
               <div class="col-lg-2 gtumb"></div>
               <div class="col-lg-2 gtumb">
                    <button class="bttnstyle" type="button" onClick="function1()">GAMES</button>
               </div>
               <div class="col-lg-2 gtumb">
                    <button class="bttnstyle" type="button" onClick="function2()" id="bttn1">ADD GAMES</button>
               </div>
               <div class="col-lg-2 gtumb"></div>
               <div class="col-lg-2 gtumb"></div>
           </div>
        </address>

        <div id="cont3 container-fluid">
            <div class="Games-list" id="g1">
                <div class="listofgames_title"><span>List Of Games</span></div>
                <?php
                    $ops->dataselectgame();
                ?>                   
            </div>
            <div class="Games-list" id="g2">
                <div class="addgame_input_container">
                    <div class="addgame_title"><span>ADD GAME</span></div>
                <form>
                    <div class="input-group input-group-lg addgame_input">
                      <span class="input-group-addon" id="sizing-addon1">Title: </span>
                      <input required type="text" class="form-control" placeholder="input title of game here" aria-describedby="sizing-addon1">
                    </div>
                    <div class="input-group input-group-lg addgame_input">
                      <span class="input-group-addon" id="sizing-addon1">Details: </span>
                      <input required type="text" class="form-control" placeholder="input some details about the game" aria-describedby="sizing-addon1">
                    </div>
                    <input required type="file" class="form-control-file gamefile" id="exampleInputFile">
                    <div class="btn-group-lg addgamebtn" align="center">
                        <input type="submit" class="btn btn-success">
                        <input type='reset' value='Reset' name='reset' class="btn btn-danger">  
                    </div>
                </form>
                </div>
            </div>
        </div>

                 <!-- Footer -->
            <footer id="footer" class="foots">
                <hr>
                <div class="row" id="foot">
                    <div class="col-lg-12">
                        <p>Copyright &copy; EHGAMING</p>
                    </div>
                </div>
            </footer>
    </div>
    <!-- /.container -->

</body>

   <script type="text/javascript">
      function function1(){
        var elem0 = document.getElementById('g2');
        var elem = document.getElementById('g1');

        elem0.style.display='none';
        elem.style.display = "block";
      }

      function function2(){
        var elem0 = document.getElementById('g1');
        var elem = document.getElementById('g2');


        elem0.style.display='none';
        elem.style.display = "block";
      }
    </script> 
</html>
