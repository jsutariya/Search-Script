<?php

// ------------ lixlpixel recursive PHP functions -------------
// recursive_directory_size( directory, human readable format )
// expects path to directory and optional TRUE / FALSE
// ------------------------------------------------------------
function recursive_directory_size($directory, $format=FALSE)
{
    $size = 0;
	$filecount = 0;
	$array = array();
    if(substr($directory,-1) == '/')
    {
        $directory = substr($directory,0,-1);
    }
    if(!file_exists($directory) || !is_dir($directory) || !is_readable($directory))
    {
        return -1;
    }
    if($handle = opendir($directory))
    {
        while(($file = readdir($handle)) !== false)
        {
            $path = $directory.'/'.$file;
            if($file != '.' && $file != '..')
            {
                if(is_file($path))
                {
                    $size += filesize($path);
					$filecount = $filecount + 1;
                }elseif(is_dir($path))
                {
                    $handlesize = recursive_directory_size($path);
                    if($handlesize['size'] >= 0)
                    {
                        $size = $size + $handlesize['size'];
						$filecount = $filecount + $handlesize['count'];
                    }else{
                        return array();
                    }
                }
            }
        }
        closedir($handle);
    }
    if($format == TRUE)
    {
        if($size / 1048576 > 1)
        {
			$array['size'] = round($size / 1048576, 1).' MB';
			$array['count'] = $filecount;
            return $array;
        }elseif($size / 1024 > 1)
        {
			$array['size'] = round($size / 1024, 1).' KB';
			$array['count'] = $filecount;
            return $array;
        }else{
			$array['size'] = round($size, 1).' bytes';
			$array['count'] = $filecount;
            return $array;
        }
    }else{
		$array['size'] = $size;
		$array['count'] = $filecount;
		return $array;
    }
}
// ------------------------------------------------------------
$dir = getcwd();
$files = scandir($dir);
$totalSize = 0;
$totalCount = 0;
foreach($files as $file){
	if(is_dir($file)){
		echo "Folder Name = ".$file . " ==> ";
		if($file != "." && $file != ".."){
			$fileSize = recursive_directory_size($file, true);
			echo " Files Count ". $fileSize['count'];$totalCount += $fileSize['count'];
			echo ", Files Size ". $fileSize['size']; $totalSize += $fileSize['size'];
		}
		echo "<br>";
	}
}
echo $totalSize."<br>";
		if($totalSize / 1048576 > 1)
        {
            echo round($totalSize / 1048576, 1).' MB';
        }elseif($totalSize / 1024 > 1)
        {
            echo round($totalSize / 1024, 1).' KB';
        }else{
            echo round($totalSize, 1).' bytes';
        }
		echo " Count " .$totalCount;
?>