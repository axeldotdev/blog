title: Tip of the week #4
description:
category: Tip of the week
published_at: draft
----------
# Tip of the week #4

Hello everybody!

Today I want to talk about static classes and particularly the `static` and `self` keywords in PHP.

Most of you know about the `self` keyword. If we take the example below:

```php
<?php

namespace Axeldotdev\Countries\Countries;

class France extends Country
{
    public const CODE = 'FRA';

    public static function getCode()
    {
        return self::CODE;
    }
}
```

Imagine that the `Country` class also contains the `CODE` constant who return `NULL`.

Can you say what value the `getCode()` method will return?

It will return `NULL` because the `self` keyword in PHP reference the deeper inheritance class.

A little observation, here the `self` keyword is equivalent to the `parent` keyword.

Hope you liked this little tip and it will be useful to you.

See you next time!
