<?php 
require_once(__DIR__.'/JKDirStuff.class.php');

$ary = array(
      'a/path/to/the/../../stuff' => 'a/path/stuff',
      'a/path/../this' => 'a/this',
      '/a/path/to/this' => '/a/path/to/this',
      '/a/path/to/this/trailingslash/' => '/a/path/to/this/trailingslash/',
      '/a/path/to/this/../' => '/a/path/to/',
      '/../foobar' => false,
      '../foobar' => false,
      '/a/../../../' => false,
      '/a/../../' => false,
      '/a/../' => '/',
      'a/../' => '',
      './foobar' => 'foobar',
      '/./foobar' =>'/foobar',
	);

$pass_count = 0;
$fail_count = 0;

foreach($ary as $test => $result){
	$res = JKDirStuff::realpath($test);
	$pass = $res === $result;
	echo ($pass ? 'PASS' : 'FAIL, should be: "'.var_dump($result).'"').' '.$test.' => '.var_dump($res)."\n";
	if ($pass){
		$pass_count++;
	}else{
		$fail_count++;
	}
}

echo $pass_count.' passed.'."\n";
echo $fail_count.' failed.'."\n";
