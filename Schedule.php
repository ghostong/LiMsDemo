<?php
/**
 * LitMs 定时任务
 */

//每300秒执行一次非阻塞
//Lit\Ms\LitMsSchedule::every(300,function(){
//    echo "every 300 second \n";
//},"MyEvent");

//每200秒执行一次阻塞
//Lit\Ms\LitMsSchedule::loop(200,function(){
//    echo "loop 200 second \n";
//},"MyLoop");

//启动后10秒执行一次
//Lit\Ms\LitMsSchedule::after( 10, function (){
//    echo "after 10 second \n";
//},"MyAfter");

//在 Y-m-d H:i:s 执行一次
//Lit\Ms\LitMsSchedule::at( "2020-03-01 21:12:40", function (){
//    echo "at ".date("Y-m-d H:i:s")."\n";
//},"MyAt");

//每2分钟执行一次
//Lit\Ms\LitMsSchedule::cron("*/2","*","*","*","*", function (){
//    echo "Cron run ","*/2 ","* ","* ","* ","* ",PHP_EOL;
//},"MyCron1Name");

//每小时第15分执行一次
//Lit\Ms\LitMsSchedule::cron("15","*","*","*","*", function (){
//    echo "Cron run ","15 ","* ","* ","* ","* ",PHP_EOL;
//},"MyCron2Name");

//每月1日 21时 32-32分每分钟执行
//Lit\Ms\LitMsSchedule::cron("32-34","21","1","*","*", function (){
//    echo "Cron run ","28-30 ","21 ","1 ","3 ","7 ",PHP_EOL;
//},"MyCron3Name");