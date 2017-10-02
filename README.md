MessageX Email PHP SDK
===============
# Introduction
Official SDK for MessageX Email API. It's goal is to provide easy integration with MessageX Email Service in PHP and build robust applications and software with those services. We want this SDK to be community driven and led by us. You can get started in minutes by installing SDK through composer or downloading a zip file.

# Prerequisites

* PHP >= 5.6
* API and Secret Key from your MessageX account

# Installation

### Composer
Add following to the composer.json file

```json
    {
        "require": {
            "messagex/messagex-php-sdk": "~1.0"
        }
    }
```

Or from the CLI

```bash
composer require messagex/messagex-php-sdk
```

# Quickstart

## Send an Email
This is a minimal code sample needed in order to send a basic email using SDK.

```php
require 'vendor/autoload.php';

use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Body;
use MessageX\Service\Email\EmailClient;

$emailClient = new EmailClient([
        'credentials' => ['key' => 'XXXXX', 'secret' => 'XXXXX']
    ]);

$emailClient->sendEmail(
    (new Email('John Doe <johndoe@example.com>', ['Jane Doe <janedoe@example.com>']))
        ->setSubject('Greetings')
        ->addBody(new Body('text/plain', 'Hi Jane))
);
```

Name of the reciever or sender can be added using notation showed in code sample above. Adding a name is not required, adding just email address is also supported. 
At the moment only following content types are support for the email body

* text/html
* text/plain

## Add CC and BCC
Adding CC and BCC is also  simple as

```php
require 'vendor/autoload.php';

use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Body;
use MessageX\Service\Email\EmailClient;

$emailClient = new EmailClient([
        'credentials' => ['key' => 'XXXXX', 'secret' => 'XXXXX']
    ]);

$emailClient->sendEmail(
    (new Email('John Doe <johndoe@example.com>', ['Jane Doe <janedoe@example.com>']))
        ->setSubject('Greetings')
        ->addBcc(['John Doe <bcc@example.com>'])
        ->addCc(['John Doe <cc@example.com>'])
        ->addBody(new Body('text/plain', 'Hi Jane'))
);
```

Same rules applies regarding email address and names as in the first example.

## Add Attachment

You can add one or more attachments to the email as following

```php
require 'vendor/autoload.php';

use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Body;
use MessageX\Service\Email\ValueObject\Attachment;
use MessageX\Service\Email\EmailClient;

$emailClient = new EmailClient([
        'credentials' => ['key' => 'XXXXX', 'secret' => 'XXXXX']
    ]);

$emailClient->sendEmail(
    (new Email('John Doe <johndoe@example.com>', ['Jane Doe <janedoe@example.com>']))
        //... Code removed
        ->addAttachment(Attachment::fromFile('path/to/file.pdf'))
);

```
## Custom Tags

Tags are custom text labels associated with the the email. Maximum number of tags that can be added is 5.  Add you custom tags as showed in sample below

```php
require 'vendor/autoload.php';

use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Body;
use MessageX\Service\Email\ValueObject\Attachment;
use MessageX\Service\Email\EmailClient;

$emailClient = new EmailClient([
        'credentials' => ['key' => 'XXXXX', 'secret' => 'XXXXX']
    ]);

$emailClient->sendEmail(
    (new Email('John Doe <johndoe@example.com>', ['Jane Doe <janedoe@example.com>']))
        //... Code removed
        ->addTag('Tag1')
);
```

## Custom Headers
Also custom headers will be added to the email and sent to the recipients. Maximum number of custom headers that can be added is 5. Add custom headers as shown in sample below

```php
require 'vendor/autoload.php';

use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Body;
use MessageX\Service\Email\ValueObject\Attachment;
use MessageX\Service\Email\EmailClient;

$emailClient = new EmailClient([
        'credentials' => ['key' => 'XXXXX', 'secret' => 'XXXXX']
    ]);

$emailClient->sendEmail(
    (new Email('John Doe <johndoe@example.com>', ['Jane Doe <janedoe@example.com>']))
        //... Code removed
        ->addHeader('X-Custom-Header', 'Value')
);
```

## Mail Merge

Properties are representing placeholder strings in email body and value for each property is array of replacements for all recipients. Number of replacements for each placeholder must match number of recipients. Order of replacements for each placeholder must match order of recipients. Mail merge can be added as shown in the sample below

```php
require 'vendor/autoload.php';

use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Body;
use MessageX\Service\Email\ValueObject\Attachment;
use MessageX\Service\Email\EmailClient;

$emailClient = new EmailClient([
        'credentials' => ['key' => 'XXXXX', 'secret' => 'XXXXX']
    ]);

$emailClient->sendEmail(
    (new Email('John Doe <johndoe@example.com>', ['Jane Doe <janedoe@example.com>', 'Alice Doe <alicedoe@example.com>']))
        //... Code removed
        ->addBody(new Body('text/plain', 'Hi {{name}}'))
        ->addSubstitution('name', ['Jane', 'Alice'])
);
```
# Documentation

## SDK Reference

## API Reference

# Getting help