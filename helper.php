<?php

	function render($filename ,$data=[]){
		$path = $filename . ".php";
		if (file_exists($path)) {
			extract($data);
			require $path;
		}
	}

  ?>