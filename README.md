# 🏢 PT Elnusa Puspita Pratama Company Profile
> **Interactive Enterprise Web Platform, Project Portfolio Catalog, and Administration Dashboard.**

[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-red.svg?style=flat-square&logo=laravel)](https://laravel.com/)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-blue.svg?style=flat-square&logo=php)](https://www.php.net/)
[![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-v3-blueviolet.svg?style=flat-square&logo=tailwind-css)](https://tailwindcss.com/)
[![Vite](https://img.shields.io/badge/Vite-Ready-blue.svg?style=flat-square&logo=vite)](https://vitejs.dev/)

---

## 🌟 Overview
This platform serves as the official enterprise website for **PT Elnusa Puspita Pratama**. It presents corporate values, showcases industrial and commercial projects, lists key personnel, compiles client reviews, and captures direct inquiries through a structured lead intake form.

The system is equipped with a robust secure **Admin Panel** to manage all front-facing elements dynamically.

---

## ⚡ Key Features

### 📂 Interactive Project Portfolio
- Visual catalog showcasing completed, ongoing, and future industrial projects.
- In-depth detail screens for individual project profiles featuring descriptions, locations, status logs, and image galleries.

### 👥 Corporate Directories & Reviews
- Employee roster lists detailing profiles and operational departments.
- Customer testimonial section highlighting feedback from partners and corporate clients.

### 📬 Lead Intake & Inquiries
- Interactive contact form allowing prospective clients to submit business proposals or general inquiries.
- Direct database persistence of entries into the `Inquiries` model, sending alerts to administrators.

### 🔐 Full Administration Dashboard
- Password-secured administrative panel for content management.
- Dynamic creation, updating, and deletion (CRUD) of:
  - Project logs and metadata
  - Client review listings
  - Team member profiles
  - Incoming client inquiry tracking

---

## 🛠️ Tech Stack & Architecture

- **Backend Framework:** Laravel (MVC Pattern)
- **Database Engine:** MySQL with Eloquent ORM
- **Asset Bundler:** Tailwind CSS & Vite
- **UI Architecture:** Responsive Blade Templates

---

## 📂 Codebase Structure

```
company-profile-laravel/
├── ElnusaPuspitaPratama/            # Core Laravel Application Subfolder
│   ├── app/                         # App models, controllers, and providers
│   │   ├── Models/                  # Project, Employee, Review, Inquiry, User models
│   │   └── Http/Controllers/        # Admin, Client, Project controllers
│   ├── config/                      # System configuration profiles
│   ├── database/                    # SQL migrations and database seeds
│   ├── resources/                   # Frontend assets and Blade views
│   ├── routes/                      # Web and API routing declarations
│   └── vite.config.js               # Bundler settings
└── README.md                        # Documentation overview
```

---

## 🚀 Setup & Installation

1. Navigate to the core application folder:
   ```bash
   cd Documents/company-profile-laravel/ElnusaPuspitaPratama
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Copy environment configuration and generate database key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Set up database credentials inside `.env` and migrate:
   ```bash
   php artisan migrate --seed
   ```
5. Run the development server and asset compiler:
   ```bash
   php artisan serve
   
   # Compile frontend assets
   npm run dev
   ```

---

*Corporate Web Portal for PT Elnusa Puspita Pratama.*
