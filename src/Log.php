<?php
namespace Ipaynow;
class Log{
    public static function getTime($tag){
        list($usec,$sec)=explode(" ", microtime());
        $now_time=((float)$usec+(float)$sec);
        list($usec,$sec)=explode(".", $now_time);
        $date=date($tag,$usec);
        return str_replace('x', $sec, $date);
    }

    static function outLog($api_n,$content){
        $time=self::getTime("Y年m月d日i分s秒x毫秒");
        $log_str="$time   $api_n\n$content\n------------------\n";
        $file=fopen("../log/ipaynow.log", "a+");
        fwrite($file, $log_str);
        fclose($file);
    }
}