<?php 
require_once(__DIR__.'/JKDirStuff.class.php');



echo "Testing JKDirStuff::realpath"."\n\n";

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

$i = 0;
foreach($ary as $test => $result){
	$res = JKDirStuff::realpath($test);
	$pass = $res === $result;
	echo ++$i.'. '.($pass ? 'PASS' : 'FAIL, should be: "'.var_export($result, true).'"').' '.
	     var_export($test, true).' => '.var_export($res, true)."\n";
	if ($pass){
		$pass_count++;
	}else{
		$fail_count++;
	}
}
echo "\n";
echo $pass_count.' passed.'."\n";
echo $fail_count.' failed.'."\n";
