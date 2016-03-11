
<!DOCTYPE html>
<html lang="en">
  <head>
  	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>
	<script src="js/main.js"></script>
	<!--<script src="js/ping.js"></script>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>AMANDA-AI BETA</title>

	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>  <?php
include($_SERVER['DOCUMENT_ROOT']."/database.php?keyword=HEY");?>

  <script type="text/javascript">
  //alert("***DISCLAIMER*** THIS IS IN THE MOST BASIC FORM OF DEVELOPMENT. FUNCTIONALITY OF THIS APPLICATION IS NOT GUARANTEED. ")</script>
    <iframe id="frmFile" src="textfiles/script.txt" style="display: none;"> 
	</iframe>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">AMANDA-AI</h3>
              <!--<nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </nav>-->
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading"></h1>
            <div class="userresponse" id="response" >
            	<p>AMANDA: HELLO!</p>
            </div>
            <input class="lead inputclass" type="text" name="name" id="userresponse" autocomplete="off" value="HEY!" onclick="value = '';"><br>

            <p class="lead">
            <button class="btn btn-lg btn-default" onclick="inputtext();">Type</button>
			<script> 
			$( "#userresponse" ).keypress(function( event ) {
			  	if ( event.which == 13 ) {

			  		inputtext();
			  	}
			})
			</script>
              <a href="#" class="btn btn-lg btn-default" onclick="pingsocket();">Learn more</a>
            </p>
            <p>EXTRA WANRING: THIS IS THE BETA VERSION OF A PROJECT CURRENTLY IN DEVELOPMENT! I CAN NOT PERDICT HOW AMANDA WILL RESPOND!</p>
            <p>AMANDA-AI is a Hackathon project originally created in 24 hours. AMANDA is curently functioning but in its <code> BETA STAGES!</code>. The current source code is available at <a href="https://github.com/shootingcharlie8/AMANDA-AI/">Github here</a>, and should be everything you need to start hacking. The future should bring the following fetures to AMANDA:</p>
            <ul>
                <li>Larger, smarter keyword & response database</li>
                <li>Ability to add to database</li>
                <li>The ability to learn based on how users talk+what they say</li>
            </ul>

          </div>

          <div class="mastfoot">
            <div class="inner">
            	<p>AMANDA-AI Created by Charlie Melidosian</p>
              <p>Template by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>
