	

	

<?php

	//Using Post method param1 data is stored in $name variable
	$name = $_POST['param1'];
	// create a new cURL resource
	$ch = curl_init();
    // set url with appended $name 
    curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/".$name."/"); 
    //returns the response as a string of the return value
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output json
    $output = curl_exec($ch);
    
    //$pokeList contains the array of json data
    $pokeList =  json_decode($output,true);
    //$pokeName stores the value of name node from the array
    $pokeName = $pokeList['name'];
    // $pspecies stores the value of the specie name node from the array
    $pspecies = $pokeList['species']['name'];
    // $pheight stores the json encoded value of the height node from the array
    $pheight = json_encode($pokeList['height']);
    // $pheight stores the json encoded value of the weight node from the array
    $pweight = json_encode($pokeList['weight']);
    
    //$pimage stores the url of the image
    $pimage = $pokeList['sprites']['front_default'];
    //sizeAbilities stores the size of the abilities node.
    $sizeAbilities=sizeof($pokeList['abilities']);
  
 
    $newability="";
    //Checks if the size of abilities node is greater than one. 
  	if($sizeAbilities > 1)
  	{
  		//Loops into the node for size of abilities. 
  		for ($i =0; $i < $sizeAbilities; $i++)

        {
        	//$pabilities Stores the value of the first abilities node. 
        	$pabilities = $pokeList['abilities'][$i]['ability']['name'];	
        	//$newability stores the values of all the abilities. 
        	$newability = $newability ."<br/>". $pabilities ;
        	
       	}
  		
  	}
  	else
  	{
  		//newability stores the values of the first ability node.
  		$newability = $pokeList['abilities']['0']['ability']['name'];	
    	
  	}
   		
   	// close curl resource to free up system resources.  
    curl_close($ch);

    // json encoded values are returned to ajax in an array.
	echo json_encode(array("species" => $pspecies, "weight" => $pweight, "height" => $pheight, "abilities" => $newability, "image" => $pimage,"name"=>$pokeName));  


?>
