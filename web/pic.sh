#!/bin/bash

cd tmp

ls | grep -v $2 | xargs rm

raspistill -w 320 -h 240 -t 500 -o $1 &

