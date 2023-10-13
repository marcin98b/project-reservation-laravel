## Project Reservation App
1. The application has been developed to enable students to select an ongoing project topic either from a list of available options or by proposing their own topic.

2. Students have the capability to upload their projects in the form of an electronic archive using the application.

3. The application offers teachers the opportunity to assess the projects submitted by students through an evaluation panel.

4. The evaluations made by teachers are recorded in the system and are made visible to the respective students.

5. Teachers are able to add and edit the list of available project topics using the application.

App Stack: <br/>
- Back-end: Laravel 9  <br/>
- Front-end: Blade, Tailwind, Vite  <br/>
- DB: MySQL

## Installation
Prerequisites: PHP, Node.js, Composer, Docker

1. Clone repo
```
git clone https://github.com/marcin98b/project-reservation-laravel.git system-ocen
cd system-ocen
```
2. Install Laravel app using Composer
```
composer install
```
3. Create .env file and fill variables (DB connection etc.) using editor
```
cp .env.example .env
nano .env
```
4. Generate application key
```
php artisan key:generate
```
5. Install frontend packages using npm
```
rm -r node_modules/
npm install --legacy-peer-deps
```
6. Run app using Laravel Sail (Docker)
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail up
```
7. Setup storage link for file uploads [system-ocen container]
```
php artisan storage:link
sudo chmod o+w ./storage/ -R
```
8. Run migrations, DB seeds, create production build using npm and run.
```
php artisan migrate:fresh
php artisan db:seed
npm run build
php artisan serve
```
## Containers
- Laravel app - laravel.system-ocen :80
- DB - mysql-1 :3306, phpmyadmin-1:8080	(GUI)
- Mail testing - mailhog-1 :8025

## Account seeds for testing
```
160738@stud.prz.edu.pl p:qwerty [USER]
admin@stud.prz.edu.pl p:qwerty [ADMIN]
```
## Screenshots
![image](https://github.com/marcin98b/project-reservation-laravel/assets/65306120/59b07ba5-a5ad-4b6a-86b0-11fb2f5eb9be)
![image](https://github.com/marcin98b/project-reservation-laravel/assets/65306120/f0713ce1-30ae-4563-8ec5-554fa86d1d33)



