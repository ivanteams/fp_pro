# fp_pro

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
git remote add origin https://github.com/ivanteams/soltel_fppro.git
git status
git add .
git commit -m "[+] Repo proyecto inicial"
git push -u origin main
```