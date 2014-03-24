DB_HOST?="localhost"
DB_NAME?="pdo_polymorph"
DB_USER?="root"
MYSQL="$(shell which mysql)"
PHP="$(shell which php)"

create_database:
	$(MYSQL) -u $(DB_USER) -p -h $(DB_HOST) -e "CREATE DATABASE IF NOT EXISTS $(DB_NAME)"

drop_database:
	$(MYSQL) -u $(DB_USER) -p -h $(DB_HOST) -e "DROP DATABASE IF EXISTS $(DB_NAME)"

create_tables:
	$(MYSQL) -u $(DB_USER) -p -h $(DB_HOST) $(DB_NAME) < src/Resources/schema.sql

example: create_database create_tables
	$(PHP) example.php

.PHONY: create_database drop_database create_tables example
