<?php

date_default_timezone_set('America/New_York');
$currentTime = date('Y-m-d H:i:s',time());

require(__DIR__ . '/dbLogin.php');

$gameName = $playerName = $playerTwitch = $playerLink = $nextGame = "";
$duringSSF = 0; //0 for false
$stmt = "SELECT * FROM Schedule";

try {
        $conn = new PDO($servername, $username, $password);
       
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $breakLoop = false;
        
                
        
        //prepare sql and bind parameters
        $stmt = $conn->prepare($stmt); 
        $stmt->execute();    

        
        while($row = $stmt->fetch()){
            $tempGameTime = $row["GameTime"];
            $tempGameName = $row["Game"];
            $tempPlayerName = $row["Player"];
            $tempPlayerTwitch = $row["Twitch"];
            $tempPlayerLink = $row["Link"];
            
            
            if($currentTime >= $tempGameTime){
                $gameTime = $tempGameTime;
                $gameName = $tempGameName;
                $playerName = $tempPlayerName;
                $playerTwitch = $tempPlayerTwitch;
                $playerLink = $tempPlayerLink;
                $duringSSF =  1;
            }
            else if($duringSSF == 0){
                break;
            }
            else{
                $nextGame = $tempGameName;
                break;
            }
        }
        
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }           
    
    //End the database connection
    $conn = null;
    

?>
