# WHMCS Troubleshooting

Use an evidence-first process:

    Observe
      -> Reproduce
      -> Collect logs
      -> Identify event
      -> Isolate component
      -> Change one thing
      -> Verify
      -> Document

## Common areas

### HTTP 500

Check PHP error logs, application logs, extensions, dependencies, and recent changes.

### Empty or incorrect checkout

Inspect product configuration, configurable options, module validation, hooks, and browser/server logs.

### Duplicate emails

Trace invoice/event creation, reminders, hooks, cron, and module callbacks.

### Provisioning failure

Inspect the exact provider request, response, timeout, authentication, and service state.

### Lock/timeouts

Identify the database operation, transaction duration, concurrent process, and retry behavior before changing timeout values.
