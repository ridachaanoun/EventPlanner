<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> </a> </p> <p align="center">  <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"> </a>  <img 


<p align="center"> 
<a href="https://github.com/laravel/framework/actions"> <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img 
  <a href="https://www.php.net/"> 
    <img src="https://img.shields.io/badge/php-v8.0.30-blue" alt="PHP Version"> 
  </a> 
  <a href="https://github.com/abdo0302/eventplanner"> 
    <img src="https://img.shields.io/github/license/abdo0302/eventplanner" alt="License"> 
  </a> 
</p>

<h1 align="center">🎉 EventPlanner - Event Management</h1>
<h3 align="center">A web-based event management application built with Laravel and PHP.</h3>

---

### 🚀 About The Project:
EventPlanner simplifies the process of organizing and participating in events. It offers a user-friendly interface for both administrators and participants.

### 🌟 Features
1. **🗓️ Event Management**  
   - Create, edit, and delete events seamlessly.
2. **👥 User Interaction**  
   - Register for events and leave comments.  
3. **📬 Automated Reminders**  
   - Receive notifications before events start.  
4. **🔒 User Management**  
   - Admins can manage users and events.  

---

### 🛠 Technologies Used
<p align="center"> 
  <img src="https://skillicons.dev/icons?i=php,laravel,mysql,apache,git" alt="Technologies" /> 
</p>

---

### 🚀 Installation Guide

#### Step 1: Clone the Repository
    ```bash
    git clone https://github.com/abdo0302/eventplanner.git
    cd EventPlanner

2. Install PHP and Node.js dependencies:

    ```bash
    composer install
    npm install
3. Build the frontend assets:
    ```bash
    npm run dev
    
#### Step 2: Set Up Environment Variables
1. Copy the .env.example file to .env:
    ```bash
    cp .env.example .env
2. Configure the database and other environment settings in the .env file.
.Update the database settings to match your local or remote database configuration:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

3. Generate the application key:
     ```bash
    php artisan key:generate
     
#### Step 3: Migrate the Database
1. Run migrations to set up your database tables:
   ```bash
   php artisan migrate
2. Seed the database :
   ```bash
   php artisan db:seed
      
#### Step 4: Serve the Application
1. Start the Laravel development server:    
    ```bash
    php artisan serve
- By default, the application will be available at http://localhost:8000.
Getting Started
