<?php

$suits = array("clubs", "diamonds", "hearts", "spades");
$deck = array();
for($i = 0; $i < 53; $i++)
{
    $deck[] = $i;
}

shuffle($deck);
//since we need to have an array of 28 students, we could try doing a dictionary type of array
$student_card_value = array();

function getHand(){
    global $deck; 
    global $suits; 
    global $student_card_value;
    $user_options = array();
    $amount = 0;
    
    while($amount < 42){
        $random_card = rand(1, 52);
        $card_suit = $suits[floor($random_card/ 13)]; 
        $card_value = ($random_card % 13) + 1;
        
        if($amount + $card_value <= 42){
            $amount = $amount + $card_value;
            
            //removes the card that was chosen from the deck
            unset($deck[$random_card]);
            
            array_push($user_options, $card_suit . "/" .$card_value);
        }
        else{
            break;
        }
        
    }
    
    array_push($student_card_value, $amount); //this will add the sum for each student to 
                                              //the array which will work in parallel with another
                                              //array that will keep track of the student's (name/pictre)
    print_r($user_options);
    
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            SilverJack!
        </title>
        <link rel="stylesheet" type = "text/css" href="styles.css">
    </head>
    <body>
        <div id="header1">
            <h1><center>SilverJack</center></h1>
        </div>
        <main style="color: red;">
            <?=getHand()?>
        </main>
    </body>
</html>