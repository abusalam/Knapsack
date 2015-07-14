<?php

//The Knapsack Problem

$w[1]=2;
$w[2]=1;
$w[3]=3;
$w[4]=2;

$v[1]=12;
$v[2]=10;
$v[3]=20;
$v[4]=15;

$Items=4;
$KnapsackCapacity=5;

$w[1]=2;
$w[2]=6;
$w[3]=4;
$w[4]=8;

$v[1]=12;
$v[2]=16;
$v[3]=30;
$v[4]=40;

$Items=4;
$KnapsackCapacity=12;


//Initiate Knapsack Table
$table[0][0]=0;

for($i=0;$i<=4;$i++){
    for($j=0;$j<=$KnapsackCapacity;$j++){
        if($i==0 || $j==0){
            $table[$i][$j]=0;
        } else {
            $table[$i][$j]=-1;
        }
    }
}
echo '<h1>Knapsack Problem using Memory Functions</h1>';

Mem_Fun_Knapsack($Items,$KnapsackCapacity);

echo '<table border="1" rules="all">';
for($i=0;$i<=$Items;$i++){

    if($i==0){
        echo '<tr>';
        for($j=-1;$j<=$KnapsackCapacity;$j++){
            echo '<th>' . $j . '</th>';
        }
        echo '</tr>';
    }

    echo '<tr><td>' . $i . '['. $w[$i]. ':'. $v[$i] . ']</td>';

    for($j=0;$j<=$KnapsackCapacity;$j++){
        $Value=$table[$i][$j];
        if($Value<0){
            $Value='-';
        }
        echo '<td>' . $Value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';


function Mem_Fun_Knapsack($i,$j)
{
//Problem Description : Implementation of memory function method for knapsack problem
//Input : i is the number of items and j denotes the knapsack’s capacity
//Output : Optimum solution subset.

    global $table,$w,$v;

    if($table[$i][$j]<0)
    {
        if($j<$w[$i]){
            $Value=Mem_Fun_Knapsack($i-1,$j);
        }
        else{
            $Value=max(Mem_Fun_Knapsack($i-1,$j),($v[$i]+Mem_Fun_Knapsack($i-1,$j-$w[$i])));
        }
        $table[$i][$j]=$Value;
    }
    return $table[$i][$j];
}