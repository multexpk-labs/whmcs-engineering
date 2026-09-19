<?php

declare(strict_types=1);

final class ProviderClient
{
    public function __construct(
        private readonly string $baseUrl,
        private readonly string $apiToken,
    ) {}

    public function createService(array $payload): array
    {
        if ($this->baseUrl === '' || $this->apiToken === '') {
            throw new RuntimeException('Provider configuration is incomplete.');
        }

        // Transport implementation intentionally omitted from this generic example.
        // A production client should use explicit timeouts, response validation,
        // safe logging, and provider-specific error normalization.

        return [
            'status' => 'example',
            'payload_keys' => array_keys($payload),
        ];
    }
}
