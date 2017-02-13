
<pre>
<?php
$txt_file    = file_get_contents('/var/www/html/logs/fail.txt');
$rows        = explode("\n", $txt_file);
$k = 0;
foreach($rows as $row => $theline)
{
	if(preg_match('/seconds$/', $theline)) {
	#	print "$theline<br>";
		$array = explode(' ', $theline);
		$date[$k] = substr($array[1], 1, 10);
		$time[$k] = substr($array[2], 0, -1);
		sscanf($time[$k], "%d:%d:%d", $hours, $minutes, $seconds);
		$sec[$k] = $hours * 3600 + $minutes * 60 + $seconds;
		$dur[$k] = $array[7];
	#	print "$date[$k] $time[$k] $sec[$k] $dur[$k]<br>";
	#	print "$k $time[$k]<br>";
		$k++;
	}
}
$i=$k;
for($k = $i; $k>=0; $k--){
	print "$date[$k] $time[$k] $sec[$k] $dur[$k]<br>";
}
?>
</pre>

