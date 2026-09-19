# WHMCS Security

WHMCS commonly sits at the boundary between customers, billing, and infrastructure providers.

## Controls

- least-privilege admin access;
- MFA where available;
- strong API credential handling;
- HTTPS;
- protected webhooks;
- input validation;
- output encoding;
- secure file permissions;
- regular updates;
- backups;
- audit logs.

## Never commit

    configuration.php
    database credentials
    provider API keys
    webhook secrets
    customer data
    production database dumps

Public examples must use placeholders.
