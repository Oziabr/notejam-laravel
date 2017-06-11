#!/bin/sh
docker exec -it $(docker ps | grep reflexions/docker-laravel | awk '{print $1}') bash