#!/usr/bin/env bash
# Build a clean, installable plogins-marks zip for wp.org, honouring .distignore.
# Boots via the PSR-4 fallback in autoload.php, so /vendor is not shipped.
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
OUT_DIR="${1:-/tmp/plogins-marks-build}"
STAGE="${OUT_DIR}/plogins-marks"

rm -rf "${OUT_DIR}"
mkdir -p "${STAGE}"

rsync -a --exclude-from="${ROOT_DIR}/.distignore" \
    --exclude '.git' --exclude 'node_modules' --exclude 'vendor' \
    --exclude '.DS_Store' \
    "${ROOT_DIR}/" "${STAGE}/"

find "${STAGE}" -name '.DS_Store' -delete

rm -f /tmp/plogins-marks.zip
( cd "${OUT_DIR}" && zip -rqX /tmp/plogins-marks.zip plogins-marks -x '*.DS_Store' )
echo "✓ Built /tmp/plogins-marks.zip from ${STAGE}"
