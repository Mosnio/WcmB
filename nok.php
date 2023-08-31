<?php
     


error_reporting(0);
//   trim(fgets(STDIN));
date_default_timezone_set("Asia/Jakarta");
/* START COLOR */
$res="\033[7m";
$hitam="\033[0;30m";
$abu2="\033[1;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";
$end = "\033[0m";
$blockabu = "\033[100m";
$blockmerah = "\033[101m";
$blockstabilo = "\033[102m";
$blockkuning = "\033[103m";
$blockbiru = "\033[104m";
$blockpink = "\033[105m";
$blockcyan = "\033[106m";
$blockputih = "\033[107m";


function post($url,$ua,$data){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
$r = curl_exec($ch);
return $r;
}


function gett($url,$ua){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
$r = curl_exec($ch);
return $r;
}



function potong($a){
  $a=str_repeat($a,60);
 return $a;
}


system("clear");
echo"\n\n";
echo" ▄    ▄  ▄         ▄  ▄            ▄▄▄▄▄▄▄▄▄▄▄
▐░▌  ▐░▌▐░▌       ▐░▌▐░▌          ▐░░░░░░░░░░░▌
▐░▌ ▐░▌ ▐░▌       ▐░▌▐░▌          ▐░█▀▀▀▀▀▀▀▀▀
▐░▌▐░▌  ▐░▌       ▐░▌▐░▌          ▐░▌
▐░▌░▌   ▐░█▄▄▄▄▄▄▄█░▌▐░▌          ▐░█▄▄▄▄▄▄▄▄▄
▐░░▌    ▐░░░░░░░░░░░▌▐░▌          ▐░░░░░░░░░░░▌
▐░▌░▌    ▀▀▀▀█░█▀▀▀▀ ▐░▌          ▐░█▀▀▀▀▀▀▀▀▀
▐░▌▐░▌       ▐░▌     ▐░▌          ▐░▌
▐░▌ ▐░▌      ▐░▌     ▐░█▄▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄▄▄
▐░▌  ▐░▌     ▐░▌     ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
 ▀    ▀       ▀       ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀ \n";
echo$yellow2."           USE AT YOUR OWN RISK\n\n";
sleep(2);

$url="https://api.nokofaucet.com/api/auth/login";
$data='{"email":"mcotyu@proton.me","password":"Mehamo@98"}';
$ua=array('Content-Type: application/json',
'Authorization: Bearer null',
"user-agent: null" //Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36"
);
$o=post($url,$ua,$data);
//echo$data."\n".$o."\n";
$toke=json_decode($o)->accessToken;

while(true){
$waktuSekarang = time();
$jam = date("H", $waktuSekarang);
$menit = date("i", $waktuSekarang);
$detik = date("s", $waktuSekarang);
$url="https://api.nokofaucet.com/api/auth/me";
$ua=array(
"Authorization: Bearer ".$toke,
"content-type: application/json; charset=utf-8",
"user-agent: null" //Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36"
);
$o=gett($url,$ua);
$ok=json_decode($o)->balance;
$re=json_decode($o)->remain_claim;
echo$green2." balance -> ".$putih2.$ok.$lblue2." ($jam:$menit:$detik) \n";

$url="https://api.nokofaucet.com/api/faucet";
$o=gett($url,$ua);
$ro=json_decode($o)->total_turn_claim;
if($re == "0"){
echo $red2." Habis [$re/$ro] \n";die();}
else{}
//echo$o."\n\n";die();

$url="https://api.nokofaucet.com/api/capcha";
$o=gett($url,$ua);
//echo$o."\n\n";

$url="https://api.nokofaucet.com/api/user/claim";
//$data='{"token":"U2FsdGVkX18w0/Yadhc4vPpYmp2rasHj386pbwFETpjLVMQpKYFSNbV2YueOxH1g/BrjqyPkxQF70SQu3f4fazocIjlpMMn1r9L6U1/Myetq/2iCmUe6fryOC6FQsXnQQ1n2qTHp2eN8YNTvUju6Rg=="}';
$data='{"token":"U2FsdGVkX19gBx265uC0QrN2GI0670zNi7lrTFSVKCAbTGXzNf0AzGtoJ2jSeXJlc/26eq+3e0J7b349CPJIbNDN9MJJq2vDKOeAdbuIXSzwc6DRn1gLeBy/zim8ueGHSLiqa6WNGku67yPvO2qBlg=="}';
$o=post($url,$ua,$data);
//echo$o;
$s=json_decode($o)->message;
echo$yellow2." $s $blue2 [$re/$ro]\n";

for ($x=301;$x>-1;$x--){
echo "\r \r";
echo $lblue."\r coutdown => ".$putih2.$x."  \r";
sleep(1);
}


}