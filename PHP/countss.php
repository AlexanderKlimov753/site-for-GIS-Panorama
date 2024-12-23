<?php
//Настроки                                                    c//
$counttrue = "true";                //доступ к сатистике счетчика через Get. Сейчас: ?count=true   c//
$viewcounttrue = 1;                 //делать счетчик ссылкой на статистику. 0 - нет, 1 - да.       c//

$filesshet = $filespyt."count.txt";
if ( !file_exists($filesshet) ) {file_put_contents($filesshet, date('d.m.Y').":0,0%%%0,0%%%".date('m.Y').":0,0"); }
else {
$rez = file_get_contents($filesshet);
$rez = explode("%%%", $rez);
$rezall = explode(",", $rez[1]);

$rezdata = preg_replace('/:.*/', '', $rez[0]);
$rezpr = preg_replace('/.*:/', '', $rez[0]);
$rezpr = explode(",", $rezpr);

$rezdatamonth = preg_replace('/:.*/', '', $rez[2]);
$rezprmonth = preg_replace('/.*:/', '', $rez[2]);
$rezprmonth = explode(",", $rezprmonth);

if (strtotime(date('d.m.Y')) == strtotime($rezdata))    {
$rezpr[0] = $rezpr[0] + 1;
if (!isset($_COOKIE['visitorss'])) {
setcookie("visitorss", "yes", time()+3600*24);
$rezpr[1] = $rezpr[1] + 1; $possetitel = 1;}
else $possetitel = 0;

$rezall[0] = 1 + $rezall[0];
$rezall[1] = $possetitel + $rezall[1];

$rezprmonth[0] = $rezprmonth[0] + 1;
$rezprmonth[1] = $rezprmonth[1] + $possetitel;
$rez[2] = date('m.Y').":".$rezprmonth[0].",".$rezprmonth[1];

file_put_contents($filesshet, date('d.m.Y').":".$rezpr[0].",".$rezpr[1]."%%%".$rezall[0].",".$rezall[1]."%%%".$rez[2]);
}

else {
if (!isset($_COOKIE['visitorss'])) {
setcookie("visitorss", "yes", time()+3600*24);
$ynikuser = 1;                    }
else $ynikuser = 0;
$rezall[0] = 1 + $rezall[0];
$rezall[1] = $ynikuser + $rezall[1];
if (strtotime(date('01.m.Y')) == strtotime('01.'.$rezdatamonth)) {
$rezprmonth[0] = $rezprmonth[0] + 1;
$rezprmonth[1] = $rezprmonth[1] + $ynikuser;
$rez[2] = date('m.Y').":".$rezprmonth[0].",".$rezprmonth[1];  }
else {
$rez[2] = date('m.Y').":1,".$ynikuser;                        }

file_put_contents($filesshet, date('d.m.Y').":1,".$ynikuser."%%%".$rezall[0].",".$rezall[1]."%%%".$rez[2]);
}}



//Вывод данных статистики счетчика  - после основного кода         c//
if (isset($_GET["count"]) && $_GET["count"] == $counttrue) {
print '<style>.blockcentrs {width: 320px!important;position: fixed!important;top: 230px!important;left: 50%!important;margin-left: -160px!important;z-index: 99999!important;background: rgb(178,225,255)!important;background: -moz-linear-gradient(top,  rgba(178,225,255,1) 0%, rgba(102,182,252,1) 100%)!important;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(178,225,255,1)), color-stop(100%,rgba(102,182,252,1)))!important;background: -webkit-linear-gradient(top,  rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%)!important;background: -o-linear-gradient(top,  rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%)!important;background: -ms-linear-gradient(top,  rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%)!important;background: linear-gradient(to bottom,  rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%)!important;padding: 15px!important; line-height: 25px!important; border-radius: 5px; border: 1px solid #A5A5A5!important;}
.tableshet td {padding: 2px 5px!important;font-size: 12px!important;color: #000!important;border-right: 1px solid #90A9FF!important;border-bottom: 1px solid #90A9FF!important;}
.tableshet {background: #FAFAFA!important;}
</style>';
$rezview = file_get_contents($filesshet);
$rezview = explode("%%%", $rezview);
$rezview1 = preg_replace('/.*:/', '', $rezview[0]);
$rezview1 = explode(",", $rezview1);
$rezview2 = explode(",", $rezview[1]);
$rezview3 = preg_replace('/.*:/', '', $rezview[2]);
$rezview3 = explode(",", $rezview3);
print '<div class="blockcentrs">
<a href="'.$_SERVER['REQUEST_URI'].'no" class="openokno" style="font-weight: bold; color: #0A7AE4;font-size: 12px;float: right;">X Закрыть</a>
<b>Статистика посещаемости:</b><br />
<table class="tableshet" cellpadding="0" cellspacing="0" border="0"><tr><td></td>
<td>Просмотры</td><td>Посетители</td></tr><tr>
<td>За сегодня:</td>
<td>'.$rezview1[0].'</td><td>'.$rezview1[1].'</td></tr><tr>
<td>За тек. месяц:</td>
<td>'.$rezview3[0].'</td><td>'.$rezview3[1].'</td></tr><tr>
<td>За все время:</td>
<td>'.$rezview2[0].'</td><td>'.$rezview2[1].'</td></tr></table></div>';
}
?>