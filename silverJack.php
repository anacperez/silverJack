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

$student_name = array(); //string, contains name of the players.

$student_pic = array(); //string, contains location of image.

$student_hand = array(); //holds the array of cards



array_push($student_name, "gabe");
array_push($student_name, "Ana");
array_push($student_name, "Pepe");
array_push($student_name, "Natalia");

array_push($student_pic, "gabe.jpg");
array_push($student_pic, "ana.jgp");
array_push($student_pic, "pepe.jpg");
array_push($student_pic, "natalia.png");


function run()
{
    global $student_hand;
    array_push($student_hand, getHand());
    array_push($student_hand, getHand());
    array_push($student_hand, getHand());
    array_push($student_hand, getHand());

    getWinner();

}





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
    return $user_options;
    
}


function getWinner()
{
    global $student_card_value;
    global $student_name;
    global $student_pic;
    
    $winner_value;
    $winner_name;
    $winner_pic;
    
    $temp_winner = $student_card_value[0];
    $temp_winner_pic;
    $temp_winner_name;
    $totalSum = $student_card_value[0];
    
    
    for($i = 1; $i < 4; $i++)
    {
        $totalSum += $student_card_value[$i];
        
        if( $temp_winner < $student_card_value[$i])
        {
            $temp_winner = $student_card_value[$i];
            $temp_winner_pic = $student_pic[$i];
            $temp_winner_name =$student_name[$i];
        }
        
    }
    $winner_value = $temp_winner;
    $winner_name = $temp_winner_name;
    $winner_pic = $temp_winner_pic;
    
    return($user_options);
    
    echo "$winner_name is the winner! They received $totalSum points";

}



function displayHand()
{
    
    
    for($i=0; $i<sizeof($student_hand); $i++)
    {
        for($j=0; $j<sizeof($student_hand); $j++)
        {
            echo "<img src=cards/$cardSuit/$cardValue.png>";
            
        }
    }
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
            <?=run()?>
            <?=displayHand()?>
            <?=run()?>
            
            
        </main>
    </body>
</html>