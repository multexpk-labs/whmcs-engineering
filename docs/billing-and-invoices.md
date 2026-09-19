# Billing and Invoice Engineering

Billing is a state-management problem as much as an email problem.

## Investigation model

    Order
      |
    Invoice
      |
    Payment
      |
    Service state
      |
    Notification

When an invoice is generated or updated, inspect the complete event path before changing notification settings.

## Duplicate notifications

Possible sources include:

- invoice creation events;
- invoice reminders;
- custom hooks;
- module callbacks;
- cron tasks;
- email template automation;
- external webhook processors.

Use timestamps and event logs to identify the source.

## Safety

Never alter production invoice data directly without backup, rollback planning, and verification.
