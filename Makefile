.PHONY: app-create app-run app-stop app-down app-logs app-exec

USER_ID := $(shell id -u)
GROUP_ID := $(shell id -g)
LOCAL_IP ?= host.docker.internal
export USER_ID GROUP_ID LOCAL_IP

app-create:
	@test -f .env || cp .env.example .env
	docker compose up -d --build

app-run:
	docker compose up -d

app-stop:
	docker compose stop

app-down:
	docker compose down

app-logs:
	docker compose logs -f

app-exec:
	docker compose exec php bash
