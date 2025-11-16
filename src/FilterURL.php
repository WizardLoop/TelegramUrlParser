<?php
/* 
the project created by @wizardloop                                                                                                                                                                                                                                                     
*/

namespace Wizardloop\TelegramUrlParser;

class FilterURL
{
public static function checkUrl(string $url): array 
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return ['error' => 'invalid url!'];
    }

	if (!preg_match('/^http(s)?:\/\/t\.me\/.+\/?$/i', $url)) {
        return ['error' => 'invalid url!'];
    }

    $result = self::parseUrl($url);

    if ($result !== null) {
    return $result;
    }

    return ['error' => 'invalid url!'];
}

private static function parseUrl(string $url): ?array
{
    $path = parse_url($url, PHP_URL_PATH);

    if (empty($path)) {
        return null;
    }

    $segments = explode('/', trim($path, '/'));

    return [
        'out1' => $segments[0] ?? null,
        'out2' => $segments[1] ?? null,
        'out3' => $segments[2] ?? null,
        'out4' => $segments[3] ?? null,
        'out5' => $segments[4] ?? null,
    ];
}
}

/* # usage example:
use Wizardloop\TelegramUrlParser\FilterURL;
$check = FilterURL::checkUrl("https://t.me/something");
$out1 = $check['out1'] ?? null;
$out2 = $check['out2'] ?? null;
$out3 = $check['out3'] ?? null;
$out4 = $check['out4'] ?? null;
$out5 = $check['out5'] ?? null;

if(isset($check['error'])){
$error = $check['error'] ?? 'null'; # invalid url error
}else{

if(!preg_match('/^\+/',$out1)){	
if ($out5 != null) {
# invalid url
}else{
if ($out1 === 'c' || $out1 === 'C') {
if($out4 != null){
# invalid url
}else{
$out2 // id chat
$out3 // id message

# GROUP / CHANNEL 
# PRIVATE

// .... your logic here
}

}elseif($out1 === 'b' || $out1 === 'B') {
$out2 // id chat
$out3 // id message

# BOT

// .... your logic here

}elseif($out1 === 'u' || $out1 === 'U') {
$out2 // id chat
$out3 // id message
# USER

// .... your logic here

}else{

if($out3 != null){
# invalid format
}else{
$out1 // username
$out2 // id message

# GROUP / CHANNEL 
# PUBLIC

// .... your logic here

}

}	
	
}

}
if(preg_match('/^\+/',$out1)){	
# invalid url
}

}
*/

/* # url examples:
channel post public chat: https://t.me/username/id          # username channel + channel post id
channel post private chat: https://t.me/c/id/id             # id channel + channel post id
channel comment public chat: https://t.me/username/id       # Discussion Group Username + Message ID
channel comment private chat: https://t.me/c/id/id          # Discussion Group ID + Message ID
group message public chat: https://t.me/username/id         # username group + message id
group message private chat: https://t.me/c/id/id            # id group + message id
bot message: https://t.me/b/username/id                     # username bot + message id
user message by username: https://t.me/u/username/id        # username of user + message id
user message by id: https://t.me/u/id/id                    # user id + message id
topics group message public chat: https://t.me/username/id  # username group + message id (remove topic id)
topics group message private chat: https://t.me/c/id/id     # id group + message id (remove topic id)
*/
