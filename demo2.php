<?php

// $array = [];

// for($i = 0; $i < 10; $i++) {
// 	$data = [
// 		'id'   =>  $i,
// 		'name' => 'student'.$i,
// 		'age'  => 18
// 	];

// 	$array[$i] = $data;

// }

// echo '<pre>';
// // foreach ($array as $row) {
// // 	$row['name'] = 'teacher';

// // 	print_r($row);
// // }

// for($i = 0; $i < count($array); $i++) {
	
// 	$row = $array[$i];
// 	$row['sex'] = 'man';
// 	$array[$i] = $row;
// 	print_r($array[$i]);
// }



// function test() {

// 	static $a = 0;
// 	$a++;

// 	if ($a < 5) {
		
// 		test();
// 	}
// 	echo $a;

// }

// test();
// 

$data1 = ['A','B','C'];
$data2 = [1,2,3];

$data = [
	['A','B','C'],
	['1','2','3']
];

function deal($data) {

	$res = [];

	$length = count($data[0]);

	for($i = 0; $i < count($data[0]); $i++) {
		for($j = 0; $j < count($data[1]); $j++) {
			$res[$i * $length + $j] = $data[0][$i].$data[1][$j];
		}
		
	}

	return $res;
}

$res = deal($data);

foreach ($res as $key => $value) {
	echo $value.'<br />';
}