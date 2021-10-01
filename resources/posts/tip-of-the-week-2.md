title: Tip of the week #2
description: This week we are going to see 2 tips because they are very similar and even complementary.
category: Tip of the week
published_at: 2021-09-20
----------
# Tip of the week #2

Hello everybody!

This week we are going to see 2 tips because they are very similar and even complementary.

Have you ever written code like this?

```php
$tasks = Task::query()
    ->where('due_at', '<=', now())
    ->where('status', 'open')
    ->orderBy('due_at')
    ->get();
```

A few times in your codebase maybe?

The code above use **Query Builder** methods and return a **Collection**. Let's see what we can do to improve that. This tip makes use of two things built in Laravel and really easy to set up.

**Custom Eloquent Collection** and **Custom Eloquent Builder**!

Our goal is to write something like:

```php
$tasks = Task::inProgress();
```

First we will refactor the `where()` methods. You certainly think that you must write a scope on your model for that but like [Brent Roose](https://twitter.com/brendt_gd) says in his book [Laravel Beyond Crud](https://laravel-beyond-crud.com/), models in Laravel do already a lot of work so don't add code to them, try to think of an other way.

We will write a **Custom Eloquent Builder** and link it to our model. To avoid writing too much lines here, I redirect you to [this file](https://github.com/axeldotdev/wings/blob/main/src/Domain/Task/QueryBuilders/TaskQueryBuilder.php) and [this file](https://github.com/axeldotdev/wings/blob/main/src/Domain/Task/Models/Task.php).

Now that we have our **Custom Eloquent Builder** linked to our model we can do:

```php
$tasks = Task::query()->isDue()->isInProgress()->get();

// I use query() to help me with completion
```

But what if we write this line 10 times in our codebase?

Let's create a **Custom Eloquent Collection**! Once again to avoid writing too much lines, I redirect you to [this file](https://github.com/axeldotdev/wings/blob/main/src/Domain/Task/Collections/TaskCollection.php) and [this file](https://github.com/axeldotdev/wings/blob/main/src/Domain/Task/Models/Task.php).

Now we can almost fulfil our goal:

```php
$tasks = (new TaskCollection)->inProgress();
```

We have certainly created 2 additional classes and we do not use the model class but we have not overloaded our model. Initially 3 or 4 scopes is not a lot but this number necessarily grows as the project progresses and evolves.

Moreover, separate your code allows you to more easily [test it](https://github.com/axeldotdev/wings/tree/main/tests/Unit/Task). Using your custom collection class also helps you with completion because models are not always understood by IDE.

Hope you liked this little tip and it will be useful to you.

See you next time!
