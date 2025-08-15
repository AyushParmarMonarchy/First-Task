# 🎯 First Task - Laravel Authentication & Student Management App

A fully functional **Laravel web application** featuring **User Authentication** and **Student CRUD operations** with a seamless **AJAX interface**.  
This project is built with **security, performance, and user experience** in mind.

---

## 🚀 Core Features

### 🧍 User Registration
- **Fields:** First Name, Last Name, Mobile, Email ID, Gender, Date of Birth, Password, Confirm Password.
- **Full Validation** – Both frontend & backend.
- **Unique User Check** – Prevents duplicate accounts.
- **Password Hashing** – Ensures secure password storage.

### 🔑 Login
- **Login via Email or Mobile** – Flexible and user-friendly.
- **Full Validation** – Prevents invalid login attempts.
- **Forgot Password** – Password reset via email.
- **Session Security** – Protects against session hijacking.

### 🎓 Student Management (CRUD)
- **Add / Edit / Delete / View** Students.
- **AJAX-Driven UI** – All actions are instant, no page reloads.
- **Validation in Laravel Controller** – Backend security enforcement.
- **Image Upload** – Store student photos in Laravel's public storage.
- **Multiple Activities Selection** – Save comma-separated activities in DB.

### 🛡 Special Security Features
- **Auto Logout After 5 Minutes** of login.
- **Inactivity Logout** – Session ends after 5 minutes of user inactivity.
- **CSRF Protection** – All forms and AJAX requests use Laravel CSRF tokens.
- **Session Timeout Alerts** – Warns user before auto logout.

---

## 📂 Tech Stack

| Technology | Purpose |
|------------|---------|
| **Laravel 10+** | Backend framework |
| **Blade Templates** | Frontend rendering |
| **Bootstrap 5** | UI styling |
| **jQuery + AJAX** | Dynamic, no-refresh interactions |
| **MySQL** | Database |
| **Laravel Filesystem** | Image storage |

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/AyushParmarMonarchy/First-Task.git
cd First-Task

# Install dependencies
composer install
npm install && npm run dev

# Configure environment
cp .env.example .env
php artisan key:generate

# Update .env with your database credentials

# Run migrations
php artisan migrate

# Start local server
php artisan serve
