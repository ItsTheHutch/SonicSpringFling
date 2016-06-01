<?php
    session_start();
?>


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

            <?php 

                //define variables and set to empty values
                $amount = $name = $email = $message = $type = "";
                $amountErr = $emailErr = "";
                $valid = 0;

                //Strip unnecessary characters (extra space, tab, newline) and remove backslashes (/)
                function testInput($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                } 

                //If a POST, we're going to store the values to session variables
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $regex = "/^[0-9]+(\.[0-9]{1,2})?$/";
                    if(empty($_POST["amount"]) || !preg_match($regex, $_POST["amount"])){
                        $amountErr = "A valid donation amount is required!";
                    }
                    else if($_POST["amount"] < 1.00){
                        $amountErr = "Minimum donation amount is $1!";
                    }
                    else{
                        $amount = testInput($_POST["amount"]);
                        $_SESSION["amount"] = number_format($amount,2,'.','');
                        $valid = 1;
                    }
                    $_SESSION["name"] = testInput($_POST["name"]);
                    $_SESSION["email"] = testInput($_POST["email"]);
                    if(!empty($_SESSION["email"]) && !filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)){
                        $emailErr = "Invalid email format!";
                        $valid = 0;
                    }
                    $_SESSION["message"] = testInput($_POST["message"]);                 
                }

                if($valid == 1){               
                    if(!headers_sent()){
                        header("Location: ./submitForm.php");
                    }
                    else{
                        ?>
                        <script type="text/javascript">
                        document.location.href="./submitForm.php";
                        </script>
                        Thanks! One second, we're redirecting you...
                        <?php
                    }
                    exit();
                }
                else{ 
                    //else display the regular donation page and any validation errors
            ?> 
               
               
                <div class="donation-form container-fluid">
                    <center><h4>Thanks for donating to the WWF!  Please note that we do store the information you provide, but only for use it for reading on stream and contacting for any issues.  <br>You may remain anonymous if you would like.</h4></center>
                    <br>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                           
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                                <div class="form-group">
                               
                                    <label for="amount">Donation Amount (USD - $1 minimum)</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">$</div>
                                        <input type="text" name="amount" placeholder="0.00 (REQUIRED)" class="form-control"> 
                                    </div>
                                    <?php echo $amountErr; //Display error if an amount was not provided. ?>
                                </div>
                                
                              
                               <div class="form-group">
                                   <label for="email">Email</label>
                                   <input type="text" name="email" maxlength="60" placeholder="Enter your email" class="form-control"> <?php echo $emailErr; //Display error if an amount is forgotton ?>
                               </div>
                               
                               <div class="form-group">
                    
                                   <label for="name">Name</label>
                                   <input type="text" name="name" maxlength="60" placeholder="Enter your name (Anonymous if left blank)" class="form-control">

                               </div>
                              
                               <div class="form-group">
                                   <label for="message">Message</label>
                                   <textarea name="message" rows="10" cols="30" maxlength="2000" class="form-control" placeholder="Any comments? We may share them on stream!"></textarea>
                               </div>


                              <button type="submit" class="btn btn-primary">Submit Donation</button>
                            </form>
                            
                        </div><!-- end col div -->
                    </div><!-- end row div -->
                </div><!-- end container-fluid div -->
                
                

                <?php require(__DIR__ . '/incentive.php'); ?>


            </div><!-- end maincontent div -->

            <?php 
                } //end the else statement
            ?>

            <!-- Include the Footer -->
            <?php include(__DIR__ . '/footer.php'); ?>

        </div> <!-- end page-wrap div -->

    </body>
</html>
