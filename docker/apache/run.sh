#!/bin/sh
set -xe

# Start Apache with the right permissions
pwd 
#ls -la /app
#ls -la /app/docker
#ls -la /app/docker/apache
#cat /app/docker/apache/start_safe_perms
/app/docker/apache/start_safe_perms -DFOREGROUND