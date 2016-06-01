<?php
	require(__DIR__ . '/dbLogin.php');
	
	$donationTotal = "SELECT TRUNCATE(SUM(Amount),2) FROM ssfDonations";
	
	try {
        $conn = new PDO($servername, $username, $password);
       
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        
        //prepare sql and bind parameters
        $donationTotal = $conn->prepare($donationTotal); 
		$donationTotal->execute();
		$total = $donationTotal->fetch();
		$grandTotal = $total[0];
        
        
        file_put_contents(__DIR__.'donationTotal.txt', "$".$grandTotal, LOCK_EX);
        file_put_contents(__DIR__.'streamTotal.txt', "Total: $".$grandTotal, LOCK_EX);
        file_put_contents(__DIR__.'donationTotalNoDollar.txt', $grandTotal, LOCK_EX);
		//echo "$".$grandTotal;
        
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
		file_put_contents('ipn.log', "caught error: " . PHP_EOL, LOCK_EX | FILE_APPEND); //TESTING DELETE LATER
    }           
    
    //End the database connection
    $conn = null;
?>
