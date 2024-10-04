<?php

declare(strict_types=1);

arch('Ensure no debug functions are used')
    ->expect(['dd', 'dump', 'ray', 'die', 'var_dump', 'sleep', 'dispatch', 'dispatch_sync'])
    ->not->toBeUsed();

arch('Ensure strict types')
    ->expect('App')
    ->toUseStrictTypes();

arch('Avoid classes being open for extension')
    ->expect('App')
    ->classes()
    ->toBeFinal();

arch('Ensure no extension')
    ->expect('App')
    ->classes()
    ->not->toBeAbstract();
