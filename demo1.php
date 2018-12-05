<?php
$nums = [];

//创建随机数组
function createNums() {
	for($i = 0; $i < 100; $i++) {
		global $nums;
		$random = mt_rand(1,1000);
		$nums[$i] = $random;
	}
}

//冒泡排序
function bubbleSort() {
	global $nums;
	$sort = $nums;

	for($i = 0; $i < count($sort)-1; $i++) {
		for($j = $i; $j < count($sort); $j++) {
			if ($sort[$i] > $sort[$j]) {
				$temp = $sort[$i];
				$sort[$i] = $sort[$j];
				$sort[$j] =$temp;
			}
		}
	}
	return $sort;
}


//选择排序
function selectSort() {
	global $nums;
	$sort = $nums;

	for($i = 0; $i < count($sort); $i++) {
		$min = $i;
		for($j = $i+1; $j < count($sort); $j++) {
			if ($sort[$j] < $sort[$min]) {
				$min = $j;
			}
		}

		$temp = $sort[$i];
		$sort[$i] = $sort[$min];
		$sort[$min] = $temp;

	}

	return $sort;
}

//插入排序
function insertSort() {
	global $nums;
	$sort = $nums;

	for($i = 1; $i < count($sort); $i++) {
		$temp = $sort[$i];
		for($j = $i-1; $j >= 0 && $sort[$j] > $temp; $j--) {
			$sort[$j+1] = $sort[$j];
		}
		$sort[$j+1] = $temp;
	}

	return $sort;
}

createNums();
$sorted1 = bubbleSort();
$sorted2 = selectSort();
$sorted3 = insertSort();

for($i = 0; $i < count($sorted1); $i++) {
	echo 'bubble:'.$sorted1[$i].'  select:'.$sorted2[$i].'  insert:'.$sorted3[$i].'<br />';

}


?>