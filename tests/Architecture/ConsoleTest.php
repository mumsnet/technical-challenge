<?php

declare(strict_types=1);

arch('Commands')
    ->expect('App\Console\Commands')
    ->toExtend('Illuminate\Console\Commands')
    ->toHaveSuffix('Command')
    ->toHaveMethod('handle')
    ->toImplementNothing()
    ->not->toBeUsed();
