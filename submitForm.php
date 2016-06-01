<?php
    /**
     *  Donation page will forward form inputs here so we can parse into variables, customer  
     *  can confirm, then we forward them to PayPal.
     */

    session_start();
    require(__DIR__ . '/IpnListener.php');
    
    $amount = $_SESSION["amount"];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $message = $_SESSION["message"];
?>    

<!DOCTYPE html>
<html lang="en">
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
               
               
                <div class="donation-form container-fluid">
                    <center><h4>Thanks for donating to the WWF!  Please confirm that the below information is accurate.</h4></center>
                    <br>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 submitForm">

                            <?php
                                if ($name == ""){
                                    $name = "Anonymous";
                                }

                                echo "<div class='panel panel-primary'>
                                    <div class='panel-heading'>Donation amount (USD)</div>
                                    <div class='panel-body'>$".$amount."</div>
                                    </div>";

                                echo "<div class='panel panel-primary'>
                                    <div class='panel-heading'>Name</div>
                                    <div class='panel-body'>".$name."</div>
                                    </div>";

                                echo "<div class='panel panel-primary'>
                                    <div class='panel-heading'>Email</div>
                                    <div class='panel-body'>".$email."</div>
                                    </div>";

                                echo "<div class='panel panel-primary'>
                                    <div class='panel-heading'>Message</div>
                                    <div class='panel-body'>".$message."</div>
                                    </div>";

                                //echo "<a href='donation.php'>Need to change something? Back to the Donation Form</a><br><br>";    
                            ?>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="amount" value="<?php echo $amount;?>">
                            <input type="hidden" name="first_name" value="<?php echo $name;?>">
                            <input type="hidden" name="payer_email" value="<?php echo $email;?>">
                            <input type="submit" class="btn btn-success" name="submit" value="Continue to PayPal">

                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business" value="account@halfemptyetank.com">  <!--UNCOMMENT WHEN READY FOR PRODUCTION--> 
                            <!--<input type="hidden" name="business" value="chrikit-facilitator@gmail.com">-->
                            <!-- Specify a Donate button. -->
                            <input type="hidden" name="cmd" value="_donations">
                            <!-- Specify details about the contribution -->
                            <input type="hidden" name="item_name" value="World Wildlife Fund donation via Sonic Spring Fling">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="notify_url" value="http://sonicspringfling.com/donationConfirmation.php">
                            <input type="hidden" name="return" value="http://sonicspringfling.com/thankYou.php">
                            <input type="hidden" name="custom" value="<?php echo $name;?>|<? echo $email;?>|<?php echo $message;?>">

                            </form>

                    </div> <!-- submitForm div -->
                </div><!-- end row div -->
                                
                </div><!-- end container-fluid div -->
            </div><!-- end mainContnet div-->
            
            
            <!-- Include the Footer -->
            <?php include(__DIR__ . '/footer.php'); ?>

        </div> <!-- end page-wrap div -->

    </body>
</html>
