#!/bin/bash

# Coloca o aplicativo em modo de manutenção e renderiza a view especificada

php artisan down --render="manutencao"

# Execute outras ações, se necessário

# Coloca o aplicativo de volta em funcionamento
php artisan up
