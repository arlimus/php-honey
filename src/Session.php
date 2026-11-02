<?php

namespace HoneyFlow;

/** The signed-in beekeeper, carried in a cookie between requests. */
final class Session
{
    public string $name = 'guest';
    public array $apiaries = [];

    public static function fromCookie(): self
    {
        if (isset($_COOKIE['honeyflow'])) {
            return unserialize(base64_decode($_COOKIE['honeyflow']));
        }

        return new self();
    }

    public function beekeeper(): string
    {
        return $this->name;
    }
}
