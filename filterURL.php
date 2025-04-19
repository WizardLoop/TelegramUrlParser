<?php

/*
echo "Magic";
Function to filter the chat type by telegram url with custom filters: (b/u) 

all type of chats: channel/group/user/bot || public/private || channel comment & topics groups

For all supported formats, go to the examples folder.

( From my project: @GetAnyMessageRobot )

# Written by PHPwiz ( php-wiz )

# explanation:
$out1 = $result1['out1'] ?? null; // PATH URL 1
$out2 = $result1['out2'] ?? null; // PATH URL 2
$out3 = $result1['out3'] ?? null;  // PATH URL 3
$out4 = $result1['out4'] ?? null; // PATH URL 4
$out5 = $result1['out5'] ?? null; // PATH URL 5

PATH URL 1 ($out1):
if path is c/C = private chat(group/channel)
if path is u/U = user chat
if path is b/B = chat bot
else = (username) so its public channel/group 

*checks if path does not start with + to filter out invitation links.
*Check only on Telegram links.

*/

$text = 'your_telegram_link';

if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i',$text)){  // valid telegram url
if (!preg_match('/^http(s)?:\/\/t\.me\/.+\/?$/i', $text)) {
# invalid format
}
if (preg_match('/^http(s)?:\/\/t\.me\/.+\/?$/i', $text)) {

if(!function_exists("extractTelegramPaths")){
function extractTelegramPaths($url) {
$path = parse_url($url, PHP_URL_PATH);
if (empty($path)) {
return null; 
}  
$segments = explode('/', trim($path, '/'));
$out1 = isset($segments[0]) ? $segments[0] : null;
$out2 = isset($segments[1]) ? $segments[1] : null;
$out3 = isset($segments[2]) ? $segments[2] : null;
$out4 = isset($segments[3]) ? $segments[3] : null;
$out5 = isset($segments[4]) ? $segments[4] : null;
return [
'out1' => $out1,
'out2' => $out2,
'out3' => $out3,
'out4' => $out4,
'out5' => $out5,
];
}
}
$result1 = extractTelegramPaths($text);

if ($result1 === null) {
# invalid format
} else {
$out1 = $result1['out1'] ?? null; // PATH URL 1
$out2 = $result1['out2'] ?? null; // PATH URL 2
$out3 = $result1['out3'] ?? null;  // PATH URL 3
$out4 = $result1['out4'] ?? null; // PATH URL 4
$out5 = $result1['out5'] ?? null; // PATH URL 5


if(!preg_match('/^\+/',$out1)){	
	
if ($out5 != null) {
# invalid format
}else{
if ($out1 === 'c' || $out1 === 'C') {

if($out4 != null){
# invalid format
}else{
$out2 = $result1['out2'] ?? null; // id chat
$out3 = $result1['out3'] ?? null; // id message
# GROUP / CHANNEL 
# PRIVATE

// .... your logic here
}

}elseif($out1 === 'b' || $out1 === 'B') {
$out3 = $result1['out3'] ?? null; // id message
# BOT

// .... your logic here

}elseif($out1 === 'u' || $out1 === 'U') {
$out3 = $result1['out3'] ?? null; // id message
# USER

// .... your logic here

}else{

if($out3 != null){
# invalid format
}else{
$out1 = $result1['out1'] ?? null; // username
$out2 = $result1['out2'] ?? null; // id message

# GROUP / CHANNEL 
# PUBLIC

// .... your logic here

}

}	
	
}

}
if(preg_match('/^\+/',$out1)){	
# invalid format
}
}

}
}//else{//This is not a Telegram link.}

?>
