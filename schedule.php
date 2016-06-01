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


                <div class="adjust-table container-fluid">
                    <br>
                    <center><h4>All times and games are subject to change. We'll try to keep this up to date!</h4></center>
                    <br>
                    <div class="row">
                        <div class="col-large-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped table-responsive">
                                <tr>
                                    <td>Time (ET)</td>
                                    <td>Game</td>
                                    <td>Player</td>
                                </tr>
                                
                                <tr class="info">
                                  <td><h4>Friday May 6 2016</h4></td>
                                  <td></td>
                                  <td></td>

                                </tr>
                                
                                <?php 
                                    require(__DIR__ . '/dbLogin.php');
    
                                    $stmt = "SELECT * FROM Schedule";
                                    
                                    try {
                                        $conn = new PDO($servername, $username, $password);

                                        // set the PDO error mode to exception
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                        //prepare sql and bind parameters
                                        $stmt = $conn->prepare($stmt); 
                                        $stmt->execute();

                                        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        //file_put_contents('ipn.log', "result: ".$result. PHP_EOL, LOCK_EX | FILE_APPEND);
                                        $dayPointer = 1;

                                        while($row = $stmt->fetch()){
                                            //file_put_contents('ipn.log', "row: ".$row . PHP_EOL, LOCK_EX | FILE_APPEND);
                                            $time = $row["GameTime"];
                                            $game = $row["Game"];
                                            $player = $row["Player"];
                                            
                                            $day = date_parse($time);
                                            
                                            if($day["day"] == 7 && $dayPointer == 1){
                                                echo "<tr class='info'><td><h4>Saturday May 7 2016</h4></td><td></td><td></td></tr>";
                                                $dayPointer = 2;
                                                                    
                                            }
                                            else if($day["day"] == 8 && $dayPointer == 2){
                                                echo "<tr class='info'><td><h4>Sunday May 8 2016</h4></td><td></td><td></td></tr>";
                                                $dayPointer = 3;
                                            }
                                            
                                            $date = new DateTime($time);
                                            
                                            echo"<tr><td>".$date->format('h:i a')."</td><td>".$game."</td><td>".$player."</td></tr>";
                                        }

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
