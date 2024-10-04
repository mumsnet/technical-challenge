<?php

declare(strict_types=1);

use Illuminate\Support\Sleep;
use Illuminate\Support\Str;
use Ramsey\Uuid\UuidInterface;

final class Client_IsbnClient
{
    public function __construct(
        private string $username,
        private string $password,
    ) {}

    public function get(UuidInterface $uuid): string
    {
        // To simulate an expensive HTTP call, we're sleeping here.
        // In a real system this would call out to an external service.
        Sleep::for(3)->seconds();

        $integer = Str::of((string) $uuid->getInteger());

        return sprintf('%s-%s-%s-%s-%s',
            $integer->substr(0, 3),
            $integer->substr(3, 2),
            $integer->substr(5, 5),
            $integer->substr(10, 2),
            $integer->substr(12, 1),
        );
    }
}
