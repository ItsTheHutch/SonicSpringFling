  <?php 
    require(__DIR__ . '/IpnListener.php');
    require(__DIR__ . '/convertCharacters.php');
	use wadeshuler\paypalipn\IpnListener;
    
    $listener= new IpnListener();
    $listener->use_sandbox = false;  //true to test, set to false for production

    
    if($verified = $listener->processIpn()){
        
        $transactionRawData = $listener->getRawPostData();      // raw data from PHP input stream
        $transactionData = $listener->getPostData();            // POST data array
        
        // Feel free to modify path and filename. Make SURE THE DIRECTORY IS WRITEABLE!
        // For security reasons, you should use a path above/outside of your webroot
        file_put_contents('ipn_success.log', print_r($transactionData, true) . PHP_EOL, LOCK_EX | FILE_APPEND);
        
        //Separate the key and value into an array
        $valuesArray = array();
        
        for($i=0, $size = count($transactionData); $i < $size; ++$i){
            $tempArray = explode("=",$transactionData[$i]);
            $valuesArray[$tempArray[0]] = $tempArray[1];
        }
        
        
        //Properly convert non-ASCII values and assign them to values
        $amount = convertCharacters($valuesArray["mc_gross"]);
        $customArray = explode("%7C",$valuesArray["custom"]); //Make an array of the incentive and message
        $name = convertCharacters($customArray[0]);
        $email = convertCharacters($customArray[1]);
        $message = convertCharacters($customArray[2]);
        
        if ($email == ""){
            $email = null;
        }

        
        require(__DIR__ . '/submitDonation.php'); //Submit values to the database
    }
    else {

    // Invalid IPN
    $errors = $listener->getErrors();


    // Feel free to modify path and filename. Make SURE THE DIRECTORY IS WRITEABLE!
    // For security reasons, you should use a path above/outside of your webroot
    file_put_contents('ipn_errors.log', print_r($errors, true) . PHP_EOL, LOCK_EX | FILE_APPEND);
  
    }   
        
?>
