<p align="center"><a href="https://github.com/almamun2s" target="_blank"><img src="https://raw.githubusercontent.com/almamun2s/NewsLaravel/refs/heads/master/public/frontend/assets/images/logo.png" width="400" alt="Laravel Logo"></a></p>

## About This website

This is portfolio website of me (Abdullah Almamun). I have made the website by using the most powerful PHP Framework - Laravel:



## Before you install you will need
- PHP (at least v8.3.8)
- Composer (v2.7.7)
- Node (v12.22.9) Optional
- Web Server (Apache)

## How you can install the website to your localhost
1. Clone the repository to your desired location
```bash
git clone https://github.com/almamun2s/NewsLaravel.git
```
2. Change your directory to the project
```bash
cd NewsLaravel/
```
3. Install Laravel and it's all packages
```
composer install
```
4. Copy the `.env.example` file to `.env` file
```bash
cp .env.example .env
```
5. Generate an Application key
```bash
php artisan key:generate
```
6. Configure the `.env` file by opening it to a text editor 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
7. Now make a Database that will match with `your_database_name`
8. Create all the necessery `table` for website
```bash
php artisan migrate
```
9. Insert all necessery data to the database
```bash
php artisan db:seed
```
10. Start a server for visiting the website.
```bash
php artisan serve
```
11. Now you can see the default host is `http://127.0.0.1:8000` you can copy it and paste it to your browser and you can see the output.
12. If you want to manage the admin dashboard you can visit `http://127.0.0.1:8000/login` . Login by email: `superadmin@example.com` password: `password` as $Super Admin$. 

