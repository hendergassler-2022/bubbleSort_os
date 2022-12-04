#!/usr/bin/php
<?php
// -------------------------------------------- ToDOs and notes --------------------------------------------------------
// module to sort data in php
//
// database : noDB
//
// ---------------------------------------------- Initialize -----------------------------------------------------------
// --------------------------------------------------------- functions -------------------------------------------------
//
//
// --------------------------------------------------------- declarations ----------------------------------------------
// Display width for columns
$Hyphen = '-';
$Equal='=';
$maxCol = 150;
$answerDisplaySize= 35;
$uhidSize=6;
$rcmdSize=38;
$exitCode=0;
$defaultNetDomain='%wunderdc.cloud';
$defaultProfileName='no_profile';
$defaultDatabase='not_defined';
$LOG='/tmp/cws_stdout';
$now = date("Y-m-d H_i_s");
$dateStr=strlen($now)+8;
$CURLOG=$LOG . "-" . $now . ".log";
$DEBUG="off";
$fdout = fopen ($CURLOG,'a');
// ---------------------------------------------- Main -----------------------------------------------------------------
printf("#> Starting [ %s ] %s %s\n","main", $now,str_repeat($Hyphen, ($maxCol-$dateStr)));
//
// --------------------------------------------------------- order method ----------------------------------------------
//
$minint=-2147483648;
$maxint=2147483647;
$minint=0;
$maxint=214;
$v=random_int(0,1024);
$numbers[0]=0;  
//
// --------------------------------------------------------- generate random numbers -----------------------------------
//
for ($z=0; $z <= $v; $z++){
     $numbers [] = random_int($minint,$maxint);
}
$max = count($numbers);
for ( $j =0 ;$j <= $max-1; $j++)  {
    printf(">%s<",$numbers[$j]);
}
//
// --------------------------------------------------------- start ordering --------------------------------------------
//
$loopCounter=0;
$swap=0;
printf(" count >%s< \n",$max);
// -2 because we want to stop on the before last item
do {
    $loopCounter++;
    for ( $i = 0;$i <= $max-2; $i++) {
        if ($numbers[$i] > $numbers[$i+1] ) {
            $swap = 1;
            $temp = $numbers[$i+1];
            $numbers[$i+1] = $numbers[$i];
            $numbers[$i] = $temp;
         } else {
            $swap = $swap;
  	 }
     }       
     if ( $DEBUG == "on" ) {
         for ( $j =0 ;$j <= $max-1; $j++)  {
             printf(">%s<",$numbers[$j]);
         }
         printf("\n");
     }
     if ( $swap == 1 ) {
         // printf(" swap >%s< \n",$swap);
         $swap = 0; 
     } else {
         // during one scan of the array there was no swap action
         // meaning table content in ascending order 
         break; // nomore swaps happend --> table is ordered
     } 
} while ( $swap == 0 );
//
// --------------------------------------------------------- array ordered ---------------------------------------------
//
printf("\n#> [ %s ] Loops required to order table %s %s \n\n",$loopCounter,$now,str_repeat($Hyphen, ($maxCol-$dateStr)) );

for ( $j =0 ;$j <= $max-1; $j++)  {
    printf(">%s<",$numbers[$j]);
}
printf("\n");
//
// --------------------------------------------------------- removing duplicates in array ordered -----------------------
//
printf("\n# %s \n\n",str_repeat($Hyphen, ($maxCol-$dateStr)) );
$uniq=0;
for ( $k =0 ;$k <= $max-1; $k++)  {
    if ( $k > 0 ) {
        if ( $numbers[$k] == $numbers[$k-1] ) {
            // duplicate will not be printed
        }  else {
            printf(">%s<",$numbers[$k]);
            $uniq++;
        }
    } else {
            printf(">%s<",$numbers[$k]);
    }
}
printf("\n");
printf("\n#> [ %s ] unique values in ordered table %s %s \n\n",$uniq,$now,str_repeat($Hyphen, ($maxCol-$dateStr)) );
//
// ---------------------------------------------- Footer ---------------------------------------------------------------
//
//
// footer lines
//
$now = date("Y-m-d H_i_s");
$fdout = fopen ($CURLOG,'a');
// printf("#> if argument 1 starts with '/' followed by the command like 'cmd' then the display will be redirected to $CURLOG  \n");
// printf("#> [ %s ] %s\n", $now,str_repeat($Hyphen, ($maxCol-$dateStr)));
fclose($fdout);
$now = date("Y-m-d H_i_s");
printf("\n#> Ending   [ %s ] %s %s\n","main", $now,str_repeat($Hyphen, ($maxCol-$dateStr)));
// ---------------------------------------------- End ------------------------------------------------------------------
exit($exitCode);

// ^^^^^^^^^^^^^^^^^Exit ^^^^^^^^^^^^

?>
