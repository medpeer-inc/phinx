PHINX=docker-compose run --rm db-migrate

default: build

# Phinx イメージ作成, DB(MySQL)コンテナ起動
build:
	docker-compose down
	docker-compose up --build -d

# ex) make migrate_create DB=hogehoge CLASS=CreateTableUsers
migrate_create:
	mkdir -p ./db/migrations/${DB}
	sed -e 's/%%PHINX_DBNAME%%/${DB}/g' phinx.default.yml > phinx.tmp.yml
	${PHINX} create ${CLASS} -c phinx.tmp.yml -v
	rm phinx.tmp.yml

migrate:
	bash scripts/all_migration.sh

rollback:
	bash scripts/all_rollback.sh

# ex) make seed_create DB=hogehoge CLASS=HogehogeUsersSeeder
seed_create:
	mkdir -p ./db/seeds/${DB}
	sed -e 's/%%PHINX_DBNAME%%/${DB}/g' phinx.default.yml > phinx.tmp.yml
	${PHINX} seed:create ${CLASS} -c phinx.tmp.yml -v
	rm phinx.tmp.yml

seed:
	bash scripts/all_seeder.sh
