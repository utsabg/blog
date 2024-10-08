# myblog

## GitHub Repository URL
[\[GitHub repository URL\]](https://github.com/utsabg/blog)

## Project Approach 
This project is a basic CRUD application for managing blog posts using Laravel 11. This application allows users to create, read, update, and delete blog posts. 
The development process is according to the provided guidelines, ensuring a structured and functional application.
I have referenced the Lecture material at mylearn and laravel documentation at https://laravel.com/docs/11.x and bootstrap 5 snippets at https://getbootstrap.com/docs/5.0/ 

### Setup and Initialization of Project
First i achieved the following requirement for development environment. My setup steps included the following

- Installed and set up Visual Studio Code (VS Code), Node.js, Git, Composer, mySql for this , and Laragon (Windows) for development.
- Created a new GitHub repository for the Laravel project and initialized it with version control.
- Created a new Laravel project using the laragon quick project feature

#### This project can be downloaded and runed by the following steps:
- Step 1: download the Laravel project (Blog)
- Step 2: Install Composer Dependencies.
- Step 3: Set Up the Environment and env file with blog as dbname.
- Step 4: migrate db and seed faker data into the database
- Step 6: Serve the Laravel Project.

### My development approach
Pushed the initial setup generated by laravel by default and npm to the GitHub repository.
I removed the unnessary views and routes. 
I created the Post model and created a migration for the posts table.
Then i defined the simple and short schema for the posts table in the migration file and ran the migration.
Following lecture I generated post routes and photo resources route (not used in this crud but left for further development later on in other assignments if required). 
Then Created the master layout app.blade.php, 
Created views for listing (in index.blade.php), creating(create.blade.php), showing(show.blade.php), editing(edit.blade.php), and deleting(link only not view as it is not required) posts, for the crud process. 
then used faker and seeder to input dummy data into database and testing.
Finally used bootstrap 5 using cdn and stylize for responsive design added features like pagination, normal validation.
Perodically pushed to git for version control.

### Challenges Faced
Database Configuration Initially faced issues with database connection due to laravel 11 having sql lite default db fixed by updating .env file configuration and pagination issue as laravel 11 use tailwind css as default so updated in Appservice provider to use bootstrap 5 .

### Unique feature
Card and Responsive Design,
Pagination for limited visualization of posts




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).






