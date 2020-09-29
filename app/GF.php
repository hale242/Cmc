<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


trait GF
{
    //


    public static function formatUrl($string,$encode=true)
	{

		$encode=false; //true = no encode; false= encode
		$string=trim($string);
		$string = str_replace(" ","-",$string);
		$string = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu','',$string);
		$string=preg_replace("/[\_]{2,}/",'-',$string);

		return ($encode==true)?rawurlencode(trim($string, '-')):trim($string, '-');
	}

	public static function print_r($data){
		echo '<pre>';
			print_r($data);
		echo '</pre>';
    }

	public static function array_sort($array, $on, $order)
	{
		$new_array = array();
		$sortable_array = array();

		if (count($array) > 0) {
			foreach ($array as $k => $v) {
				//echo $v;
				if (is_array($v)) {
					foreach ($v as $k2 => $v2) {
						if ($k2 == $on) {
							//echo $v2;
							$sortable_array[$k] = $v2;
						}
					}
				} else {
					$sortable_array[$k] = $v;
				}
			}
			switch ($order) {
				case "ASC":
					asort($sortable_array);
				break;
				case "DESC":

					arsort($sortable_array);
				break;
			}
			//echo $order;
			$is = 0;
			foreach ($sortable_array as $ks=>$vs){
				$new_array[$is] = $array[$ks];
				$is++;
			}
		}

		return $new_array;
	}


	public static function readDir($dir)
	{
		$dirs = array($dir);
		$files = array() ;
		for($i=0;;$i++)
		{
			if(isset($dirs[$i]))
				$dir =  $dirs[$i];
			else
				break ;

			if($openDir = @opendir($dir))
			{
				while($readDir = @readdir($openDir))
				{
					if($readDir != "." && $readDir != "..")
					{

						if(is_dir($dir."/".$readDir))
						{
							$dirs[] = $dir."/".$readDir ;
						}
						else
						{
							$files[] = $dir."/".$readDir ;
						}
					}
				}

			}

		}

		return $files;
	}//

	public static function unlinkDir($dir)
	{
		$dirs = array($dir);
		$files = array() ;
		for($i=0;;$i++)
		{
			if(isset($dirs[$i]))
				$dir =  $dirs[$i];
			else
				break ;

			if($openDir = @opendir($dir))
			{
				while($readDir = @readdir($openDir))
				{
					if($readDir != "." && $readDir != "..")
					{

						if(is_dir($dir."/".$readDir))
						{
							$dirs[] = $dir."/".$readDir ;
						}
						else
						{

							$files[] = $dir."/".$readDir ;
						}
					}
				}

			}

		}

		foreach($files as $file)
		{
			@unlink($file) ;
		}
		$dirs = array_reverse($dirs) ;
		foreach($dirs as $dir)
		{
			@rmdir($dir) ;
		}

	}//

	public static function convertInputDate($datestr) {
		try {
			if(!empty($datestr)){
				$d = $datestr;
				$d = explode('/',$d);
				$date = $d[2].'-'.$d[1].'-'.$d[0];
				return $date;
			}
			else{
				return "";
			}
		} catch (Exception $e) {

		}
	}

	public static function convertOutputDate($datestr) {
		try {
			if(!empty($datestr)){
				$d = $datestr;
				$d = explode('-',$d);
				$date = $d[2].'/'.$d[1].'/'.$d[0];
				return $date;
			}
			else{
				return "";
			}
		} catch (Exception $e) {

		}
	}



}


?>
