<?php
 function encryptValue($strI){
	$strI = $strI."bee";
	$strO = "";
	for($i = 0; $i < (strlen($strI))  ; $i=$i+6){
		if(($i + 3) < strlen($strI)){
			$a = $strI{$i};
			$strI{$i} =  $strI{$i + 3};
			$strI{$i + 3} = $a;
		}
		if(($i + 4) < strlen($strI)){
			$a = $strI{$i+1};
			$strI{$i+1} =  $strI{$i + 4};
			$strI{$i + 4} = $a;
		}
		if(($i + 5) < strlen($strI)){
			$a = $strI{$i+2}; 
			$strI{$i+2} =  $strI{$i + 5};
			$strI{$i + 5} = $a;
		}
	}
	for($i = 0; $i < strlen($strI); $i++){
		$strO .= $this->rotate($strI{$i});
	}
	
	return urlencode($strO);
 }

 function decryptValue($strI){
	$strO = "";
	$strI = urldecode($strI);
	for($i = 0; $i < strlen($strI); $i++){
		$strO .= $this->rerotate($strI{$i});
	}
	for($i = 0; $i < (strlen($strO))  ; $i=$i+6){
		if(($i + 3) < strlen($strO)){
			$a = $strO{$i};
			$strO{$i} =  $strO{$i + 3};
			$strO{$i + 3} = $a;
		}
		if(($i + 4) < strlen($strO)){
			$a = $strO{$i+1};
			$strO{$i+1} =  $strO{$i + 4};
			$strO{$i + 4} = $a;
		}
		if(($i + 5) < strlen($strO)){
			$a = $strO{$i+2};
			$strO{$i+2} =  $strO{$i + 5};
			$strO{$i + 5} = $a;
		}
	}
	$strO = str_replace("bee","",$strO);
	return $strO;
 }
?>