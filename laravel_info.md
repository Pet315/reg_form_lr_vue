﻿1\. 

Игнорировать: внешние пакеты PHP (vendor) и JS (node\_modules), личные данные (.env), временные файлы (кеш), сессии, куки, логи, сгенерированные (public/storage)

2\. 

Миграции – для создания и изменения столбцов таблиц (*php artisan make:migration create\_users\_table*)

Сиды – для добавления новых данных в таблицы (*php artisan make:seeder UserSeeder*)

2\.1. 

Для отката последней группы миграций: *php artisan migrate:rollback*

Для отката двух последних групп: *php artisan migrate:rollback --step=2*

Для отката всех миграций и базы данных: *php artisan migrate:reset*

Для отката и переисполнения всех миграций: *php artisan migrate:refresh*

3\. 

Связи: hasOne, hasMany, belongsTo, belongsToMany

3\.1.

attach() – добавляет запись к связи:

*$user = User::find(1);*

*$user->roles()->attach([1, 2, 3]); // добавляет роли где id=1,2,3*

detach() – удаляет запись из связи:

*$user->roles()->detach([1, 2, 3]);*

sync() – удаляет записи, которые уже есть и добавляет новые (синхронизирует)

*$user->roles()->sync([1, 4, 5]);*

4\.

Пакет Vite устанавливается на Laravel, далее создаётся файл vite.config.js, который cобирает адреса, за которыми находятся все стили и скрипты, которые могут использоваться в проекте. Дальше ресурсы подключаются в шаблоне при помощи директивы @vite. После этого нужно запустить Vite сервер npm run dev и для продакшна использовать npm run build.

4\.1

NPM и YARN – инструменты для того, чтобы устанавливать, обновлять и руководить зависимостями в проекте (скрипты, стили, картинки и т.д.). Добавление пакетов: *npm install package\_name*

5\.

5\.1

Файлы роутинга (web.php, api.php) - это файлы, в которых определяются пути (routes) для приложения.

Нужны для обработки HTTP-запросов, определения маршрутов, организации кода, называния роутов (при необходимости)

5\.2

Переменные / регулярки – для динамической обработки URL-адреса.

Использование:

- параметры в маршруте: *Route::get('/user/{id}', 'UserController@show');*
- регулярки: *Route::get('/user/{id}', 'UserController@show')->where('id', '[0-9]+');*
- обращение к параметрам в контроллере: public function show($id) { ... }

5\.3

Имена для роутов через name():

*Route::get('/user/profile', 'UserController@profile')->name('profile');*

*```<a href="{{ route('profile') }}">Профиль</a>```*

6\.

Artisan - консольная утилита в Laravel, которая предоставляет различные команды для управления приложением, создания компонентов, миграций, сидеров и многих других задач.

Создание новой команды: *php artisan make:command CommandName*

Запуск: *php artisan command-name*

6\.1

Laravel Task Scheduling - это функциональность Laravel, которая позволяет запускать определенные задачи (команды) на сервере в удобное для вас время или с заданной периодичностью.

Для работы используется файл app/Console/Kernel.php

Добавление новой задачи в методе* schedule():

*protected function schedule(Schedule $schedule) {* 

*$schedule->command('my:custom-command')->dailyAt('03:00'); // каждый день в 3 утра*

*}*

Другие методы: daily, hourly, weekly, monthly, yearly, everyMinute, cron (собственное выражение)

Регистрация задач: *php artisan schedule:run*

7\.

Laravel Queues - механизм для обработки фоновых задач в приложении, позволяет асинхронно выполнять длительные или ресурсоемкие операции без блокирования основного приложения. 

Очереди (Queues) - это место, где задачи помещаются для дальнейшего выполнения.

7\.1

Задачи (Jobs) представляют собой конкретные действия, которые нужно выполнить.

(Queue Worker): Воркер - это процесс, который получает задачи из очереди и выполняет их при помощи: *php artisan queue:work*

Настраиваются различные очереди и драйверы в файле config/queue.php


