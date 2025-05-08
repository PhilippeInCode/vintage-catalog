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

---

## 🚀 Next Steps <a name="-next-steps"></a>

---

## 🔍 Preview <a name="-preview"></a>

---

## 🔖 License <a name="-license"></a>

This project is licensed under the MIT License © Vintage-Catalog.
