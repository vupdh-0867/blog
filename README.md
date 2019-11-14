# blog
Migration

```bash
// tạo table
php artisan make:migration create_<table name>_table
// thêm column
hp artisan make:migration add_<column name>_to_<table name>_table
```

## Seeder

```bash
//Tạo seeder
php artisan make:seeder UsersTableSeeder
```

tạo dữ liệu mẫu trong seed
```php
public function run()
    {
        DB::table('users')->insert([
            'name' => 'Vu Phan',
            'email' => 'vuphan@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
    }
```

Hoặc sử dụng model factory

```bash
php artisan make:factory UserFactory
```

```php
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
```
thêm vào seeder
```php
factory(App\Model\User::class, 5)->create();
```
chạy seed
```bash
//Tạo seeder
php artisan db:seed
```
## Tinker
Artisan console
Tinker
```bash
php artisan tinker
```
Tinker show sql
```bash
DB::listen(function ($query) { dump($query->sql); dump($query->bindings); dump($query->time); });
```
## Crontab
Run schedule bằng crontab, gõ lệnh
```bash
    crontab -e
```

thêm dòng này
```
* * * * * php /home/phan.dang.hai.vu/Documents/php/blog/artisan schedule:run
```

## Queue & jobs

Tạo job
```
php artisan make:job NotifyPostCommented
```
Thêm đối số cho hàm tạo trong job

```php
<?php

namespace App\Jobs;

use App\Podcast;
use App\AudioProcessor;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyPostCommented implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    /**
     * Create a new job instance.
     *
     * @param  Post  $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @param  AudioProcessor  $processor
     * @return void
     */
    public function handle(AudioProcessor $processor)
    {
        // Process uploaded podcast...
    }
}
```

Đẩy job vào queue

```php
NotifyPostCommented::dispatch($post);
```

mặc định nếu ta không chỉ định queue thì laravel sẽ sử dụng queue mặc định là `default`, ta có thể chỉnh định queue:

```php
NotifyPostCommented::dispatch($post)->onQueue('emails');
```

Tạo worker để chạy thực hiên các job trong queue

```bash
# queue mặc định (default)
php artisan queue:work
# queue khác
php artisan queue:work --queue=name
# nhiều queue
php artisan queue:work --queue=name,name2,name3
```
## custom validation

```
php artisan make:rule Uppercase
```
