<?php

// ------------ lixlpixel recursive PHP functions -------------
// recursive_directory_size( directory, human readable format )
// expects path to directory and optional TRUE / FALSE
// ------------------------------------------------------------
function recursive_directory_size($directory, $format=FALSE)
{
    $size = 0;
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
                }elseif(is_dir($path))
                {
                    $handlesize = recursive_directory_size($path);
                    if($handlesize >= 0)
                    {
                        $size += $handlesize;
                    }else{
                        return -1;
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
            return round($size / 1048576, 1).' MB';
        }elseif($size / 1024 > 1)
        {
            return round($size / 1024, 1).' KB';
        }else{
            return round($size, 1).' bytes';
        }
    }else{
        return $size;
    }
}
// ------------------------------------------------------------
$dir = getcwd();
$files = scandir($dir);
$totalSize = 0;
foreach($files as $file){
echo "File = ".$file . " ==>";
	if($file != "." && $file != ".."){
		echo $fileSize = recursive_directory_size($file)."<br>";
		$totalSize += $fileSize;
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
?>