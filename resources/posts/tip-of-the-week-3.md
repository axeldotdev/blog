title: Tip of the week #3
description: The current() function in PHP must be used with some care and sometimes replaced by reset().
category: Tip of the week
published_at: 2021-09-27
----------
# Tip of the week #3

Hello everybody!

I think most of you use the [current()](https://www.php.net/manual/fr/function.current.php) function in PHP to get the first index of an array but it is not bullet proof, let me explain.

If we take the code bellow:

```php
$users = User::all();
$data = collect();
$monday = now()->addWeek()->startOfWeek();
$friday = $monday->clone()->addDays(4);
$week = CarbonPeriod::create($monday, $friday)->toArray();

foreach ($users as $user) {
    $tasks = Task::query()
        ->where('user_id', $user->id)
        ->whereBetween('date', [
            current($week),
            end($week),
        ])
        ->get();

    foreach ($week as $date) {
        $data->put(
            $date->translatedFormat('l j'),
            collect(['None']),
        );
    }

    foreach ($tasks as $task) {
        $due_at = $task->due_at->translatedFormat('l j');
        $data[$due_at] = $task;
    }
}
```

First, I know this code isn't great, it's just to illustrate the case more easily.

In the code above, the `current()` function will return the first index of the `$week` array for the first user but for next users, it will return the last index, why?

Because we loop on the array just after so at the end of the loop, the current index is the last one and the [current()](https://www.php.net/manual/fr/function.current.php) function will return the same value as the [end()](https://www.php.net/manual/fr/function.end.php) function.

To avoid that you can use the [reset()](https://www.php.net/manual/fr/function.reset.php) function, it will always return the first index except when the array is empty of course like the other functions.

Or you can use `$week[0]` 😅

Hope you liked this little tip and it will be useful to you.

See you next time!
