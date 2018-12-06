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
	['1','2','3'],
	['a','b']
];

//

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

function sum($data) {

	$res = [];
	$count = count($data);

	if ($count > 1) {
		for($i = 0; $i < count($data[0]); $i++) {
			for($j = 0; $j < count($data[1]); $j++) {
				$res[] = $data[0][$i].$data[1][$j];
			}

		}
		
		$data[0] = $res;
		array_splice($data, 1,1);
		return sum($data);
	}
	else {
		return $data[0];
	}

}


// $res = sum($data);

echo "<pre>";
// var_dump($res);


function ave($data) {

	$strlen = count($data);
	// print_r($data[0]);
	if($strlen > 1) {
		$result = [];

		for($i = 0; $i < count($data[0]); $i++) {
			for($j = 0; $j < count($data[1]); $j++) {
				// print_r($data[0][$i]);
				if(is_array($data[0][$i])) {
					$temp = $data[0][$i];
					$temp[] = $data[1][$j];
				}
				else {
					$temp = array($data[0][$i],$data[1][$j]);
				}
				$result[] = $temp;
				// print_r($result);
			}
		}
		
		$data[0] = $result;
		array_splice($data,1,1);
		return ave($data);

	}
	else {
		return $data;
	}

}
$res = ave($data);
echo '<pre>';
// print_r($res);


// print_r($res);
var_dump($res);
