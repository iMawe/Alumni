# Sistema Alumni de la Universidad La Salle

## Descripción del Proyecto

Este repositorio contiene el código fuente y la documentación del Sistema Alumni de la Universidad La Salle. El sistema está diseñado para fortalecer la relación entre la universidad y sus exalumnos, permitiéndoles interactuar, acceder a oportunidades y participar activamente en la comunidad Alumni.

## Requisitos Previos

Asegúrate de tener instalados los siguientes requisitos previos antes de comenzar la instalación:

- [PHP](https://www.php.net/) (versión X.X.X)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) u otra base de datos compatible
- [Node.js](https://nodejs.org/) (opcional, para desarrollo frontend)

## Instalación

Sigue estos pasos para instalar y configurar el sistema en tu entorno local:

1. **Clona el repositorio desde GitHub:**

   ```bash
   git clone https://github.com/tuusuario/sistema-alumni.git
   ```
   
2. **Navega al directorio del proyecto:**

   ```bash
   cd sistema-alumni
   ```
3. **Instala las dependencias de PHP utilizando Composer:**

   ```bash
   composer install
   ```
4. **Crea un archivo .env a partir del archivo .env.example y configura tus variables de entorno, incluyendo la configuración de la base de datos:**
   ```bash
   cp .env.example .env
   ```
5. **Genera una clave de aplicación única:**
   ```bash
   php artisan key:generate
   ```
6. **Ejecuta las migraciones de la base de datos para crear las tablas necesarias:**
   ```bash
   php artisan migrate
   ```
7. **Opcionalmente, si deseas desarrollar la parte frontend, instala las dependencias de Node.js y compila los activos:**
   ```bash
   npm install
   npm run dev
   ```
8. **Inicia el servidor de desarrollo:**
   ```bash
   php artisan serve
   ```
9. **Accede a la aplicación en tu navegador: http://localhost:8000**

## Contribuciones

Si deseas contribuir al desarrollo de este proyecto, por favor sigue estas pautas:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tu función o corrección de errores (`git checkout -b feature/nueva-funcion`).
3. Realiza tus cambios y asegúrate de mantener el código limpio.
4. Haz un commit de tus cambios (`git commit -m "Añade nueva funcionalidad"`).
5. Sube tus cambios a tu fork en GitHub (`git push origin feature/nueva-funcion`).
6. Crea una solicitud de extracción (pull request) a la rama principal del repositorio original.


## Contacto

Para cualquier pregunta o comentario, por favor contacta a Walther Medina a través de [wmau.medina23@gmail.com].
