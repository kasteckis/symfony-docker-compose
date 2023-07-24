prepare:
	docker compose up -d --build

ssh:
	docker exec -it project_web bash

xdebug:
	docker compose -f docker-compose.yml -f docker-compose.xdebug.yml up -d --build
