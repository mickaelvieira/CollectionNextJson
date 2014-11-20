# Json Collection

PHP implementation of the Collection.next+JSON Media Type

Specification: 
- [http://code.ge/media-types/collection-next-json/](http://code.ge/media-types/collection-next-json/)

## Installation

JsonCollection requires php >= 5.4

Install JsonCollection with [Composer](https://getcomposer.org/)

```json
{
    "require": {
        "mvieira/json-collection-next": "dev-master"
    }
}
```
    
## Contributing

```sh
$ git clone git@github.com:mickaelvieira/JsonCollectionNext.git
$ cd JsonCollectionNext
$ composer install
```

### Run the test

The test suite has been written with [PHPSpec](http://phpspec.net/)

```sh
./bin/phpspec run
```

### PHP Code Sniffer

This project follows the coding style guide [PSR2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

```sh
$ ./bin/phpcs --standard=PSR2 ./src/
```

## Documentation

JsonCollectionNext is an extension of [JsonCollecion](https://github.com/mickaelvieira/JsonCollection).
You will therefore find more information in the JsonCollection documentation.

### New Entities

#### List

[http://code.ge/media-types/collection-next-json/#object-list](http://code.ge/media-types/collection-next-json/#object-list)

```php
use JsonCollection\Entity\ListData;
use JsonCollection\Entity\Option;

$list = new ListData();
$list->setMultiple(true);
$list->setDefault('Default value');

$list->addOption(new Option());
$list->addOptionSet([
    new Option(),
    new Option()
]);
```

#### Option

[http://code.ge/media-types/collection-next-json/#array-options](http://code.ge/media-types/collection-next-json/#array-options)

```php
use JsonCollection\Entity\Option;

$option = new Option();
$option->setPrompt('option prompt');
$option->setValue('option value');
```

#### Status

[http://code.ge/media-types/collection-next-json/#object-status](http://code.ge/media-types/collection-next-json/#object-status)

```php
use JsonCollection\Entity\Status;

$status = new Status();
$status->setCode('status code');
$status->setMessage('status message');
```

#### Method

[http://code.ge/media-types/collection-next-json/#object-method](http://code.ge/media-types/collection-next-json/#object-method)

```php
use JsonCollection\Entity\Option;
use JsonCollection\Entity\Method;

$option = new Option();
$method = new Method();
$method->addOption($option);
```

#### Enctype

[http://code.ge/media-types/collection-next-json/#object-enctype](http://code.ge/media-types/collection-next-json/#object-enctype)

```php
use JsonCollection\Entity\Option;
use JsonCollection\Entity\Enctype;

$option = new Option();
$enctype = new Enctype();
$enctype->addOption($option);
```

#### Message

[http://code.ge/media-types/collection-next-json/#array-messages](http://code.ge/media-types/collection-next-json/#array-messages)

```php
use JsonCollection\Entity\Message;

$message = new Message();
$message->setCode('Code message');
$message->setMessage('Name message');
$message->setName('Error message');
```
### Updated Entities

#### Collection

[http://amundsen.com/media-types/collection/format/#objects-collection](http://amundsen.com/media-types/collection/format/#objects-collection)

```php
use JsonCollection\Entity\Collection;
use JsonCollection\Entity\Status;

$collection = new Collection();
$collection->setStatus(new Status());
```

#### Error

[http://amundsen.com/media-types/collection/format/#objects-error](http://amundsen.com/media-types/collection/format/#objects-error)

```php
use JsonCollection\Entity\Error;
use JsonCollection\Entity\Message;

$error = new Error();

$error->addMessage(new Message());
$error->addMessageSet([
    new Message(),
    new Message()
]);
```

### Template

[http://amundsen.com/media-types/collection/format/#objects-template](http://amundsen.com/media-types/collection/format/#objects-template)

```php
use JsonCollection\Entity\Template;
use JsonCollection\Entity\Enctype;
use JsonCollection\Entity\Method;

$template = new Template();
$template->setMethod(new Method());
$template->setEnctype(new Enctype());
```

### Data

[http://amundsen.com/media-types/collection/format/#arrays-data](http://amundsen.com/media-types/collection/format/#arrays-data)

```php
use JsonCollection\Entity\Data;
use JsonCollection\Entity\ListData;
use JsonCollection\Entity\Option;
use JsonCollection\Entity\Type\Input;

$data = new Data();
$data->setType(Input::DATETIME);
$data->setRequired(true);
$data->setList(new ListData());
$data->addOptionToList(new Option());
```

### Link

[http://amundsen.com/media-types/collection/format/#arrays-links](http://amundsen.com/media-types/collection/format/#arrays-links)

```php
use JsonCollection\Entity\Link;
use JsonCollection\Entity\Type\Media;

$link = new Link();
$link->setType(Media::JPEG);
```

## Working with options and messages

In order to work with JsonCollection Arrays [Options](http://code.ge/media-types/collection-next-json/#array-options) and [Messages](http://code.ge/media-types/collection-next-json/#array-messages) the API provides 2 interfaces that implement the same logic.

See. [here](https://github.com/mickaelvieira/JsonCollection#working-with-data-and-links) for details

- The interface ```OptionAware``` implemented by ```Enctype```, ```ListData``` and ```Method``` entities,
provides the methods ```addOption```, ```addOptionSet``` and ```getOptionSet```
- The interface ```MessageAware``` implemented by the ```Error``` entity,
provides the methods ```addMessage```, ```addMessageSet``` and ```getMessageSet```
