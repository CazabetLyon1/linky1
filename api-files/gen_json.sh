#!/bin/sh
export LINKY_USERNAME=$1
export LINKY_PASSWORD=$2
export LINKY_TYPE=$3
export BASE_DIR='./'

python3 ./linky_json.py -o "./" >> ./linky.log 2>&1
