<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
<style>
body {
	background-color: #111;
}
.page {
	width: 100%;
	max-width: 6.2in;
	padding: .2in 0 0 0;
	background-color: white;
	border: 1px solid white;
	font: 12pt Courier;
	overflow: hidden;
}
.content {
	background-color: white;
	width: calc(100% - .2in);
	margin: auto;
	overflow: hidden;
}
<?php

#
# reference: https://www.storysense.com/format/margins.htm
# 
# Original U.S. screenplay is on 8.5 x 11 paper
# with left margin 1.5in and right 1in
#
# For web display, only .2in margins
# so page is about 6in wide

$n = 5;
$classes = array("action", "dialogue", "parenthetical", "cue", "transition");
$page_width = 6;
$left_margins = array(0, 1.4, 2.1, 2.7, 4.5);
$right_margins = array(0, 1.3, 1.9, 0, 0);
$bottom_margins = array(.2, .2, 0, 0, .4);

for ($x = 0; $x < count($classes); $x++) {
	print ".$classes[$x]-wrapper {
		clear: both;
		max-width: {$page_width}in;
		overflow: hidden;
		margin-bottom: {$bottom_margins[$x]}in;
	}
	";

	print ".$classes[$x]-margin {
		width: calc(100% - {$page_width}in + $left_margins[$x]in);
		max-width: $left_margins[$x]in;
		min-width: 0;
		float: left;
		border: 1px solid white;
	}
	";

	$width = $page_width - $left_margins[$x] - $right_margins[$x];
	print ".$classes[$x]-content {
		max-width: {$width}in;
		overflow: hidden;
	}
	";
}

?>

</style>
    </head>
    <body>

	<div class="page">
	<div class="content">
<?php
$classes = array("action", "dialogue", "parenthetical", "cue", "transition");

$fp = fopen("test/sample.txt", "r");
if($fp)
{
   while (!feof($fp))
   {
	  $line = fgets($fp);
	  $len = strlen($line);
	  preg_match("/^[\\s]*/", $line, $matches);
	  $level = strlen($matches[0]);
	  $css_class = $classes[$level];
	  echo "<div class=\"$css_class-wrapper\">\n";
	  echo "<div class=\"$css_class-margin\"></div>\n";
	  echo "<div class=\"$css_class-content\">\n";
	  echo substr($line, $level);
	  echo "</div></div>\n";
   }
}
else
   echo "<p>Unable to open the file</p>";

?>

</div>
</div>

    </body>
</html>

