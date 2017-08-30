#/bin/bash
PHINX="docker-compose run --rm db-migrate"

dbs=$(ls ./db/seeds)
for _db in ${dbs};
do
  sed -e "s/%%PHINX_DBNAME%%/${_db}/g" phinx.default.yml > phinx.tmp.yml
  ${PHINX} seed:run -c phinx.tmp.yml -v
  rm phinx.tmp.yml
done
