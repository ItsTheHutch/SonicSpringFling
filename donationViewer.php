<!DOCTYPE html>
<meta charset="UTF-8">

<html>

    <head>
        <title>Sonic Spring Fling Donation Viewer</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <?php include(__DIR__ . '/headScripts.php'); ?>      

    </head>

    <body>
        <div class="page-wrap">

            <div class="mainContent">
            
                <center><img src="./img/LogoHeader.png"></center>


                <div class="adjust-table container-fluid">

                    <div class="row">
                        <div class="col-large-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped table-responsive">                           
                                
                                <?php 
                                    require(__DIR__ . '/dbLogin.php');
                                    require(__DIR__ . '/convertCharacters.php');
    
                                    $stmt = "SELECT * FROM ssfDonations ORDER BY ID DESC LIMIT 50";
                                    
                                    try {
                                        $conn = new PDO($servername, $username, $password);

                                        // set the PDO error mode to exception
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                        //prepare sql and bind parameters
                                        $stmt = $conn->prepare($stmt); 
                                        $stmt->execute();


                                        echo "<table class='table table-striped' ><thead><tr><th>ID</th><th>Time</th><th>Name</th><th>Amount</th><th>Email</th><th>Message</th></thead></tr>";
                                        echo "<tbody>";
                                        while($row = $stmt->fetch()){
                                            //file_put_contents('ipn.log', "row: ".$row . PHP_EOL, LOCK_EX | FILE_APPEND);
                                            $id = $row["ID"];
                                            $timestamp = convertCharacters($row["TimeOfDonation"]);
                                            $name = convertCharacters($row["FullName"]);
                                            $email = convertCharacters($row["Email"]);
                                            $amount = convertCharacters($row["Amount"]);
                                            $message = convertCharacters($row["Message"]);
                                            echo "<tr><td>".$id."</td><td>".$timestamp."</td><td>".$name."</td><td>$".$amount."</td><td>".$email."</td><td>".$phone."</td><td>".$type."</td><td>".$message."</td></tr>";
                                        }

                                        echo "</tbody></table>";

                                    }
                                    catch(PDOException $e){
                                        echo "Error: " . $e->getMessage();
                                        file_put_contents('ipn.log', "caught error: " . PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER
                                    }           

                                    //End the database connection
                                    $conn = null;
                                
                                ?>
        
                            </table>
                        </div><!-- end col div -->
                    </div><!-- end row div -->
                </div><!-- end container-fluid div -->



                <?php require(__DIR__ . '/incentive.php'); ?>


            </div><!-- end maincontent div -->



            <!-- Include the Footer -->
            <?php include(__DIR__ . '/footer.php'); ?>

        </div> <!-- end page-wrap div -->

    </body>
</html>
