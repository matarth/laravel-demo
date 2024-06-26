### Instalation

`cp .env.dist .env`

`docker compose build --build-arg UID=$(id -u) --build-arg GID=$(id -g)`

`docker compose up -d`

The `command` in docker-compose takes care of filling the database with needed data.
It also populates db with new data on each rerun. Something to look into.

### TODO
stop fixtures run on docker compose rerun.