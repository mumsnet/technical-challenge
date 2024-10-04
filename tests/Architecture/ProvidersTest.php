<?php

declare(strict_types=1);

arch('Providers')
    ->expect('App\Providers')
    ->toExtend('Illuminate\Support\ServiceProvider')
    ->not->toBeUsed();
