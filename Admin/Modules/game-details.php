<?php
    include_once '../../configs/config.php';
    $ops = new functions;
    $gid = $_GET["gid"];
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
    <link rel="stylesheet" type="text/css" href="../../css/style-dashboard-gameDetails.css">
    <link href="../../css/modal_admin.css" rel="stylesheet">
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
  
    <div id="content" class="container-fluid">
        <div class="crumbs">
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="game-dash.php">Games</a></li>
                <li class="active">Black Desert</li>
            </ul>
        </div>
        <div class="container-fluid image-container">
         <?php $ops->GameImage($gid); ?>
        </div>
        <div class="game-title container-fluid">
            <span class="text-dark text-uppercase">black dessert</span>
        </div>
       <div id="tumbnail-cont">
           <div class="col-lg-2 gtumb"></div>
           <div class="col-lg-2 gtumb"></div>
           <div class="col-lg-2 gtumb">
                <button class="bttnstyle" type="button" onClick="function1()">EDIT SERVICES</button>
           </div>
           <div class="col-lg-2 gtumb">
                <button class="bttnstyle" type="button" onClick="function2()" id="bttn1">ADD SERVICES</button>
           </div>
           <div class="col-lg-2 gtumb"></div>
           <div class="col-lg-2 gtumb"></div>
       </div>

       <div id="cont2">
           <div class="Services-games" id="g1">
                <div class="addservice_input_container">
                    <form method="POST" action="functions/add-service.php" enctype="multipart/form-data">
                        <div class="input-group input-group-lg addservice_input">
                          <span class="input-group-addon" id="sizing-addon1">Service Title: </span>
                          <input required type="text" name="title" class="form-control" placeholder="Input service title" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group-lg addservice_input">
                          <span class="input-group-addon"  id="sizing-addon1">Price: $</span>
                          <input required type="number" name="price" class="form-control" placeholder="Input Price" aria-describedby="sizing-addon1">
                        </div>
                        <div class="input-group input-group-lg addservice_input">
                          <span class="input-group-addon"  id="sizing-addon1">Category</span>
                          <select name="category" class="form-control" aria-describedby="sizing-addon1">
                              <option value="power leveling">Power Leveling</option>
                              <option value="farming">Farming</option>
                              <option value="contribution points">Contribution Points</option>
                              <option value="customize">Customize</option>
                           </select>
                        </div>
                        <div class="input-group input-group-lg addservice_input">
                          <span class="input-group-addon"  id="sizing-addon1">Details</span>
                          <input required type="details" name="details" class="form-control" placeholder="Input Details" aria-describedby="sizing-addon1"  rows="2" cols="20">
                        </div>
                        <div class="input-group input-group-lg addservice_input">
                          <span class="input-group-addon"  id="sizing-addon1">Payment Method</span>
                          <select name="PaymentMethod" class="form-control" aria-describedby="sizing-addon1">
                              <option value="1g">Paypal</option>
                              <option value="2g">ContactUs</option>
                           </select>
                        </div>
                        <div class="btn-group-lg addservicebtn" align="center">
                            <input type="submit" class="btn btn-success">
                            <input type='reset' value='Reset' name='reset' class="btn btn-danger">  
                        </div>
                        <input type="hidden" name="gid" id="hiddenField" value="<?php echo $gid?>"/>
                    </form>
                </div>           
            </div> 
             <address id="g2">     
               <?php
                  $ops->dataselectServices($gid);
                ?>  
             </address>
       </div>
    </div>

    <!-- Footer -->
            <footer id="footer" class="foots">
                <hr class="division">
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
        var elem0 = document.getElementById('g1');
        var elem = document.getElementById('g2');

        elem0.style.display='none';
        elem.style.display = "block";
      }

      function function2(){
        var elem0 = document.getElementById('g2');
        var elem = document.getElementById('g1');


        elem0.style.display='none';
        elem.style.display = "block";

        function myFunction() {
            var x = document.getElementById("myFile").value;
            document.getElementById("demo").innerHTML = x;
        }
      }

      function enable(val) {
        document.getElementById("titlefield"+val).disabled = false;
        document.getElementById("pricefield"+val).disabled = false;
        document.getElementById("categoryfield"+val).disabled = false;
        document.getElementById("detailsfield"+val).disabled = false;
        document.getElementById("pmethodfield"+val).disabled = false;
      }

      function disable(val){
        document.getElementById("titlefield"+val).disabled = true;
        document.getElementById("pricefield"+val).disabled = true;
        document.getElementById("categoryfield"+val).disabled = true;
        document.getElementById("detailsfield"+val).disabled = true;
        document.getElementById("pmethodfield"+val).disabled = true;
      }
    </script>

</html>
