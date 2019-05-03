#!/bin/bash
set -e

###
# Build Script
# Use this script to build theme assets,
# and perform any other build-time tasks.
##

# Install PHP dependencies (WordPress, plugins, etc.)
composer install

# build the .env file if it doesn't exist
#WP_ENV=.env
#if [[ ! -f "$WP_ENV" ]]; then
#    cp .env.example ${WP_ENV} && \
#    echo "$(tail -n +3 ${WP_ENV})" > ${WP_ENV} && \
#    WP_ENV_APP_NAME="$(basename `git rev-parse --show-toplevel`)" && \
#    WP_ENV_APP_NAME="$(echo ${WP_ENV_APP_NAME} | sed -e 's/wp-//g')" && \
#    sed -i "" "1s/^/SERVER_NAME=${WP_ENV_APP_NAME}.docker /" "${WP_ENV}"
#fi

# Build theme assets here
cd web/app/themes/jcio
npm install
npm run production
rm -rf node_modules
cd ../../../..

# Remove composer auth.json
rm -f auth.json
