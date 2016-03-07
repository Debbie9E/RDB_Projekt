<?php
	
	function html_dump($var, $title = 'Debug output'){
		$bt = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$line = $bt[0]['line'];

		echo "<strong>$title for line $line</strong>";
		echo '<pre style="border: 1px solid #000; height: 12em; overflow: auto; margin: 0.5em;">';
		var_dump($var);
		echo '</pre>'."\n";
	}

	/**
	*	Create a HTML table from input array
	*/
	function html_table_from_array($array){
		$prefix = 'table_id_';

		$thead = "\t\t<tr>\n";
		foreach (array_keys(@$array[0]) as $key) {
			$thead .= "\t\t\t<th id=\"$prefix$key\" style=\"padding: .35em;\">$key</th>\n";
		}
		$thead .= "\t\t</tr>\n";
		
		$tfoot = '';

		$return = "<table border=1>\n";
		$return .= "\t<thead>\n";
		$return .= $thead;
		$return .= "\t</thead>\n";
		$return .= "\t<tbody>\n";
		foreach ($array as $element) {
			$return .= "\t\t<tr>\n";
			foreach ($element as $key => $val) {
				$return .= "\t\t\t<td headers=\"$prefix$key\" style=\"padding: .25em;\">$val</td>\n";
			}
			
			$return .= "\t\t</tr>\n";
		}
		$return .= "\t</tbody>\n";
		$return .= "\t<tfoot>\n";
		$return .= $tfoot;
		$return .= "\t</tfoot>\n";
		$return .= "</table>\n";
		
		return $return;
	}
?>