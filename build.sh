#!/usr/bin/env bash

while getopts r:t: option
do
 case "${option}"
 in
 r) TAG=${OPTARG};;
 t) TEMPLATE=${OPTARG};;
 esac
done

docker run -it --rm --name xibo-manual-build \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp php:7.0-cli \
    php generate.php $TEMPLATE

docker build -t $TAG .