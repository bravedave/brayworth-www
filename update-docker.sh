#!/usr/bin/env bash

set -euo pipefail

BASE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$BASE_DIR"

echo "=== [Brayworth Container Update] ==="
echo ">>> Make sure you have recent backups of app, workspace/root, Caddyfile.d, and .env before proceeding! <<<"
echo ">>> FrankenPHP, Composer, and Cloudflare Tunnel use unpinned images; check upgrade compatibility before proceeding. <<<"
echo

docker compose -f "$BASE_DIR/docker-compose.yaml" config --quiet

echo "[1/5] Pulling the latest Cloudflare Tunnel image..."
docker compose -f "$BASE_DIR/docker-compose.yaml" pull cloudflared

echo "[2/5] Rebuilding FrankenPHP with updated base images..."
docker compose -f "$BASE_DIR/docker-compose.yaml" build --pull --no-cache frankenphp

echo "[3/5] Recreating containers with updated images..."
docker compose -f "$BASE_DIR/docker-compose.yaml" up -d --no-build frankenphp cloudflared

echo "[4/5] Checking container status..."
docker compose -f "$BASE_DIR/docker-compose.yaml" ps

echo "[5/5] Reporting the installed PHP version..."
docker compose -f "$BASE_DIR/docker-compose.yaml" exec -T frankenphp php -v

echo "=== Update complete! ==="
echo "Check https://brayworth.com and the Cloudflare Tunnel to confirm everything is working."