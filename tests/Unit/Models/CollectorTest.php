<?php

declare(strict_types=1);

it('has the correct columns', function () {
    expect('collectors')->toHaveColumns([
        'id',
        'name',
        'created_at',
        'updated_at',
    ]);
});
