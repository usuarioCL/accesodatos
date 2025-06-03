# Sistema de Gestión Veterinaria - Acceso a Datos

Este proyecto implementa un sistema CRUD (Create, Read, Update, Delete) para la gestión de mascotas y propietarios en una clínica veterinaria, utilizando PHP con PDO y MariaDB/MySQL.

## 📋 Requisitos Previos

- **XAMPP** (incluye Apache, PHP y MariaDB/MySQL)
- **PHP 7.4** o superior
- **Composer** (para gestión de dependencias)
- **MariaDB/MySQL**

## 🚀 Instalación y Configuración

### 1. Clonar o Descargar el Proyecto

```bash
# Si usas Git
git clone [url-del-repositorio]

# O descarga el proyecto en:
C:\xampp\htdocs\accesodatos\
```

### 2. Instalar Dependencias

Abre PowerShell en la carpeta del proyecto y ejecuta:

```powershell
cd C:\xampp\htdocs\accesodatos
composer install
```

### 3. Configurar la Base de Datos

#### 3.1 Iniciar XAMPP
- Abre el **Panel de Control de XAMPP**
- Inicia los servicios **Apache** y **MySQL**

#### 3.2 Crear la Base de Datos
1. Abre **phpMyAdmin** en tu navegador: `http://localhost/phpmyadmin`
2. Importa el archivo SQL:
   - Ve a la pestaña **"SQL"**
   - Copia y pega el contenido del archivo `app/database/DB.sql`
   - Ejecuta el script

**O ejecuta desde línea de comandos:**

```powershell
# Desde el directorio del proyecto
mysql -u root -p < app/database/DB.sql
```

#### 3.3 Verificar la Base de Datos
La base de datos `veterinaria` debe contener:
- Tabla `propietarios` con datos de ejemplo
- Tabla `mascotas` con datos de ejemplo

### 4. Configurar la Conexión a Base de Datos

Verifica la configuración en `app/config/Database.php`:

```php
// Asegúrate de que los datos de conexión sean correctos
private static $host = 'localhost';
private static $dbname = 'veterinaria';
private static $username = 'root';
private static $password = ''; // O tu contraseña de MySQL
```

## 🏗️ Estructura del Proyecto

```
accesodatos/
├── app/
│   ├── config/
│   │   └── Database.php          # Configuración de conexión a BD
│   ├── controllers/              # Controladores (futuro)
│   ├── database/
│   │   └── DB.sql               # Script de creación de BD
│   ├── entities/
│   │   └── Mascota.entidad.php  # Entidad Mascota
│   ├── models/
│   │   └── Mascota.php          # Modelo con operaciones CRUD
│   └── test/
│       ├── create.php           # Prueba de creación
│       ├── getall.php           # Prueba de consulta
│       └── update.php           # Prueba de actualización
├── vendor/                      # Dependencias de Composer
├── composer.json               # Configuración de Composer
└── README.md                   # Este archivo
```
## 📚 Conceptos Implementados

- **Patrón MVC**: Separación de entidades, modelos y pruebas
- **PDO**: Uso de PHP Data Objects para acceso seguro a BD
- **Prepared Statements**: Prevención de inyección SQL
- **CRUD Operations**: Create, Read, Update, Delete
- **Joins SQL**: Consultas relacionales entre tablas
- **Manejo de Errores**: Captura de excepciones PDO


