# fp_pro

## Crear proyecto
```console
# cd /var/www/html
# Hay que tener instalados composer y Symfony CLI
symfony new fp_pro --version="6.4.*" --webapp
cd fp_pro

# Instalar las dependencias
composer require --dev symfony/maker-bundle
composer require twig
composer require symfony/form

composer require symfony/orm-pack
composer require annotations

# Si nos da un error:
# code config/services.yaml
# Añadir lo siguiente en la sección services:
# annotation_reader:
#        class: Doctrine\Common\Annotations\AnnotationReader
php bin/console cache:clear
composer update sensio/framework-extra-bundle
composer require symfony/orm-pack
composer require annotations

# Iniciar el servidor de symfony 
symfony server:start
```

## Pasos para la subida al repo

1. Crear el repositorio en Github SIN README y SIN .gitignore
   - Por ejemplo el repo está aqui: https://github.com/ivanteams/fp_pro
   - NOTA: vosotros lo tendreis en https://github.com/usuario/fp_pro
  
2. Al crear el proyecto Symfony se generan ambos archivos y el directorio .git. Por consola:
```console
# cd /var/www/html
cd fp_pro
sudo rm -r .git
git init 
git branch -m main
git remote add origin https://github.com/ivanteams/fp_pro.git
git status
git add .
git commit -m "[+] Repo proyecto inicial"
git push -u origin main
```

## Instalar Proyecto desde el repositorio
```console
# cd /var/www/html
git clone https://github.com/ivanteams/fp_pro.git
composer install
```

## Pasos para la BBDD

1. Modificar el archivo .env
2. Crear las entidades
```console
cd fp_pro
# Filtrar comandos con MAKE
# php bin/console make
```
3. Crear las entidades, empezando SIEMPRE por las fuertes (tablas principales)
   NOTA: aunque las tablas se pongan en minísculas (docentes), la entidad debe empezar por mayúsculas (Docentes)
4. Antes de migrar HAY QUE RETOCAR las entidades!
5. Hacemos migración (la comprobamos) y ejecutamos
```console
cd fp_pro
# Hacer el DROP DATBASE en el cliente MySql
php bin/console doctrine:database:create
php bin/console make:migration
# COMPROBAR MIGRACIÓN
php bin/console doctrine:migrations:migrate

# Como no me fio, abrir el Workbench y hacer un reverse engineer
# Veo si las tablas están bien creadas
```

6. 