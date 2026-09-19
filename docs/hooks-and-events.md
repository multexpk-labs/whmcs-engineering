# Hooks and Events

Hooks connect application behavior to WHMCS lifecycle events.

## Reliable handler

    Event
      |
    Validate
      |
    Check state/idempotency
      |
    Execute
      |
    Log result

Keep handlers small. Expensive external operations should be queued or otherwise controlled where the deployment supports it.

## Duplicate event debugging

If an action generates multiple emails or external calls:

1. record the exact event;
2. list registered hooks;
3. inspect email triggers;
4. inspect cron;
5. inspect module callbacks;
6. correlate timestamps;
7. reproduce with a test record.

Do not assume that two notifications necessarily came from the same hook.
