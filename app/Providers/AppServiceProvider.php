<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Config::set(['answersArr' => ['Да', 'Нет', 'Возможно', 'Вопрос не ясен', 'Абсолютно точно', 'Никогда', 'Даже не думай', 'Сконцентрируйся и спроси опять']]);

    }
}
