up:
	docker compose up -d --remove-orphans --no-recreate
down:
	docker compose down --remove-orphans
sh:
	docker compose exec -it app sh
tinker:
	docker compose exec -it app php artisan tinker
test:
	docker compose exec -it app php artisan test
