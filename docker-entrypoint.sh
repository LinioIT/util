#!/bin/sh
set -eu

if [ -f /tmp/corporate-root-ca.crt ]; then
    cat /etc/ssl/certs/ca-certificates.crt /tmp/corporate-root-ca.crt > /tmp/ca-bundle.crt
    export COMPOSER_CAFILE=/tmp/ca-bundle.crt
fi

exec "$@"
