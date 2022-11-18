#!/usr/bin/env bash

while getopts r:t: option
do
 case "${option}"
 in
 r) TAG=${OPTARG};;
 t) TEMPLATE=${OPTARG};;
 esac
done

docker run --interactive --tty --volume $PWD:/app --volume ~/.composer:/tmp \
  composer install --no-interaction --no-dev --optimize-autoloader

docker run -it --rm --name xibo-manual-build \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp php:7.4-cli \
    php generate.php $TEMPLATE

docker build -t $TAG .
