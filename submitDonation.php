<?php
    /**
     *  Submit the donation to the database.  Requiring this should work for both cash and online donations.
     *  POST data should be set to variables before using a require for this script.
     *
     *  @author Chris Hutcherson
     */
               
    //Database server and login information
    require(__DIR__ . '/dbLogin.php');
file_put_contents('ipn.log', "...ABOUT TO TRY donation to the database..." . PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER
    try {
        $conn = new PDO($servername, $username, $password);
file_put_contents('ipn.log', "....CREATED A NEW PDO..." . PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
file_put_contents('ipn.log', "....SET ATTRIBUTE..." . PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER        
        
        //prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO ssfDonations (FullName, Email, Message, Amount) 
        VALUES (:name, :email, :message, :amount)"); 
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':amount', $amount);
        
        $stmt->execute();
        
        echo "Donation was successfully submitted!  Thank You! <br><br>";
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
//file_put_contents('ipn.log', "...caught error: " .$e->getMessage(). PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER
    }           
    
    //End the database connection
    $conn = null;
?>
