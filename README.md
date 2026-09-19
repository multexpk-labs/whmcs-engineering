# WHMCS Engineering

Practical engineering patterns for **WHMCS-based hosting platforms**, including billing automation, provisioning, product configuration, service lifecycle, module development, hooks, webhooks, APIs, notifications, troubleshooting, and production operations.

This repository documents reusable engineering concepts rather than exposing any MULTEXPK production configuration, customer data, credentials, internal IPs, or proprietary source code.

## Scope

- WHMCS architecture and lifecycle
- PHP/module development
- provisioning integrations
- product and configurable-option design
- invoices and billing workflows
- service lifecycle automation
- hooks and event handling
- webhooks and external integrations
- API automation
- email/notification workflows
- database troubleshooting
- queue/cron reliability
- logging and observability
- security and secret handling
- upgrade and compatibility planning
- automated testing

## Hosting Platform Model

    Customer
       |
    WHMCS Client Area
       |
    Billing / Orders
       |
    WHMCS Core
       |
    +---+------------------+
    |                      |
 Provisioning          Notifications
    |                      |
 VPS / Cloud / APIs    Email / Webhooks
    |
 Provider APIs

The exact provider architecture varies by deployment.

## Engineering Principles

1. Keep business logic separate from provider-specific code.
2. Validate external input.
3. Make provisioning operations idempotent where possible.
4. Treat billing events as state transitions.
5. Make retries bounded and observable.
6. Log useful identifiers without logging secrets.
7. Test hooks and modules outside production.
8. Keep credentials outside Git.
9. Verify compatibility before PHP/WHMCS upgrades.
10. Make destructive actions explicit.

## WHMCS Lifecycle

A useful mental model:

    Order
      -> Invoice
      -> Payment
      -> Provision
      -> Active Service
      -> Suspend
      -> Unsuspend
      -> Terminate

Real installations can have additional states, retries, fraud checks, manual approval, and provider-specific workflows.

## Module Architecture

A provider module commonly separates:

    WHMCS
      |
    Module Adapter
      |
    Provider Client
      |
    Provider API

The adapter translates WHMCS service operations into provider operations.

Typical operations include:

- Create
- Suspend
- Unsuspend
- Terminate
- Change package
- Renew
- Client-area actions
- Admin actions

Provider API errors should be translated into safe, useful module responses.

## Hooks

Hooks are useful for integrating application behavior with WHMCS events.

Good hook design:

- keep handlers small;
- validate event data;
- avoid long blocking operations;
- queue expensive work where appropriate;
- make repeated execution safe;
- log failures;
- avoid recursive event loops.

## Billing and Notifications

Invoice workflows can involve several events. A single business action can therefore produce multiple notifications if hooks, email templates, reminders, or webhooks overlap.

When investigating duplicate notifications:

1. identify the originating event;
2. inspect hook registrations;
3. inspect email/template triggers;
4. inspect cron execution;
5. inspect module callbacks;
6. correlate timestamps;
7. reproduce with a controlled test invoice.

Do not fix duplicate messages by blindly disabling unrelated hooks.

## Cron and Queue Reliability

WHMCS automation depends heavily on scheduled execution.

Monitor:

- cron frequency;
- PHP CLI binary/version;
- execution time;
- memory limits;
- failed tasks;
- overlapping runs;
- provider API timeouts;
- lock contention;
- notification failures.

Prefer the PHP CLI runtime compatible with the deployed WHMCS installation and extensions.

## API Integration

External provider APIs should use:

- explicit timeouts;
- authentication outside source code;
- structured error handling;
- response validation;
- retries only for retryable failures;
- idempotency where supported;
- request correlation IDs;
- rate-limit handling.

Never assume HTTP 200 means the requested operation succeeded semantically.

## Database Engineering

Use database inspection to understand state, not as a substitute for application logic.

Useful investigation areas:

- invoices;
- services;
- orders;
- products;
- configurable options;
- module state;
- activity logs;
- webhook/event records.

Production SQL should be preceded by backups, transaction planning, and a rollback strategy.

## Security

Never commit:

- WHMCS configuration credentials;
- database passwords;
- API tokens;
- provider credentials;
- customer information;
- session data;
- private keys;
- production dumps;
- webhook secrets.

For administrative actions, use least privilege and explicit authorization.

## Compatibility

Before an upgrade, record:

- WHMCS version;
- PHP version;
- ionCube requirements;
- active modules;
- hooks;
- custom templates;
- custom overrides;
- database version;
- external integrations.

Then test the upgrade path in an isolated environment.

## Testing

This repository should showcase tests for:

- module configuration;
- provider response parsing;
- provisioning state transitions;
- webhook payload validation;
- hook execution;
- billing calculations;
- duplicate-event protection;
- API failure handling;
- authentication;
- Laravel/PHP integration where applicable.

Production WHMCS instances should never be public CI dependencies.

## Research Method

For public implementations:

**Find → Clone → Inspect → Understand → Document → Reimplement → Test → Improve**

Use the upstream project's license and attribution requirements. Reimplementation should be original work rather than copying proprietary code.

## Repository Structure

    whmcs-engineering/
    ├── README.md
    ├── docs/
    │   ├── architecture.md
    │   ├── modules.md
    │   ├── hooks-and-events.md
    │   ├── billing-and-invoices.md
    │   ├── provisioning.md
    │   ├── api-integrations.md
    │   ├── cron-and-queues.md
    │   ├── troubleshooting.md
    │   └── security.md
    ├── php/
    │   ├── ProviderClient.php
    │   └── ModuleService.php
    ├── python/
    │   └── whmcs_api_check.py
    ├── bash/
    │   └── whmcs-env-check.sh
    ├── examples/
    │   ├── webhook.json
    │   └── module-config.php
    └── tests/
        ├── README.md
        └── fixtures/

## Related Work

This repository connects naturally with:

- PHP/Laravel engineering
- VPS automation
- VPS provisioning
- cloud infrastructure
- payment infrastructure
- WhatsApp automation
- database/backend engineering

---

### MULTEXPK LABS

Technical education → AI/LLM research → engineering community → practical infrastructure.

**MULTEXPK LTD ®™ — Secure Cloud • VPS • Hosting • Automation**

Website: https://multexpk.com  
Cloud/VPS: https://webvpsserver.com  
Support: support@multexpk.com  
WhatsApp: +92 312 6565434
