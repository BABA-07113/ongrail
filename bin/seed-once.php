<?php

use App\Models\Article;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';

$app->make(ConsoleKernel::class)->bootstrap();

if (Article::exists()) {
    fwrite(STDOUT, "[seed-once] Database already seeded; syncing seed data (idempotent, admin data preserved).\n");
} else {
    fwrite(STDOUT, "[seed-once] Database empty; seeding.\n");
}

Artisan::call('db:seed', ['--force' => true]);

fwrite(STDOUT, "[seed-once] Done:\n".Artisan::output());
