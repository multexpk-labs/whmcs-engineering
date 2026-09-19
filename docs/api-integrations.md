# API Integrations

External APIs should be treated as unreliable boundaries.

## Checklist

- authenticate securely;
- validate request data;
- set timeouts;
- validate response structure;
- handle HTTP errors;
- distinguish retryable from permanent errors;
- respect rate limits;
- record correlation identifiers;
- avoid logging secrets.

Example conceptual flow:

    WHMCS
      |
    Adapter
      |
    ProviderClient
      |
    HTTPS API
      |
    Validate response
      |
    Update service state
