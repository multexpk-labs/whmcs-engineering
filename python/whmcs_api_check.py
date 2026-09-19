#!/usr/bin/env python3
"""Safe example for checking a WHMCS API endpoint.

The URL is supplied through the environment so credentials and production
endpoints are not committed to the repository.
"""

import os
import sys
import urllib.error
import urllib.request

url = os.environ.get("WHMCS_API_URL")

if not url:
    print("Set WHMCS_API_URL before running this example.", file=sys.stderr)
    raise SystemExit(2)

request = urllib.request.Request(
    url,
    headers={"User-Agent": "multexpk-labs-whmcs-check/1.0"},
)

try:
    with urllib.request.urlopen(request, timeout=10) as response:
        print(f"HTTP status: {response.status}")
        print(f"Content-Type: {response.headers.get('Content-Type', 'unknown')}")
except urllib.error.URLError as exc:
    print(f"API endpoint check failed: {exc}", file=sys.stderr)
    raise SystemExit(1)
