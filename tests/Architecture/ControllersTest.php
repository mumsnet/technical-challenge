<?php

declare(strict_types=1);

arch('Ensure controllers do not extend a base class')
    ->expect('App\Http\Controllers')
    ->toExtendNothing()
    ->not->toBeUsed();
