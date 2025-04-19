# filterURL-GetAnyMessage

## Description
filter the chat type by telegram url with custom filters!

Function to filter the chat type by telegram url with custom filters: (b/u) 
_For all supported formats, go to the examples folder._

all type of chats: ```channel/group/user/bot || public/private || channel comment & topics groups```

( From my project: @GetAnyMessageRobot )

_[You can check our bot here](https://t.me/GetAnyMessageRobot)._

[*Written by PHPwiz ( php-wiz )](https://github.com/php-wiz)

## explanation
**url paths:** 
```php
$out1 = $result1['out1'] ?? null; // PATH URL 1 
$out2 = $result1['out2'] ?? null; // PATH URL 2
$out3 = $result1['out3'] ?? null;  // PATH URL 3
$out4 = $result1['out4'] ?? null; // PATH URL 4
$out5 = $result1['out5'] ?? null; // PATH URL 5
```

**info:** 
```php
PATH URL 1 ($out1):
if path is c/C = private chat(group/channel).
if path is u/U = user chat.
if path is b/B = chat bot.
else = (username) so its public channel/group.

*checks if path does not start with + to filter out invitation links.
*Check only on Telegram links.
```
