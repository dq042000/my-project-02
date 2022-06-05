#!/bin/sh
rm -f ./data/temp/*
vendor/bin/mysql-workbench-schema-export db/my-project-01-db.mwb
# vendor/bin/mysql-workbench-schema-export --config=db/bcts-db-mwb.json db/my-project-01-db.mwb
