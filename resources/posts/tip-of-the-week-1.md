title: Tip of the week #1
description: The FormRequest class on laravel are very usefull and can be very light and quick to right.
category: Tip of the week
published_at: 2021-09-13
----------
# Tip of the week #1

Hello everybody!

I decided to resume my "tip of the day" blog posts but in a weekly format because it is too much work to do a tip per day, sorry about that.

I'm going to write these blog posts in English so I can practice the language.

Without further ado, let's get started!

---

This first tip will be about **FormRequest**, the class that help you validate the request parameters sent by the users. A FormRequest, in most cases, looks like that:

```php
<?php

namespace App\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'description' => ['string', 'nullable'],
            'project_id' => [
                'integer',
                'required',
                'exists:projects',
            ],
        ];
    }
}
```

The `authorize()` method is a sort of gate for your request and the `rules()` method define the validation rules of your request.

But most of the time, you define the authorisation rules in a real gate or in a policy class and you end up returning true in the FormRequest `authorize()` method.

It is not necessary, dump it. Don't add useless code to your classes.

If we check the parent class [Illuminate\Foundation\Http\FormRequest](https://github.com/laravel/framework/blob/8.x/src/Illuminate/Foundation/Http/FormRequest.php), we will see a [passesAuthorization()](https://github.com/laravel/framework/blob/240bf68c252a2cc21a68658f92a3356c3b073559/src/Illuminate/Foundation/Http/FormRequest.php#L170) method.

```php
protected function passesAuthorization()
{
    if (method_exists($this, 'authorize')) {
        $result = $this
            ->container
            ->call([$this, 'authorize']);

        return $result instanceof Response
            ? $result->authorize()
            : $result;
    }

    return true;
}
```

That method check if your FormRequest class (not the parent) has an `authorize()` method and if not it will return true anyway.

Hope you liked this little tip and it will be useful to you.

---

Most of the tips I'm going to post I find while developing [this project](https://github.com/axeldotdev/wings), so feel free to take a look.

Before I finish, I apologize if the English in this blog post is not very good, and I take advice and fixes if you have any. You can contact me on [Twitter](https://twitter.com/axeldotdev).

See you next time!
