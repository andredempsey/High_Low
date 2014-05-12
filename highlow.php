
<?php

//High Low Guessing Game
//Date:  12 May 14
//Name:  Andre Dempsey
//Codeup Baddies
//Partner=Alex

//get the arguments from command line and verify that they are valid

if ($argc != 3) //fail if there are not exactly 3 variables
{
    fwrite(STDOUT, 'Wrong number of arguments.  Please try running again.  Enter the low end value followed by the high end value (ex: php highlow.php 1 100)'. PHP_EOL);	   	
    exit(1);
}
if ((int)$argv[1] > (int)$argv[2]) //if the second number is smaller 
{
    //set range for guesses
	define('LOWEND',(int)$argv[2]);
	define('TOPEND',(int)$argv[1]);
}
elseif ((int)$argv[1] < (int)$argv[2]) //if the first number is smaller 
{
	//set range for guesses
	define('LOWEND',(int)$argv[1]);
	define('TOPEND',(int)$argv[2]);
}
else //fail if the range doesn't make sense
{
	fwrite(STDOUT, 'Invalid range.  Please try running again.  Enter a low end value followed by a high end value (ex: php highlow.php 1 100)' . PHP_EOL);	
    exit(1);
}

//initialize the counter
$counter =0;

// pick a random number between low and high end

$comp_pick=mt_rand(LOWEND,TOPEND);

do {

// prompt user to guess the number

	fwrite(STDOUT, 'Pick a number between ' . LOWEND . ' and ' . TOPEND . '=> ');

// Get the input from user
	
	$guess = fgets(STDIN);
	$counter++;

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
		if ($counter==1) 
		{
			fwrite(STDOUT, "Awesome, you guessed the right number in ONE guess!\n");
		} 
		else 
		{
		fwrite(STDOUT, "You guessed the right number in {$counter} guesses!\n");
		}
		exit(0);
	}
}
while($comp_pick != $guess);


