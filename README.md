ArgumentListTrait
=================

Use this trait in your Guzzle Service Client. Instead of:

    $result = $client->foo(['id' => 1, 'baz' => 'bar']);

You can now do this:

    $result = $client->foo(1, ['baz' => 'bar']);

Or this:

    $result = $client->foo(1, 'bar');

Arguments are matched with parameters according to their order in the service description.

Installation
------------

Use [Composer][1] to install the library by adding it to your `composer.json`.

```json
{
    "require": {
        "gigablah/guzzle-argument-list": "~0.0.1"
    }
}
```

License
-------

Released under the MIT license. See the LICENSE file for details.

[1]: https://getcomposer.org/
