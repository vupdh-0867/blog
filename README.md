# blog
Migration

```bash
// tạo table
php artisan make:migration create_<table name>_table
// thêm column
hp artisan make:migration add_<column name>_to_<table name>_table
```

Seeder

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

Artisan console
Tinker
```bash
php artisan tinker
```
Tinker show sql
```bash
DB::listen(function ($query) { dump($query->sql); dump($query->bindings); dump($query->time); });
```
