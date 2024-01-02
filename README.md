
# Digital Perpustakaan berbasis Website

## Table of Contents

-   [Intro](#item1)
-   [Tech Stack](#item2)
-   [Quick Start](#item3)
-   [Screenshoot](#item4)

<a name="item1"></a>

## Intro

Hello, I developed this project as one of the tasks in the Batch 6 Certified Internship selection series at the Detikom partnership. I applied for the position of Backend Developer of CTARSA Foundation, so I was given the task of creating a CMS website with a common CRUD feature. I had to create authentication features and master data management of Books and Book Categories. To save time, I decided to use the Laravel framework for this project. The required features have been successfully fulfilled and can be seen in the [Screenshoot](#item4) section 

<a name="item2"></a>

## Tech stack

The technologies I used in this website project are listed below:

-   Laravel 10
-   Bootstrap
-   Laravel Socialite
-   Datatable
-   MySQL
-   SweetAlert2

<a name="item3"></a>

## Quick Start

### Clone Repository

open your terminal, go to the directory that you will install this project, then run the following command:

```bash
https://github.com/marselhr/e-library.git

cd e-library
```

### Install packages

❗make sure you already have composer on your computer then install vendor using composer

```bash
composer update
```

Install node module using npm

```bash
npm install
```

### Configure .env

Copy .env.example file

```bash
cp .env.example .env
```

Then run the following command :

```php
php artisan key:generate
```

### Migrate Data

create an empty database with mysql 8.x version, then setup that fresh db at your .env file, then run the following command to generate all tables and seeding dummy data:

```php
php artisan migrate:fresh --seed
```

### Set Up Google Credential
Complete the Environment Variable below in the .env file with your google cloud credentials
```
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
```

### Set Up Facebook Credential
Complete the values for the following variables with your facebook credentials for the authentication feature with facebook to work properly
```
FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
```
### Set Up Mailtrap Sandbox
Fill in the value of each variable with the configuration you got from mailtrap.io
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
```
### Running Application

To serve the laravel app, you need to run the following command in the project director (This will serve your app, and give you an adress with port number 8000 or etc)

-   **Note: You need run the following command into new terminal tab**

```php
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000) from your browser to access the app. This application has 2 demo users, email: `user.admin@gmail.com` with password: ``password`` as admin and email: ``user@gmail.com`` with password: `password` as guest user. 


