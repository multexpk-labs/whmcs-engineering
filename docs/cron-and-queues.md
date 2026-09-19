# Cron and Queue Reliability

Scheduled execution drives many WHMCS workflows.

Check:

- PHP CLI path;
- PHP version;
- WHMCS cron frequency;
- execution time;
- memory;
- overlapping executions;
- failed tasks;
- locks;
- external API timeouts;
- notification processing.

When diagnosing cron behavior, record the exact command and runtime first.

Do not assume the web PHP version and CLI PHP version are identical.
