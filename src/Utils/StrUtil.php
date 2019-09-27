<?php

namespace  Elyt\Admin\Utils;

class StrUtil
{


   /**
    * 把给定纯文本内容复制到系统剪贴板，兼容Mac/Win/Linux(只能普通文本内容，不支持富文本及图片甚至文件)
    * @param $content
    *
    * @return string|null
    */
    public static  function copyPlainTextToClipboard($content){
        $clipboard = PHP_OS=='Darwin' ? 'pbcopy' : (PHP_OS=='WINNT' ? 'clip' : 'xsel');
        //$content不要加引号，因为引号会被输出的，因为这句命令已经是shell执行，而不是php
        //echo也不是php命令，而是shell命令，win/mac/linux都有echo这个命令的
        $command = "echo {$content} | {$clipboard}";
        return shell_exec($command);
    }
}



