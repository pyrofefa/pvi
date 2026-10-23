#!/bin/bash
# Se ejecuta solo la primera vez que se crea el volumen db_data.
# Importa el backup bd/pvi.sql (exportado con phpMyAdmin) en la base `pvi`.
set -e

mysql -uroot -e "CREATE DATABASE IF NOT EXISTS pvi CHARACTER SET utf8 COLLATE utf8_spanish_ci;"
mysql -uroot pvi < /seed/pvi.sql
