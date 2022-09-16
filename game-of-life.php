<?php

	/**
	 * 
	 */
	class Solution 
	{
		
		function gameOfLife(&$board) {

			$arr = $board;

			foreach ($arr as $key1 => $item1) {
				foreach($item1 as $key2 => $item2) {
					$aliveN = $this->getAliveNei($arr, $key1, $key2);
					if($board[$key1][$key2]) {
						if($aliveN<2) {
							$board[$key1][$key2] = 0;
						} elseif ($aliveN === 2 || $aliveN === 3) {
							$board[$key1][$key2] = 1;
						} elseif($aliveN > 3) {
							$board[$key1][$key2] = 0;
						}
					} else {
						if ($aliveN === 3) {
							$board[$key1][$key2] = 1;
						}
					}
				}
			}

			return $board;

		}

		public function getAliveNei($board, $key1, $key2) {
			$num = 0;

			if (isset($board[$key1-1][$key2-1])) { $num  += $board[$key1-1][$key2-1];}
	        if (isset($board[$key1-1][$key2])) { $num  += $board[$key1-1][$key2];}
	        if (isset($board[$key1-1][$key2+1])) { $num  += $board[$key1-1][$key2+1];}
	        if (isset($board[$key1][$key2-1])) { $num  += $board[$key1][$key2-1];}
	        if (isset($board[$key1][$key2+1])) { $num  += $board[$key1][$key2+1];}
	        if (isset($board[$key1+1][$key2-1])) { $num  += $board[$key1+1][$key2-1];}
	        if (isset($board[$key1+1][$key2])) { $num  += $board[$key1+1][$key2];}
	        if (isset($board[$key1+1][$key2+1])) { $num  += $board[$key1+1][$key2+1];}
	        return $num;
		}
	}


?>