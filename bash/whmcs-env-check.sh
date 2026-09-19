#!/usr/bin/env bash
set -u

echo "=== WHMCS Environment Check ==="
echo "Host: $(hostname)"
echo "Kernel: $(uname -sr)"

if command -v php >/dev/null 2>&1; then
  echo "PHP: $(php -v | head -n 1)"
else
  echo "PHP: not found"
fi

echo
echo "CLI PHP:"
command -v php || true

echo
echo "Disk:"
df -h / 2>/dev/null || true

echo
echo "Listening services:"
ss -lnt 2>/dev/null | head -n 20 || true
