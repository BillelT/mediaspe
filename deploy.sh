#!/bin/bash

set -e

echo "🚀 Début du déploiement..."

# Couleurs
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

log_info() { echo -e "${GREEN}✓${NC} $1"; }
log_warning() { echo -e "${YELLOW}⚠${NC} $1"; }
log_error() { echo -e "${RED}✗${NC} $1"; }

# Vérifie root
if [ "$EUID" -ne 0 ]; then
    log_error "Ce script doit être exécuté en root (sudo)"
    exit 1
fi

PROJECT_DIR="/var/www/mediaspe"
BRANCH="main"

cd $PROJECT_DIR || exit

log_info "Mode maintenance activé"
php artisan down || log_warning "L'application est déjà en maintenance"

log_info "Pull des dernières modifications"
git fetch origin $BRANCH
git reset --hard origin/$BRANCH

log_info "Installation des dépendances Composer"
# Exécuter composer en tant qu'utilisateur non-root
sudo -u root COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --optimize-autoloader

log_info "Installation des dépendances NPM"
sudo -u root npm install
sudo -u root npm run build

log_info "Effacement des caches"
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

log_info "Dump autoload"
php artisan optimize:clear
composer dump-autoload

log_info "Exécution des migrations"
php artisan migrate --force

log_info "Déploiement terminé, application de nouveau en ligne"
php artisan up
