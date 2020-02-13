<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/jesusestebn12321/Rebel/blob/develop/public/template/assets/img/brand/blue.png" with='50'></a></p>

<p align="center">
<a href="#">Version 2.1.6</a>
</p>

# Descripción
<p align="center">
  "Rebel" sistema de gestionamiento, administración y controlador de versiones de und. Curriculares, de la Universidad Nacional Experimental Romulo Gallegos.
</p>

## Paquetes
<ul>
  <li>barryvdh/laravel-dompdf.</li>
  <li>google/recaptcha.</li>
  <li>laravel/telescope.</li>
  <li>laraveles/spanish.</li>
  <li>rap2hpoutre/laravel-log-viewer.</li>
  <li>simplesoftwareio/simple-qrcode.</li>
</ul>

## Instalación

  ### Documentación

- [Configuración](https://)

```bash
$ composer update
```
## Configurar .env

```bash
$ php artisan env
```
- [Configuración](https://)
- Colocar el puerto, el nombre de la db en el .env.
- Colocar un gmail para el envio de correos.
- Colocar las apiKeys de reCapcha google.
  ### Ejemlos
  
  ```
    DB_CONNECTION=Gestor
    DB_HOST=127.0.0.1
    DB_PORT=puerto
    DB_DATABASE=nombre_db
    DB_USERNAME=user
    DB_PASSWORD=secert

    MAIL_USERNAME=email_para_app@gmail.com
    MAIL_PASSWORD=secret

    CAPTCHA_SITE_KEY=secret
    CAPTCHA_SECRET_KEY=secret

  ```
## Migrar DB

```bash
$ php artisan migrate --seed
```
- Para montar la aplicación.

```bash
$ php artisan serve
```

