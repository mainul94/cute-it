<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/1/16
 * Time: 4:04 PM
 */

if (!function_exists('get_size_to_user')) {
	/**
	 * @param float -Kb $size
	 * @param int $precision
	 * @param bool $with_label
	 * @return string
	 */
	function get_size_to_user_max_gb($size, $precision=2, $with_label=true)
	{
//		----- 1TB = (1024x1024x1024x1024)= (1073741824)
//		1GB = (1024x1024x1024)= 1073741824
//		1MB = (1024x1024) = 1048576
//		1KB = 1024 = 1024 = 1024
		switch ($size) {
			case $size < 1048576:
				return ($precision?round($size / 1024, $precision):ceil($size / 1024)) . ($with_label?' KB':null);

			case $size < 1073741824:
				return ($precision?round($size / 1048576, $precision):ceil($size / 1048576)) . ($with_label?' MB':null);

			default:
				return ($precision?round($size / 1073741824, $precision):ceil($size / 1073741824)) . ($with_label?' GB':null);

		}
	}
}