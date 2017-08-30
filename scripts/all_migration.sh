#/bin/bash
PHINX="docker-compose run --rm db-migrate"

dbs=$(ls ./db/migrations)
for _db in ${dbs};
do
  sed -e "s/%%PHINX_DBNAME%%/${_db}/g" phinx.default.yml > phinx.tmp.yml
  ${PHINX} migrate -c phinx.tmp.yml -v
  rm phinx.tmp.yml
done
