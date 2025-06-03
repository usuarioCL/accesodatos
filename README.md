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

## 🧪 Pruebas del Sistema

### 1. Probar la Conexión a Base de Datos

```powershell
cd C:\xampp\htdocs\accesodatos\app\test
php -f getall.php
```

**Resultado esperado:** Lista de mascotas con sus propietarios

### 2. Crear una Nueva Mascota

```powershell
php -f create.php
```

**Resultado esperado:** Mensaje de confirmación con el ID de la nueva mascota

### 3. Actualizar una Mascota

```powershell
php -f update.php
```

**Resultado esperado:** Mensaje indicando cuántas filas fueron actualizadas

## 📝 Uso de las Clases

### Entidad Mascota

```php
require_once 'app/entities/Mascota.entidad.php';

$mascota = new MascotaEntidad();
$mascota->__SET('nombre', 'Firulais');
$mascota->__SET('tipo', 'perro');
$mascota->__SET('color', 'marrón');
$mascota->__SET('genero', 'macho');
$mascota->__SET('idpropietario', 1);
```

### Modelo Mascota (Operaciones CRUD)

```php
require_once 'app/models/Mascota.php';

$modelo = new Mascota();

// Crear
$id = $modelo->create($mascotaEntidad);

// Leer todas
$mascotas = $modelo->getAll();

// Leer por ID
$mascota = $modelo->getById($id);

// Actualizar
$params = [
    'idmascota' => 1,
    'nombre' => 'Nuevo Nombre',
    'tipo' => 'gato',
    'color' => 'blanco',
    'genero' => 'hembra',
    'idpropietario' => 2
];
$filasAfectadas = $modelo->update($params);

// Eliminar
$filasEliminadas = $modelo->delete($id);
```

## 🗄️ Esquema de Base de Datos

### Tabla: propietarios
| Campo         | Tipo        | Descripción              |
|---------------|-------------|--------------------------|
| idpropietario | INT (PK)    | ID único del propietario |
| apellidos     | VARCHAR(40) | Apellidos del propietario|
| nombres       | VARCHAR(40) | Nombres del propietario  |

### Tabla: mascotas
| Campo         | Tipo                    | Descripción              |
|---------------|-------------------------|--------------------------|
| idmascota     | INT (PK)               | ID único de la mascota   |
| idpropietario | INT (FK)               | ID del propietario       |
| tipo          | ENUM('perro', 'gato')  | Tipo de mascota          |
| nombre        | VARCHAR(40)            | Nombre de la mascota     |
| color         | VARCHAR(40)            | Color de la mascota      |
| genero        | ENUM('macho', 'hembra')| Género de la mascota     |
| vive          | ENUM('si', 'no')       | Estado de vida           |

## 🔧 Solución de Problemas Comunes

### Error: "Table doesn't exist"
- Verifica que la base de datos `veterinaria` existe
- Asegúrate de haber ejecutado el script `DB.sql`
- Confirma que las tablas se llaman `mascotas` y `propietarios` (plural)

### Error: "Access denied"
- Verifica las credenciales en `app/config/Database.php`
- Asegúrate de que MySQL esté ejecutándose en XAMPP

### Error: "Class not found"
- Verifica que las rutas en los `require_once` sean correctas
- Ejecuta `composer install` si no se han instalado las dependencias

### No se muestran resultados
- Verifica que hay datos en las tablas
- Agrega `print_r()` o `var_dump()` para depurar
- Revisa los logs de errores de PHP

## 📚 Conceptos Implementados

- **Patrón MVC**: Separación de entidades, modelos y pruebas
- **PDO**: Uso de PHP Data Objects para acceso seguro a BD
- **Prepared Statements**: Prevención de inyección SQL
- **CRUD Operations**: Create, Read, Update, Delete
- **Joins SQL**: Consultas relacionales entre tablas
- **Manejo de Errores**: Captura de excepciones PDO

## 🤝 Contribuciones

Para contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agrega nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto es de uso educativo y está disponible bajo la licencia MIT.

---

**Desarrollado para el curso de Acceso a Datos**  
*Fecha: Junio 2025*