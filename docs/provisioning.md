# Provisioning

Provisioning connects WHMCS service state to an external infrastructure provider.

## Reference flow

    Paid / Approved Order
            |
        Validate
            |
       Provision API
            |
       Store result
            |
       Active Service

## Reliability

Provider calls should use:

- timeouts;
- retries for appropriate transient failures;
- idempotency;
- response validation;
- correlation IDs;
- clear failure states.

A failed provider request should not silently produce an active service.
