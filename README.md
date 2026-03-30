# 💼 Gestor de Facturas Laravel

**Sistema web integral para la gestión de facturas, clientes, productos y reportes con arquitectura moderna en Laravel 12 + Livewire + Tailwind CSS.**

---

## 📋 Tabla de Contenidos

- [Descripción General](#descripción-general)
- [Stack Tecnológico](#stack-tecnológico)
- [Características Principales](#características-principales)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación y Configuración](#instalación-y-configuración)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Módulos Implementados](#módulos-implementados)
- [Arquitectura](#arquitectura)
- [Guías de Despliegue](#guías-de-despliegue)
- [Pruebas y Calidad](#pruebas-y-calidad)
- [Estadísticas del Proyecto](#estadísticas-del-proyecto)

---

## 📖 Descripción General

**Gestor de Facturas** es una plataforma web profesional diseñada para facilitar la gestión completa de operaciones comerciales. Permite a empresas gestionar clientes, productos, facturas, pagos y generar reportes ejecutivos.

### Objetivos Clave
✅ **Gestión integral de facturas** - CRUD completo con PDF  
✅ **Administración de clientes** - Perfiles, contactos y historial  
✅ **Catálogo de productos** - Inventario y precios  
✅ **Control de pagos** - Registro de transacciones  
✅ **Reportes y analytics** - Dashboards ejecutivos  
✅ **Experiencia moderna** - Interfaz reactiva con Livewire  
✅ **Exportación de datos** - Excel y PDF  
✅ **Control de permisos** - Roles y permisos granulares  

---

## 🛠️ Stack Tecnológico

### Backend
- **Laravel 12** - Framework PHP moderno
- **Livewire 2** - Componentes reactivos sin JavaScript
- **Volt** - Componentes de clase única
- **Flux** - Librería de componentes UI
- **Spatie Permissions** - Control de roles y permisos
- **Laravel DomPDF** - Generación de PDF

### Frontend
- **Blade Templates** - Templates engine de Laravel
- **Tailwind CSS 4** - Utility-first CSS
- **Livewire Components** - Reactividad en tiempo real
- **Alpine.js** - Interactividad ligera (incluido en Livewire)

### Datos & Exportación
- **MySQL/MariaDB** - Base de datos relacional
- **Maatwebsite Excel** - Exportación/importación de Excel
- **DomPDF** - Generación de reportes PDF

### Testing & Calidad
- **Pest PHP** - Testing framework moderno
- **Laravel Pint** - Formateador de código
- **PHPUnit** - Testing framework (compatible)

### DevOps & Infraestructura
- **Docker** - Containerización (Dockerfile incluido)
- **Nginx** - Servidor web (nginx.conf incluido)
- **Vite** - Build tool para assets
- **Composer** - Gestor de dependencias PHP
- **Laravel Sail** - Entorno local con Docker

---

## ✨ Características Principales

### 1. **Gestión de Facturas**
Sistema completo de facturación:
- ✅ Crear, editar y eliminar facturas
- ✅ Agregar líneas de facturas (productos/servicios)
- ✅ Cálculo automático de totales y impuestos
- ✅ Estados: Borrador, Enviada, Pagada, Cancelada
- ✅ Numeración automática y secuencial
- ✅ Búsqueda y filtrado avanzado
- ✅ Paginación eficiente

### 2. **Generación de PDF**
Reportes profesionales:
- 📄 PDF con logo y datos de empresa
- 📄 Detalles completos de factura
- 📄 Código de barras (opcional)
- 📄 Términos y condiciones
- 📄 Descarga directa desde la app

### 3. **Administración de Clientes**
Gestión de información comercial:
- 👥 CRUD completo de clientes
- 👥 Contacto principal y secundarios
- 👥 Dirección y teléfono
- 👥 RFC/NIT (identificación fiscal)
- 👥 Historial de facturas
- 👥 Límite de crédito (opcional)

### 4. **Catálogo de Productos**
Inventario centralizado:
- 📦 Registro de productos/servicios
- 📦 Categorías y subcategorías
- 📦 Precios unitarios
- 📦 Stock disponible (opcional)
- 📦 Códigos SKU
- 📦 Descripción detallada

### 5. **Control de Pagos**
Registro y seguimiento:
- 💳 Registro de pagos por factura
- 💳 Métodos: Efectivo, Tarjeta, Transferencia, Cheque
- 💳 Fechas y referencias
- 💳 Notas sobre el pago
- 💳 Cálculo automático de saldos

### 6. **Exportación de Datos**
Generación de reportes:
- 📊 Exportar a Excel (XLS/XLSX)
- 📊 Exportar a PDF
- 📊 Reportes por período
- 📊 Reportes por cliente
- 📊 Análisis de ventas

### 7. **Sistema de Permisos**
Control granular de acceso:
- 🔐 Roles predefinidos (Admin, Vendedor, Contador)
- 🔐 Permisos específicos por acción
- 🔐 Auditoría de acciones
- 🔐 Uso de Spatie Permissions

### 8. **Dashboard Ejecutivo**
Visualización de métricas:
- 📈 Total de facturas pendientes
- 📈 Ingresos del período
- 📈 Clientes activos
- 📈 Productos más vendidos
- 📈 Gráficos y tendencias

### 9. **Componentes Livewire**
Interfaz reactiva:
- ⚡ Búsqueda en tiempo real (sin refrescar página)
- ⚡ Validación instantánea
- ⚡ Cargas AJAX dinámicas
- ⚡ Notificaciones en tiempo real

### 10. **Responsive Design**
Accesible desde cualquier dispositivo:
- 📱 Mobile-first approach
- 📱 Navegación adaptable
- 📱 Tablas responsivas

---

## 💾 Requisitos del Sistema

### Desarrollo Local
- **PHP**: 8.2+
- **Composer**: 2.0+
- **Node.js**: 18+ (para Vite)
- **MySQL**: 8.0+ (o SQLite)
- **Git**: Control de versiones
- **Docker** (opcional): Para desarrollo aislado

### Producción
- **Servidor**: Ubuntu 20.04 LTS+
- **PHP**: 8.2+
- **Nginx**: 1.18+
- **MySQL**: 8.0+
- **SSL**: Let's Encrypt

---

## 🚀 Instalación y Configuración

### 1. Clonar Repositorio
```bash
git clone https://github.com/IngSistemasAndersonBaes/Gestor_Facturas_Laravel.git
cd Gestor_Facturas_Laravel
```

### 2. Instalación Manual

#### Dependencias PHP
```bash
composer install
```

#### Configuración de Entorno
```bash
cp .env.example .env
php artisan key:generate
```

#### Base de Datos
```bash
# Editar .env con credenciales MySQL
php artisan migrate

# Sembrar datos de prueba (opcional)
php artisan db:seed
```

#### Dependencias Frontend
```bash
npm install
npm run build
```

### 3. Con Docker (Recomendado)
```bash
# Usar Laravel Sail
./vendor/bin/sail up -d

# Ejecutar migraciones
./vendor/bin/sail artisan migrate

# Compilar assets
./vendor/bin/sail npm run build
```

### 4. Iniciar Desarrollo
```bash
# Opción 1: Manual
php artisan serve
npm run dev

# Opción 2: Con Composer script
composer dev

# Opción 3: Con Docker
./vendor/bin/sail up
```

Acceder a: `http://localhost:8000`

---

## 📁 Estructura del Proyecto

```
Gestor_Facturas_Laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/         # Controladores
│   │   ├── Middleware/          # Middleware (auth, etc)
│   │   └── Requests/            # Form Requests validados
│   ├── Livewire/               # Componentes Livewire
│   ├── Models/                 # Eloquent Models
│   ├── Traits/                 # Traits reutilizables
│   └── Providers/              # Service Providers
├── database/
│   ├── migrations/             # Esquemas de BD
│   ├── seeders/                # Datos iniciales
│   └── factories/              # Model factories
├── resources/
│   ├── views/
│   │   ├── layouts/            # Layouts base
│   │   ├── livewire/           # Componentes Livewire
│   │   ├── pages/              # Páginas
│   │   └── components/         # Componentes Blade
│   └── css/                    # Tailwind CSS
├── routes/
│   ├── web.php                 # Rutas web
│   └── api.php                 # Rutas API (opcional)
├── tests/
│   ├── Feature/                # Tests de integración
│   └── Unit/                   # Tests unitarios
├── public/                     # Assets compilados
├── storage/                    # Logs, cache, uploads
├── config/                     # Configuraciones
├── bootstrap/                  # Bootstrap app
├── Dockerfile                  # Configuración Docker
├── nginx.conf                  # Configuración Nginx
├── composer.json               # Dependencias PHP
├── package.json                # Dependencias Node
├── vite.config.js              # Config Vite
├── phpunit.xml                 # Config PHPUnit
├── .env.example                # Template variables
└── README.md                   # Este archivo
```

---

## 🎯 Módulos Implementados

### ✅ Módulo Facturas
**Estado**: Producción  
**Componentes Livewire**: `InvoiceForm`, `InvoiceList`, `InvoiceShow`

Funcionalidades:
- CRUD completo de facturas
- Generación de PDF
- Búsqueda y filtrado
- Exportación a Excel
- Estados automáticos

### ✅ Módulo Clientes
**Estado**: Producción  
**Componentes Livewire**: `ClientForm`, `ClientList`

Funcionalidades:
- Administración de clientes
- Historial de facturas
- Contactos múltiples
- Límite de crédito

### ✅ Módulo Productos
**Estado**: Producción  
**Componentes Livewire**: `ProductForm`, `ProductList`

Funcionalidades:
- Catálogo de productos
- Categorías
- Precios y stock
- SKU único

### ✅ Módulo Pagos
**Estado**: Producción  
**Componentes Livewire**: `PaymentForm`, `PaymentList`

Funcionalidades:
- Registro de pagos
- Métodos de pago
- Saldo pendiente

### ✅ Reportes y Exportación
**Estado**: Producción

Funcionalidades:
- Exportar a Excel
- Generar PDF
- Reportes por período
- Análisis de ventas

### ✅ Autenticación y Permisos
**Estado**: Producción

Funcionalidades:
- Login seguro
- Roles y permisos
- Auditoría de acciones

---

## 🏗️ Arquitectura

### Patrón MVC
```
┌─────────────────────────────────────────┐
│         Blade Templates                 │
│     (Vistas + Livewire Components)      │
├─────────────────────────────────────────┤
│       Livewire Components               │
│    (Lógica reactiva del frontend)       │
├─────────────────────────────────────────┤
│  Controllers → Services → Models        │
│  (Lógica de negocio y validación)       │
├─────────────────────────────────────────┤
│     Eloquent ORM + Repositories         │
├─────────────────────────────────────────┤
│        MySQL Database                   │
└─────────────────────────────────────────┘
```

### Modelos Clave
```
Cliente
  ├─ Facturas (1:N)
  ├─ Pagos (1:N)
  └─ Contactos (1:N)

Factura
  ├─ Líneas de Factura (1:N)
  ├─ Cliente (N:1)
  ├─ Pagos (1:N)
  └─ Auditoría (1:N)

Producto
  ├─ Líneas de Factura (1:N)
  ├─ Categoría (N:1)
  └─ Historial de Precios (1:N)

Usuario
  ├─ Roles (N:N)
  ├─ Permisos (N:N)
  └─ Auditoría (1:N)
```

### Flujo de una Factura

```
1. Crear Factura
   └─ Seleccionar Cliente
      └─ Agregar Productos
         └─ Calcular Totales
            └─ Guardar en BD

2. Ver Factura
   └─ Mostrar detalles
      └─ Generar PDF
         └─ Enviar a cliente

3. Registrar Pago
   └─ Marcar como pagada
      └─ Actualizar balance

4. Exportar
   └─ Excel/PDF
      └─ Descargar
```

---

## 📚 Componentes Livewire

### Componentes Principales

#### InvoiceForm
```php
// Crear/editar factura
- Validación en tiempo real
- Autocomplete de clientes
- Líneas dinámicas
```

#### InvoiceList
```php
// Listado de facturas
- Búsqueda reactiva
- Filtrado por estado
- Eliminación en línea
```

#### ClientForm
```php
// Crear/editar cliente
- Validación completa
- Multiples contactos
```

---

## 🔐 Seguridad

### Autenticación
- Login con email y contraseña
- Contraseñas hasheadas con bcrypt
- Sesiones seguras

### Autorización
- Middleware `auth` en rutas protegidas
- Policies para autorización de modelos
- Spatie Permissions para roles/permisos

### Validación
- Server-side validation en Controllers
- Client-side validation con Livewire
- Form Requests validadas

### Protección CSRF
- Tokens CSRF en todos los formularios
- Middleware automático

---

## 🚢 Guías de Despliegue

### Despliegue en VPS Nginx + PHP-FPM

#### 1. Preparar servidor
```bash
# Actualizar paquetes
sudo apt update && sudo apt upgrade -y

# Instalar dependencias
sudo apt install -y php8.2-fpm php8.2-mysql composer nginx git curl wget
```

#### 2. Clonar proyecto
```bash
cd /var/www
sudo git clone https://github.com/IngSistemasAndersonBaes/Gestor_Facturas_Laravel.git
cd Gestor_Facturas_Laravel
```

#### 3. Configurar Laravel
```bash
# Permisos
sudo chown -R www-data:www-data .
sudo chmod -R 775 storage bootstrap/cache

# Copiar .env
sudo cp .env.example .env
sudo php artisan key:generate

# Base de datos
sudo php artisan migrate --force
```

#### 4. Compilar assets
```bash
npm install
npm run build
```

#### 5. Configurar Nginx
```bash
sudo cp nginx.conf /etc/nginx/sites-available/gestor-facturas
sudo ln -s /etc/nginx/sites-available/gestor-facturas /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

#### 6. SSL con Let's Encrypt
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d tudominio.com
```

### Despliegue con Docker

```bash
# Build
docker build -t gestor-facturas .

# Run
docker run -d \
  -e DB_HOST=mysql \
  -e DB_DATABASE=facturas \
  -e DB_USERNAME=root \
  -e DB_PASSWORD=password \
  -p 80:8000 \
  gestor-facturas
```

---

## ✔️ Pruebas y Calidad

### Ejecutar Tests
```bash
# Todos los tests
composer test

# Tests específicos
php artisan test tests/Feature/InvoiceTest.php

# Con coverage
php artisan test --coverage
```

### Linting y Formato
```bash
# Pint (formateador)
./vendor/bin/pint

# Verificar formato
./vendor/bin/pint --test
```

---

## 📊 Estadísticas del Proyecto

```
Lenguajes:
├── PHP:   52.3%  (Backend)
├── Blade: 46.2%  (Frontend templates)
└── Otros:  1.5%  (Config, CSS)

Módulos Activos:
├── ✅ Gestión de Facturas
├── ✅ Administración de Clientes
├── ✅ Catálogo de Productos
├── ✅ Control de Pagos
├── ✅ Reportes y Exportación
└── ✅ Sistema de Permisos

Dependencias Clave:
├── Laravel 12
├── Livewire 2
├── Flux UI
├── Spatie Permissions
├── DomPDF
└── Maatwebsite Excel

Stack Total:
├── Backend: Laravel + Livewire
├── Frontend: Blade + Tailwind + Alpine
└── DevOps: Docker + Nginx
```

---

## 🔄 Flujo de Desarrollo

### Branches
- `main` - Producción
- `develop` - Desarrollo
- `feature/*` - Nuevas features
- `bugfix/*` - Correcciones

### Commit Convention
```
feat: nueva feature
fix: corrección de bug
docs: documentación
style: cambios de estilo
refactor: refactorización
test: pruebas
```

### Pull Request
1. Crear rama desde `develop`
2. Implementar cambios
3. Pasar tests: `composer test`
4. Pasar linting: `./vendor/bin/pint`
5. Crear PR con descripción
6. Code review
7. Merge a `develop`
8. Deploy a producción

---

## 📖 Documentación Adicional

| Recurso | Descripción |
|---------|------------|
| Livewire Docs | https://livewire.laravel.com |
| Laravel Docs | https://laravel.com/docs |
| Tailwind Docs | https://tailwindcss.com/docs |
| Flux Components | https://flux.laravel.com |
| Spatie Permissions | https://spatie.be/docs/laravel-permission |

---

## 🤝 Contribución

Para contribuir:

1. Fork el proyecto
2. Crear rama: `git checkout -b feature/nueva-feature`
3. Commit: `git commit -am 'Add new feature'`
4. Push: `git push origin feature/nueva-feature`
5. Pull Request

---

## 📋 Información del Proyecto

| Aspecto | Detalle |
|--------|--------|
| **Repositorio** | `IngSistemasAndersonBaes/Gestor_Facturas_Laravel` |
| **Licencia** | MIT |
| **Stack** | Laravel 12 + Livewire 2 + Tailwind CSS 4 |
| **PHP** | 8.2+ |
| **Versión** | 1.0.0 |
| **Estado** | ✅ Activo |
| **Última actualización** | 2026-03-30 |

---

## 🎓 Aprendizajes Técnicos

Este proyecto implementa:

### Backend
- ✅ Patrón MVC limpio
- ✅ Eloquent ORM avanzado
- ✅ Relaciones complejas
- ✅ Service Layer
- ✅ Form Requests

### Frontend
- ✅ Livewire componentes reactivos
- ✅ Tailwind CSS utility-first
- ✅ Alpine.js interactividad
- ✅ Validación en tiempo real
- ✅ AJAX sin escribir JavaScript

### DevOps
- ✅ Docker containerización
- ✅ Nginx configuración
- ✅ Pipeline de deployment
- ✅ SSL/TLS

### Testing
- ✅ Pest tests
- ✅ Feature tests
- ✅ Unit tests
- ✅ DB seeding

---

## 💡 Casos de Uso

Ideal para:
- 🏢 Empresas pequeñas y medianas
- 🏪 E-commerce y tiendas
- 🏦 Servicios financieros
- 📊 Consultoría
- 🏭 Manufactura
- 🚚 Distribuidoras

---

## 📞 Soporte

Para issues o preguntas:
1. Revisar documentación
2. Buscar en issues existentes
3. Crear nuevo issue con detalles
4. Especificar versión de PHP/Laravel

---

**Gestor de Facturas** es una solución profesional lista para producción que demuestra expertise en:
- ✅ Stack moderno Laravel + Livewire
- ✅ Desarrollo de componentes reactivos
- ✅ Gestión de datos complejos
- ✅ Exportación de reportes
- ✅ Control de permisos
- ✅ DevOps y deployment
