<?php
    include_once 'configs/config.php';
    $ops = new functions;
    $gid = $_GET["gid"];
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Black Desert</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="manifest" href="/manifest.json">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <link id="color-scheme" href="css/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <video id="video-background" autoplay="" loop="" muted="" poster="img/3.jpg" style="position:fixed">
        <source src="bd22.mp4" type="video/mp4" preload>
      </video>
      <section class="main">
        <div class="content">
          <div class="container" id="vidbody">
            <div class="content2">
              <h1>BLACK DESERT</h1>
            </div>
            <div class="counter" id="countdown">
              <h2><span style="color:rgba(226, 97, 97, 100)">BROUGHT TO YOU BY: EH GAMING</span></h2>
              <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <a href="index.html#game">
                    <p style="color: rgba(0, 120, 191, 100); font-weight:bolder;">Click here to go back to our homepage.</p>
                  </a>
                </div>
              </div>
            </div>
             
                <div class="modal">
                <input id="Power Leveling" type="checkbox" name="modal" tabindex="1">
                <label for="Power Leveling" >POWER LVL</label>
                <div class="modal__overlay">
                  <div id="modal-header" columns="2">
                    <span >POWER LEVELING</span>
                    <label  id="closemodal" for="Power Leveling">&#10006;</label>
                  </div>
                  <div  class="mbox">  
                    <div id="modal-content">
                      <div id="content1">
                        <span>Power Leveling Rates <STRONG>LIMITED TIME OFFER</STRONG> </br>( Free Awakening/Special Offers )</span>
                        <div id="level">
                          <a href="#content1" class="btn-success bttn">Special Package</a>
                          <a href="#table2" class="btn-info bttn">Normal Package</a>
                        </div>
                      </div>
                      <div id="table1">
                        <table class="table table-bordered table-responsive table-hover">
                          <thead>
                            <tr>
                              <th>Level Range</th>
                              <th style="width:10rem">Price</th>
                              <th>Estimated Time</th>
                              <th style="width:20rem">Payment</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php
                            $ops->specialPowerLvlLive($gid);
                          ?>  
                          </tbody>
                        </table>
                      </div>

                      <div id="table2">
                        <div id="word2"><span>If your level is between <strong>15 and 56: </strong></br>( Free Awakening/Normal Offers )</span></div>
                        <div id="level2">
                          <a href="#content1" class="btn-success bttn">Special Package</a>
                          <a href="#table2" class="btn-info bttn">Normal Package</a>
                        </div>
                         <table class="table table-bordered table-responsive table-hover">
                          <thead>
                            <tr>
                              <th>Your Level</th>
                              <th>Desired level</th>
                              <th>Price</th>
                              <th style="width:20rem">Payment</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $ops->normalPowerLvlLive($gid); ?>                            
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

               <div class="modal">
                <input id="gold" type="checkbox" name="modal" tabindex="2">
                <label for="gold" >SILVER</label>
                <div class="modal__overlay">
                  <div id="modal-header" columns="2">
                    <span >SILVER (with value pack)</span>
                    <label  id="closemodal" for="gold">&#10006;</label>
                  </div>
                  <div class="mbox">  
                    <div id="modal-content">
                      <div id="requirements">
                        <span class="list-group-item-danger">Requirements to be followed: </span>
                        <ol>
                          <li><span id="rqs" class="lead"><STRONG>(Value Pack)</STRONG> The duration of value pack must be more than the duration of the chosen silver order.</span></li>
                          <li><span id="rqs" class="lead">Must have at least <STRONG>level 50 or 56</STRONG>  character.</span></li>
                        </ol> 
                      </div>
                      <div id="offer">
                        <span class="list-group-item-warning">Here's a short list to give you an idea about our price.</span>
                            <table class="table table-bordered table-responsive table-hover">
                              <thead>
                                <tr>
                                  <th>Amount</th>
                                  <th>Duration</th>
                                  <th>Price</th>
                                  <th>payment</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $ops->silverLive($gid); ?>  
                              </tbody>                 
                            </table>
                      </div>
                    </div>
                      <div id="bonus">
                        <span class="list-group-item-success">We always give extra silver for 2nd time purchase of silver farm.</span>
                         <ol>
                          <li><span id="bns" class="lead"><STRONG>Extra</STRONG> 50m for <STRONG>200m</STRONG>,</span></li>
                          <li><span id="bns" class="lead"><STRONG>Extra</STRONG> 100m for <STRONG>500m</STRONG>,</span></li>
                          <li><span id="bns" class="lead"><STRONG>Extra</STRONG> 200m for <STRONG>1b</STRONG>.</span></li>
                        </ol> 
                      </div>
                      <span id="silverlast" class="lead list-group-item-info"><h2>Amount for extra silver is not fix, it will be more, especially for repeat orders of 500m and 1billion.</h2></span>
                  </div>
                </div>
              </div>

               <div class="modal">
                <input id="contrib" type="checkbox" name="modal" tabindex="1">
                <label for="contrib" >CONTRIB. PTS.</label>
                <div class="modal__overlay" id="contrib_bigbox">
                  <div id="modal-header" columns="2">
                    <span >CONTRIBUTION POINTS</span>
                    <label  id="closemodal" for="contrib">&#10006;</label>
                  </div>
                  <div id="contribpts-cont">  
                    <div id="contrib-cont" class="container-fluid">
                      <table class="table table-bordered table-responsive table-hover">
                          <tr>
                            <th>Contribution Points</th>
                            <th>Price</th> 
                            <th>Payment</th>
                          </tr>
                          <?php $ops->cntrbtnPtsLive($gid); ?>
                      </table>
                    </div>   
                  </div>
                </div>
              </div>

          <div class="modal">
                <input id="cstmize" type="checkbox" name="modal" tabindex="1">
                <label for="cstmize" >CUSTOMIZE</label>
                <div class="modal__overlay" id="cstmize-bigbox">
                  <div id="modal-header" columns="2">
                    <span >CUSTOMIZE</span>
                    <label  id="closemodal" for="cstmize">&#10006;</label>
                  </div>  
                    <div id="modal-content">
                     <div id="intro-cstmize"><span>For customized Request ( Send us a message ) via Skype or Email.</span></div>
                      <div class="skype">
                        <script src="1.js"></script>
                      </div>
                    </div>
                    <a href="mailto:axeltantay@gmail.com?Subject=Hello%20again">
                    <div id="mail" class="container-fluid"><span><strong>Mail: </strong>Bobyan143@yahoo.com</span></div></a>
                </div>
              </div>
          </div>
        </div>
      </section>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="owl-carousel/owl.carousel.js"></script>
    <script src="js/jquery.ajaxchimp.js"></script>
    <script src="js/main.js"></script> 
  </body>

   <script type="text/javascript">
      $(function(){
        $("#includedContent").load("1.php"); 
      });
    </script> 
</html>