<?php
/**
        *
        * 简易后台地址扫描器
        * by 渔夫
        * date 2017-11-20
        * v0.1
        * 可以用于渗透测试前期的信息搜集
        * 建议在linux下 和 php命令行的方式 使用！
        * 禁止使用在非法途径！
*/
        #扫描文件名，可以自行扩展
        $file_array = array(
                'a.txt',
                'b.txt',
                'robots.txt',
        );
        #扫描目录 ，可以自行扩展
        $dir_array = array(
                '/',
                '/a/',
                '/m/',
                '/c/',
        );
        #请求地址
        $url = 'curl -I -m 10 -o /dev/null -s -w %{http_code} http://www.zbj.com';
        #循环扫描，结果可以输出整理成文本
        foreach($dir_array as $k=>$v){
            foreach($file_array as $key=>$val){
                    $code = $res = null;
                    echo $curl = $url.$v.$val;
                    exec($curl,$code,$res);
                    if($code[0]==200){
                           echo  '-ok!'.PHP_EOL; 
                    }else{
                           echo   $code[0].'-no!'.PHP_EOL;
                    }
            }
        }