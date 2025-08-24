#!/bin/bash

sudo docker compose -f compose.dev.yaml down

sudo docker system prune -a --force

sudo docker volume prune -a --force