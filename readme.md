# Memail

Memail is a PHP Laravel library for automate email sending.
It sits on Laravel Mail and send dynamic email created with campaign and template.
Template customizable but Campaign is not. Once you specify the title of campaign you can not edit it.
But you can change related template. 

## Installation

Use composer to install the memail.

```bash
composer require radoan/memail
```

## Service Provider
Add service provider in your ```config/app.php```

```php
Radoan\Memail\MemailServiceProvider::class,
```
## Facade
Add aliases in your ```config/app.php```

```php
'Memail' => Radoan\Memail\Facades\Memail::class,
```

## Publish Vendor
Publish vendor files by bellow command and selecting ```Radoan\Memail``` package

```php
php artisan vendor:publish --provider="Radoan\Memail\MemailServiceProvider"

```

## Run migration command
Run migration command to get necessary database tables.

```php
php artisan migrate

```
## Changing view files
Now you are about to go. You published view files needed by the package to ```/resources/views/memail``` diractory.
Now all you need to do is customizing the views according to your need. See example bellow.

```php
@extends('layout.app')

@section('contents')
    {{-- Keep the views under your layout and sections --}}
@endsection

```

## Usage
Now you can send email if you have smtp credentials set in your ```.env``` or ```/config/mail.php```.
If you did everything right then you will be able to send emails by bellow code. Everything will be explaind in comment.

```php
Memail::send($to, $campaignTitle, [
        'data'=> [
            //keys are macroses decleared in template
            //Values are data what will replace macros
            'name' => 'Radoan Hossain'
        ],
        'attachments'   => [ 'path/to/attachment/file' ],
        'options'       => [
            //If you need cc
            'cc'        =>  'example@example.com',
            //If you need bcc
            'bcc'       =>  'example@example.com',
            //Enable queue but you will need to configure your queues before using this feature.
            'queue'     =>  true,
            //Delayed Message Queueing but you need to send the time
            //$when = now()->addMinutes(10);
            'later'     =>  $when
        ]
    ]);


```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Find me on upWork
[Radoan Hossan](https://www.upwork.com/o/profiles/users/~01f31be6e769b953e4/)

## Find me on Linkedin
[Radoan Hossan](https://www.linkedin.com/in/revendol/)
