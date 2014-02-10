<?php
 $seasons=array();
$seasons[]="A";
$seasons[]="B";
$seasons[]="C";
$seasons[2]="D";
$str=array();
$str[]=$seasons;
$str[]=$seasons;
//print_r($str);
foreach($str as $key=>$value)
{ foreach ($value as $key1=>$value1)
{
    echo "\n";
    echo $str[$key][$key1];
    echo "\n";
}
    echo "<br/>";
}
while(list($name,$value)=each($str))
{
    while(list($name1,$value1)=each($value))
    {
        echo "\n";
        echo "$name1=$value1";
        echo "\n";
    }
}
echo "<br/>";
for($i=0;$i<count($str);$i++)
{
    echo "\n";
    echo $str[$i]."\n";
    echo "\n";
}
?>