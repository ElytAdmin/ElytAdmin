<?php

namespace  Elyt\Admin\Utils\File;

class FileUtil
{


        public static function getPHPFiles($dir)
    {
        $array = [];
        $handle = opendir($dir); // 打开目录
        while (false != ($file = readdir($handle))) {
            // 列出所有文件并去掉'.'和'..'
            $pathinfo = pathinfo($file);
            if ($pathinfo['basename'] != '.' && $pathinfo['basename'] != '..') {
                // 所得到的文件名是否是一个目录
                if (is_dir("$dir/$file")) {
                    // 进行递归搜索
                    $array = array_merge($array, self::getPHPFiles("$dir/$file"));
                } else {
                    if ($pathinfo['extension'] != 'php') continue;
                    $array[] = "$dir/$file";
                }
            }
        }
        return $array;
    }
}



