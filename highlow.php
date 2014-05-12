<?php

//High Low Guessing Game
//Date:  12 May 14
//Name:  Andre Dempsey
//Codeup Baddies
//Partner=Alex

//set range for guesses
define('LOWEND',1);
define('TOPEND',100);

// pick a random number between low and high end

$comp_pick=mt_rand(LOWEND,TOPEND);

do {

// prompt user to guess the number

	fwrite(STDOUT, 'Pick a number between ' . LOWEND . ' and ' . TOPEND . '=> ');

// Get the input from user
	
	$guess = fgets(STDIN);

	if ($guess<LOWEND||$guess>TOPEND) //make sure guess is within the range
	{
		fwrite(STDOUT, 'You picked a number outside of the range.  Please try again and pick a number between ' . LOWEND . ' and ' . TOPEND . '=> ');
	}
	if ($guess<$comp_pick) // guess is less than the number, output "HIGHER"
	{
		fwrite(STDOUT, "HIGHER\n"); 
	}
	elseif ($guess>$comp_pick) // guess is more than the number, output "LOWER"
	{
		fwrite(STDOUT, "LOWER\n");	
	}
	else // guess the number, declare "GOOD GUESS!"
	{
		fwrite(STDOUT, "GOOD GUESS!\n");
		exit(0);
	}
}
while($comp_pick != $guess);


