<?php
    /*
     *  Query the database.
     *
     *  @author Chris Hutcherson
     */
     
     
               
    require(__DIR__ . '/dbLogin.php');
    

    $donationLevel = $_POST["donationLevel"];
    $totalAmount = 0.0;
    
    $stmt = "SELECT FullName, Email, Amount FROM ssfDonations";
    
    if($donationlevel == "two"){
        $stmt = $stmt." WHERE Amount >= 2 AND Email IS NOT NULL ORDER BY RAND() LIMIT 1";
    }
    elseif($donationLevel == "five"){
        $stmt = $stmt." WHERE Amount >= 5 AND Email IS NOT NULL ORDER BY RAND() LIMIT 1"; 
    }
    elseif($donationLevel == "ten"){
        $stmt = $stmt." WHERE Amount >= 10 AND Email IS NOT NULL ORDER BY RAND() LIMIT 1";
    }
    elseif($donationLevel == "twentyfive"){
        $stmt = $stmt." WHERE Amount >= 25 AND Email IS NOT NULL ORDER BY RAND() LIMIT 1";
    }   
    
     
    

    try {
        $conn = new PDO($servername, $username, $password);
       
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        
        //prepare sql and bind parameters
        $stmt = $conn->prepare($stmt); 
        $stmt->execute();
        
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //file_put_contents('ipn.log', "result: ".$result. PHP_EOL, LOCK_EX | FILE_APPEND);

        
        while($row = $stmt->fetch()){
            //file_put_contents('ipn.log', "row: ".$row . PHP_EOL, LOCK_EX | FILE_APPEND);
            $name = $row["FullName"];
            $email = $row["Email"];
            $amount = $row["Amount"];
            $totalAmount += $amount;
        }
        
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
		file_put_contents('ipn.log', "caught error: " . PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER
    }           
    
    //End the database connection
    $conn = null;
?>
