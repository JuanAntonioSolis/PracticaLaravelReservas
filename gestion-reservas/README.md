
🏢 GESTIÓN DE SALAS COWORKING
Aplicación web desarrollada en Laravel 12 para la gestión de reservas de salas en espacios de coworking.
Incluye autenticación de usuarios, visualización de salas, gestión de reservas y calendario de disponibilidad.

🚀 Instalación
### 1. Clonar el repositorio
   git clone https://github.com/JuanAntonioSolis/PracticaLaravelReservas.git
   cd gestion-reservas

### 2. Instalar dependencias

# Dependencias PHP
```
composer install
```

# Dependencias JavaScript
```
npm install && npm run build
```

### 3.Configurar variables de entorno

# Copiar archivo de ejemplo
```
cp .env.example .env
```

# Generar clave de aplicación
```
php artisan key:generate
```

### 4.Lanzar el contenedor de base de datos

```
podman start mariadb_coworking
```

### 5. Ejecutar migraciones

```
php artisan migrate
```

### 6. Ejecutar seeders
```
php artisan db:seed
```

### 7. Arrancar la aplicación
```
php artisan serve --host=0.0.0.0 --port=8000
```

### 8. Acceder desde el navegador

http://52.87.236.55:8000

## 👥 Usuarios de prueba
Después de ejecutar los seeders, se crean los siguientes usuarios de prueba:

### Administrador
- Email: admin@gmail.com
- Password: toor

### Usuario 1
 - Email: juan@gmail.com
 - Password: 123456789

### Usuario 2
- Email: martin@gmail.com
- Password: 123456789

## ⚙️ Funcionalidades principales
### 1. Autenticación
   Registro de nuevos usuarios con validación de campos.

Login con email y contraseña.

Logout para cerrar sesión.

Protección de rutas mediante middleware auth.

### 2. Visualización de Salas (usuarios autenticados)
   En el Dashboard:

Mostrar todas las salas disponibles en formato grid con imagen, capacidad, ubicación y equipamiento.

Ver detalle de una sala individual con descripción completa y calendario de disponibilidad (reservas próximas).

Filtros por capacidad, ubicación y equipamiento.

### 3. Gestión de Reservas (usuarios autenticados)
   En el Dashboard:

 - Crear nueva reserva:

Seleccionar sala, fecha y horario (hora_inicio, hora_fin).

Validación en tiempo real de disponibilidad: comprobar que no hay solapamiento de horarios antes de confirmar.

 - Mis Reservas:

Dashboard con listado de todas las reservas del usuario autenticado.

Ver reservas activas/próximas y pasadas.

Filtros por estado (pendiente, confirmada, cancelada) y por fecha.

 - Cancelar reserva:

El usuario puede cancelar sus propias reservas (cambia estado a "cancelada").

Solo se pueden cancelar reservas futuras.

### 4. Calendario de Disponibilidad
   Visualizar calendario de disponibilidad por sala.

Ver horarios ocupados y disponibles en una fecha específica.

Interfaz visual clara para seleccionar horarios al crear reservas.

### 📌 Notas
Proyecto preparado para despliegue en contenedores con Podman.

Compatible con MariaDB como motor de base de datos.

Estilos con Tailwind.





