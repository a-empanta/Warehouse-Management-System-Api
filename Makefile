laravel:
	docker-compose -f compose-creation.yml up -d --build php
	docker-compose -f compose-creation.yml exec php laravel new $(name) --no-interaction
	sudo chmod -R 777 $(name)
	$(MAKE) remove-laravel-docker-artifacts

remove-laravel-docker-artifacts:
	docker stop php_container && docker rm php_container || true
	docker image rm php_image:latest php:8.4-cli || true

react:
	docker-compose -f compose-creation.yml up -d --build nodejs
	docker-compose -f compose-creation.yml exec nodejs npm create vite@latest $(name) -- --template react
	sudo chmod -R 777 $(name)
	$(MAKE) remove-react-docker-artifacts

remove-react-docker-artifacts:
	docker stop nodejs_container && docker rm nodejs_container || true
	docker image rm nodejs_image:latest node:24-alpine3.21 || true
