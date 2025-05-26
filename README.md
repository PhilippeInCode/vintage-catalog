# **Vintage Catalog** 🧥

**Vintage Catalog** is a Laravel-powered web application providing a reference catalog of men’s vintage clothing (circa 1900s–2000s), where users can explore a public catalog, visit our Values, About Us and Contact pages, register to “like” items or build a private collection, and even submit petitions to add new vintage garments to the public catalog—which administrators can then accept or reject.

---

## 📌 **Table of Contents**
1. [⚙️ Installation and Requirements](#installation-and-requirements)
2. [🎨 App Design](#-app-design)
3. [💻 Technologies Used](#-technologies-used) 
4. [🧪 Test Screenshots](#-test-screenshots)
5. [🚀 Next Steps](#-next-steps)
6. [🔍 Preview](#-preview)
7. [🔖 License](#-license)

---

## ⚙️ Installation and Requirements <a name="installation-and-requirements"></a>

### **Prerequisites**  
>[!IMPORTANT]  
> Before you start, ensure you have the following installed:  
> - **PHP 8** (Download from [php.net](https://www.php.net/downloads))  
> - **Composer** (Download from [getcomposer.org](https://getcomposer.org/))  
> - **MySQL** (via XAMPP or equivalent)  
> - **Node.js & npm** (for compiling assets with Laravel Mix)  
> - **Git**  

### **Installation Steps**

1. **Clone the repository**

   Use Git to clone the repository to your local machine:
   ```bash
   git clone https://github.com/your-username/vintage-catalog.git
   cd vintage-catalog
2. **Install PHP dependencies**

    Install all Laravel backend packages via Composer:
   ```bash
   composer install
3. **Environment configuration**

    Copy the example environment file and generate an application key:
    ```bash
    cp .env.example .env
    php artisan key:generate
4. **Then edit .env and set your database credentials**
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=vintage_catalog
    DB_USERNAME=your_db_user
    DB_PASSWORD=your_db_password
5. **Start XAMPP & create the database**

   In phpMyAdmin run:
   ```bash
   CREATE DATABASE vintage_catalog;
6. **Run migrations**

   This will create all tables (users, garments, photos, likes, pending submissions, etc.):
    ```bash
    php artisan migrate:fresh
7. **Install Node.js dependencies**

    If you need to compile CSS/JS assets, install frontend packages:
    ```bash
    npm install
8. **Compile assets**

    Build your CSS and JS for development:
    ```bash
    npm run dev
9. **Serve the application**

    Start the Laravel development server:
    ```bash
    php artisan serve

---

## 🎨 App Design <a name="-app-design"></a>

---

## 💻 Technologies Used <a name="-technologies-used"></a>

- **Language & Framework**: PHP 8, Laravel 10  
- **Authentication**: Laravel Sanctum  
- **Database**: MySQL (via XAMPP)  
- **Frontend**: Blade, HTML5, CSS3, JavaScript (ES6+)  
- **Build Tools**: Composer, npm, Laravel Mix  
- **Version Control**: Git, GitHub  
- **IDE Support**: Intelephense for VSCode

---

## 🧪 Test Screenshots <a name="-test-screenshots"></a>

To execute all available feature and unit tests (including coverage if needed), run the following command:

```bash
php artisan test
```

If you want to generate a coverage report (requires Xdebug), use:

```bash
php artisan test --coverage
```

You can also generate a full HTML coverage report (output to the coverage/ folder):

```bash
php artisan test --coverage-html=coverage
```

#### 🎨 Frontend

| Test Name         | Screenshot |
|------------------|------------|
| **Welcome Test**  | ![Welcome Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277929/WelcomeTest_erui2v.png) |
| **Catalog Test**  | ![Catalog Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277930/CatalogTest_rhnz71.png) |
| **Values Test** | ![Values Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277928/ValuesTest_nd4sy7.png) |
| **Terms Test** | ![Terms Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277932/TermsTest_ojvqdp.png) |
| **About Test**    | ![About Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277929/AboutTest_s0f1uw.png) |
| **Admin Dashboard Test** | ![Admin Dashboard Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277929/AdminDashboardTest_dnas3h.png) |
| **User Dashboard Test** | ![User Dashboard Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277928/UserDashboardTest_dvv4kl.png) |
| **Admin Garment Create Garment Test** | ![Admin Garment Create Garment Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277930/CreateGarmentTest_wwkub2.png) |
| **Admin Garment Edit Garment Test** | ![Admin Garment Edit Garment Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748277931/EditGarmentTest_u9zpfd.png) |

#### 🛠️ Backend

| Test Name         | Screenshot |
|------------------|------------|
| **Admin CRUD Test**  | ![Admin CRUD Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748278348/CRUDGarmentTest_hurpbq.png) |
| **App Layout Component Test**  | ![App Layout Component Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748278479/AppLayoutComponentTest_qpvuqt.png) |
| **Guest Layout Component Test**  | ![Guest Layout Component Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748278481/GuestLayoutComponentTest_rhbtqi.png) |

##### 📦 Models

| Test Name | Screenshot |
|-----------|------------|
| **User Model Test** | ![User Model Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748279885/UserModelTest_h1o1t2.png) |
| **Garment Model Test** | ![Garment Model Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748279884/GarmentModelTest_zxglfk.png) |
| **Like Model Test** | ![Like Model Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748279837/LikeModelTest_wdqi2s.png) |
| **Pending Garment Test** | ![Pending Garment Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748279886/PendingGarmentModelTest_afq5gh.png) |
| **Photo Model Test** | ![Photo Model Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748279882/PhotoModelTest_j7folr.png) |

##### ⚙️ Controllers & Middleware

| Test Name | Screenshot |
|-----------|------------|
| **Garment Controller Test**  | ![Garment Controller Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748278413/GarmentControllerTest_qpnlbq.png) |
| **Is Admin Middleware Test**  | ![Is Admin Middleware Test](https://res.cloudinary.com/dk1g12n2h/image/upload/v1748278480/IsAdminMiddlewareTest_bvvumu.png) |

---

## 🚀 Next Steps <a name="-next-steps"></a>

---

## 🔍 Preview <a name="-preview"></a>

---

## 🔖 License <a name="-license"></a>

This project is licensed under the MIT License © Vintage-Catalog.
