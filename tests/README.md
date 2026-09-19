# WHMCS Test Showcase

The repository should demonstrate automated testing without connecting CI to a production WHMCS installation.

## Recommended tests

- Provider response parsing
- Module validation
- Provisioning state transitions
- Webhook validation
- Duplicate-event protection
- Billing calculations
- API timeout/error handling

## Fixtures

Use sanitized JSON fixtures representing provider responses and WHMCS events.

## CI

Public CI should use mocks and fixtures. Production API credentials and customer data must never be required by tests.
