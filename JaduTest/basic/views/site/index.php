

<?php

/* @var $this yii\web\View */

$this->title = 'Pokédex';
?>


<?php
    // create a new cURL resource
    $ch = curl_init();
    // set url 
    curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/");
    //returns the response as a string of the return value
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output json
    $output = curl_exec($ch);
    //$pokeList contains the array of json data
    $pokeList =  json_decode($output,true);
    // close curl resource to free up system resources 
    curl_close($ch);
  
?>

<div id ="searchDiv">
        <!-- Search Box calls PreAjax function on search-->
        <input type="search"  id="searchbox" onsearch="myPreAjax()" maxlength="30" onfocus="this.value=''" placeholder="Enter a Pokemon Name! ">
        
</div>

<div class="site-index">

    <div style="width: 20%; text-align: center;">
    <h3>List of Pokemons</h3>

    <!--Div containing list of all the pokemons  -->
        <div id="pokeList" class="btn-group">
    
         <?php
        //$count stores the json encode value of count node.
        $count = json_encode($pokeList['count']); 
        
        //Loops through the array for number of count times
        for($i =0; $i < $count; $i++)

            {
            // <a> tag is created for every name of the node.
            echo "<a class='pokeLink uppercase' id='pokeAnchor' onclick='myAjax(".json_encode($pokeList['results'][$i]['name']).")''>".($pokeList['results'][$i]['name'])."</a>";
            }
        ?>


        </div>
    </div>



    <div class="pokeDetail">
        <!-- Pokemon name is displayed in Uppercase-->
        <h1 id="pokeName" class="uppercase">POKEDEX</h1>
    </div>

    <!--Pokemon Image is displayed upon selection -->
    <img id="image" src="/JaduTest/basic/web/images/pokeAPI.png" >
    
    <!--Pokemon details are displayed -->
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Species</h2>
                <!-- Pokemon Specie is displayed in Uppercase-->
                <p id="species" class="uppercase"></p>

            </div>
            <div class="col-lg-4">
                <h2>Height</h2>
                <!-- Pokemon height is displayed-->
                <p id="height" ></p>

                
            </div>
            <div class="col-lg-4">
                <h2>Weight</h2>
                <!-- Pokemon weight is displayed-->
                <p id="weight"></p>

                
            </div>
            <div class="col-lg-4">
                <h2>Abilities</h2>
                <!-- Pokemon abilities are displayed in Uppercase-->
                <p id="abilities" class="uppercase"></p>
                
                
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">

//This function used for Search functionality.
    function myPreAjax(){
        //  returns an Element object by id. 
        var searchValue =document.getElementById("searchbox");
        // stores the value of the object and converts the value in lower case.
        name =searchValue.value.toLowerCase();
        //Range of characters to be allowed.
        var allowedChar = /^[a-z -]+$/;
        //checks if the name is not blank and name matches the regular expression.
        if(name != "" && name.match(allowedChar)){
            //calls myAjax function with name parameter.
            myAjax(name);    
        }
        else
        {
        //if the Wrong input is entered.
        alert("please enter the name of a Pokemon!!")    
        }
        
        
    }
    //This function used for fetching response from the api.
    function myAjax(name) {
        //initialising the ajax call
        var request = $.ajax
        ({
            //ajax request points to the API file.
            url: '/JaduTest/basic/views/site/pokeApi.php',
            //Type of request either Post or Get.
            type: 'post',
            //datatype of the data transaction.
            dataType: 'json',
            //data parameter passed through the ajax request. 
            data: { param1: name}
        });

        //request processed and data is received. 
    request.done( function ( data ) 
    {
        // if the name of the pokemon is null
        if(data.name == null){
            //Wrong request made.
            alert("Please enter a valid Pokemon name");
        }
        else{
            //id of the HTML tags will display the returned values from the api
            $('#species').html(data.species);
            $('#height').html(data.height);
            $('#weight').html(data.weight);
            $('#abilities').html(data.abilities);
            $('#pokeName').html(data.name);
            $('#image').attr('src',data.image);
        }
        //If the image source is null display the default pokeball Image.
        if($('#image').attr('src')==null)
        {   
            $('#image').attr('src','/JaduTest/basic/web/images/pokeball.png');
        }
                
        
        
    });
    //fail request status
    request.fail( function ( jqXHR, textStatus) {
        console.log( 'Sorry: ' + textStatus );
    });
 
 }
</script>

<style type="text/css">
    

 #searchBox {
    width: 25%;
    height:40px;
    font-size: 20px;
    float: right;
    text-align: center;
}
</style>

