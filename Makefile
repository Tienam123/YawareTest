run:
	docker-compose up -d
down:
	 docker-compose down
build:
	 docker-compose up --build -d
test:
	docker exec app vendor/bin/phpunit --verbose --colors=always
run-serve:
	docker exec -it test-app bash
