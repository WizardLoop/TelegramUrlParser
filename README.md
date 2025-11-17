# TelegramUrlParser

A lightweight and powerful PHP library for parsing Telegram message
URLs.\
Created by **@WizardLoop**.

[![Packagist
Version](https://img.shields.io/packagist/v/wizardloop/telegramurlparser)](https://packagist.org/packages/wizardloop/telegramurlparser)
[![Packagist Downloads](https://img.shields.io/packagist/dt/wizardloop/telegramurlparser?color=blue)](https://packagist.org/packages/wizardloop/telegramurlparser)
![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/status-stable-success)

TelegramUrlParser extracts chat type, IDs, usernames, and message
identifiers from any Telegram URL.\
Supports public, private, bot, user, and topic-based chats.

------------------------------------------------------------------------

## ✨ Features

-   Validates Telegram URLs

-   Parses any `t.me` and Telegram link

-   Extracts:

    -   Username
    -   Chat ID
    -   Message ID
    -   User/Bot identifier

-   Supports:\
    ✔ Public chats\
    ✔ Private groups/channels\
    ✔ Bots\
    ✔ Users\
    ✔ Topic chats

-   Zero dependencies

-   Clean static API

------------------------------------------------------------------------

## 🛠 Installation

### Composer

    composer require wizardloop/telegramurlparser

Or manually in `composer.json`:

``` json
{
  "require": {
    "wizardloop/telegramurlparser": "^1.0"
  }
}
```

------------------------------------------------------------------------

## 🚀 Usage Example

``` php
<?php

use Wizardloop\TelegramUrlParser\FilterURL;

$check = FilterURL::checkUrl("https://t.me/username/123");

if (isset($check['error'])) {
    die("Error: " . $check['error']);
}

print_r($check);
```

------------------------------------------------------------------------

## 📦 Returned Structure

`FilterURL::checkUrl()` returns:

``` php
[
    'out1' => string|null,
    'out2' => string|null,
    'out3' => string|null,
    'out4' => string|null,
    'out5' => string|null
]
```

Meaning: - **out1** --- Username / c / u / b\
- **out2** --- Chat ID / Username / Message ID\
- **out3** --- Message ID\
- **out4** --- Extra (private groups)\
- **out5** --- Extra (invalid if exists)

If invalid:

``` php
['error' => 'invalid url!']
```

------------------------------------------------------------------------

## 🔗 Supported URL Formats

  Type                  Example
  --------------------- --------------------------------
  Public channel post   `https://t.me/username/123`
  Private channel       `https://t.me/c/123456/78`
  Public group          `https://t.me/groupname/55`
  Private group         `https://t.me/c/777/99`
  Bot message           `https://t.me/b/botname/44`
  User (username)       `https://t.me/u/wizardloop/12`
  User (ID)             `https://t.me/u/123456789/34`
  Topic chats           `https://t.me/groupname/22222`

------------------------------------------------------------------------

## 🧠 Logic Helper

``` php
if (!preg_match('/^\+/', $out1)) {

    if ($out1 === 'c') {
        // Private channel/group
        $chatId = $out2;
        $msgId  = $out3;
    }
    elseif ($out1 === 'b') {
        // Bot
        $botUsername = $out2;
        $msgId       = $out3;
    }
    elseif ($out1 === 'u') {
        // User
        $userIdOrUsername = $out2;
        $msgId            = $out3;
    }
    else {
        // Public channel/group
        $username = $out1;
        $msgId    = $out2;
    }
}
```

------------------------------------------------------------------------

## 📁 Project Structure

    src/
     └── FilterURL.php
    composer.json
    README.md

------------------------------------------------------------------------

## 👤 Author

**WizardLoop (@wizardloop)**

------------------------------------------------------------------------

## 📄 License

MIT License
