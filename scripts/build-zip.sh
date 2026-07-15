#!/usr/bin/env bash
# Build a clean, installable plogins-sale-stock-badges zip for wp.org, honouring .distignore.
# Boots via the PSR-4 fallback in autoload.php, so /vendor is not shipped.
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
OUT_DIR="${1:-/tmp/plogins-sale-stock-badges-build}"
STAGE="${OUT_DIR}/plogins-sale-stock-badges"

rm -rf "${OUT_DIR}"
mkdir -p "${STAGE}"

rsync -a --exclude-from="${ROOT_DIR}/.distignore" \
    --exclude '.git' --exclude 'node_modules' --exclude 'vendor' \
    --exclude '.DS_Store' \
    "${ROOT_DIR}/" "${STAGE}/"

find "${STAGE}" -name '.DS_Store' -delete

rm -f /tmp/plogins-sale-stock-badges.zip
( cd "${OUT_DIR}" && zip -rqX /tmp/plogins-sale-stock-badges.zip plogins-sale-stock-badges -x '*.DS_Store' )
echo "✓ Built /tmp/plogins-sale-stock-badges.zip from ${STAGE}"
