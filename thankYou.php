<!DOCTYPE html>
<meta charset="UTF-8">

<html>

    <head>
        <title>Sonic Spring Fling</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php include(__DIR__ . '/headScripts.php'); ?>

    </head>

    <body>
        <div class="page-wrap">

            <!-- Include the Header -->
            <?php include(__DIR__ . '/header.php'); ?>

            <div class="mainContent">


                <div class="container-fluid">
                    <div class="col-sm-12 col-lg-12"> <!--  donationForm clearfix --> 
                    <br>
                    <center><h1>THANK YOU!</h1>
                    <img src="/img/sanic.png" style="width:308px; height:308px;"><br>  
                    <h2>Thank you for your donation to the World Wildlife Fund!<br></h2>
                    <h2>Enjoy the marathon! GOTTA GO FAST!</h2>
                    <br>
                    <form action="http://sonicspringfling.com" method="post">
                    <input type="submit" class="btn btn-primary" value="Return to the Sonic Spring Fling!">
                    <br><br>
                    </form></center>
                </div><!--end donationForm div -->
                </div><!-- end container-fluid div -->


            </div><!-- end maincontent div -->



            <!-- Include the Footer -->
            <?php include(__DIR__ . 'footer.php'); ?>

        </div> <!-- end page-wrap div -->

    </body>
</html>
