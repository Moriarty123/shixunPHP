<?php

class person {
	private $class;

	public function __construct() {
		$class = get_class($this);
		echo $class.'构造函数';
		echo '<br />';
	}

	public function __destruct() {
		$class = get_class($this);
		echo $class.'析构函数';
		echo '<br />';
	}

	public function eat() {
		echo '吃饭';
		echo '<br />';
	}

	private function sleeping() {
		echo '睡觉';
		echo '<br />';
	}

	protected function talk() {
		echo __CLASS__.'说话';
		echo '<br />';
	}
}

class children extends person {

	public function talk() {
		parent::talk();
	}

}

$person = new person();
$person->eat();
// $person->sleeping();
// $person->talk();

$children = new children();
$children->talk();

echo '这是第 " '  . __LINE__ . ' " 行'.'<br />';
echo '该文件位于 " '  . __FILE__ . ' " '.'<br />';