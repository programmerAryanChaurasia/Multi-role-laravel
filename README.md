# Sembark URL Shortener

A professional URL shortener SaaS platform for travel businesses with multi-role access control.

## Features
- 3 User Roles: SuperAdmin, Admin, Member
- Company Management & Team Collaboration
- URL Shortening with Analytics
- Invitation System for Team Members
- Beautiful Sembark-branded UI

## Installation

1. **Clone the repository**



## 🚀 How to Run This Project

```bash
# Copy and run these commands one by one:
git clone https://github.com/programmerAryanChaurasia/Multi-role-laravel.git
cd Multi-role-laravel
composer install
npm install
cp .env.example .env
php artisan key:generate
# Edit .env file with your database details

# Install laravel-breeze and setup all steps, then

php artisan migrate --seed
php artisan serve


### Add SMTP setup in .env file 

##Default Login:(Super admin)

Email: superadmin@example.com

Password: password