<?php

declare(strict_types=1);

namespace App\Omdb\Client;

final class CachedApiConsumer implements ApiConsumerInterface
{
    private array $cache = [];

    public function __construct(
        private readonly ApiConsumerInterface $apiConsumer,
    ) {
    }

    public function getByImdbId(string $imdbId): Movie
    {
        return $this->cache[$imdbId] ??= $this->apiConsumer->getByImdbId($imdbId);
    }
}
