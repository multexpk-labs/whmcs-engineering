# WHMCS Modules

A module adapter translates WHMCS lifecycle operations into provider API operations.

## Separation

    WHMCS Module
         |
    ProviderClient
         |
    HTTP/API layer

The module should not mix authentication, HTTP transport, response parsing, and business rules into one large function.

## Design goals

- explicit inputs;
- predictable return values;
- provider error normalization;
- bounded timeouts;
- safe retries;
- idempotent operations;
- structured logging.

Never embed provider credentials in source code.
