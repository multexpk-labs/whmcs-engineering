# WHMCS Architecture

WHMCS can be viewed as the control plane for customer, billing, service, and provisioning state.

    Client
      |
    Client Area
      |
    WHMCS
      |
    +--------+---------+---------+
    |        |         |         |
  Billing Products  Hooks     Modules
                         |
                      Provider APIs

Keep provider-specific logic behind adapters so the rest of the platform remains easier to test and maintain.

## State

Document important state transitions explicitly:

    requested -> pending -> provisioning -> active
       |             |
       +-> failed    +-> retry

The actual states depend on the module and workflow.
