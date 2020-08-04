<?php

declare(strict_types=1);

//https://www.codewars.com/kata/crack-the-pin

function crack($hash) {
  for($x = 0; $x <= 99999; $x++) {
	  if (md5($s = sprintf('%05d', $x)) === $hash) {
		 return $s; 
	  }
  }
}
