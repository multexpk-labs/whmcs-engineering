<?php

declare(strict_types=1);

final class ModuleService
{
    public function __construct(
        private readonly ProviderClient $provider,
    ) {}

    public function create(array $service): array
    {
        if (empty($service['id'])) {
            throw new InvalidArgumentException('Service ID is required.');
        }

        return $this->provider->createService([
            'service_id' => (string) $service['id'],
        ]);
    }
}
