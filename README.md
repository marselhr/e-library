
# Course Management Website

## Table of Contents

-   [Intro](#item1)
-   [Tech Stack](#item2)
-   [Quick Start](#item3)
-   [Screenshoot](#item4)

<a name="item1"></a>

## Intro

Greetings, I developed this project to fulfill the requirements of the Basic Competency Test in the selection process for the Magang Bersertifikat MSIB for the position of Web Developer at the Yayasan Hasnur Center. 

Because I am used to using the Laravel framework, I developed this project using Laravel. The required features have been successfully fulfilled and can be seen in the [Screenshoot](#item4) section 

<a name="item2"></a>

## Tech stack

The technologies I used in this website project are listed below:

-   Laravel 10
-   Bootstrap
-   Ckeditor
-   Datatable
-   MySQL
-   SweetAlert2

<a name="item3"></a>

## Quick Start

### Clone Repository

open your terminal, go to the directory that you will install this project, then run the following command:

```bash
git clone https://github.com/marselhr/course-app

cd course-app
```

### Install packages

Install vendor using composer

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

### Running Application

To serve the laravel app, you need to run the following command in the project director (This will serve your app, and give you an adress with port number 8000 or etc)

-   **Note: You need run the following command into new terminal tab**

```php
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000) from your browser.
To access the admin panel,
<a name="item4"></a>

## Screenshoot
-   [Create Course](#create-course)
-   [Read Course](#read-course)
-   [Edit Course](#edit-course)
-   [Delete Course](#delete-course)
-   [Create Course Material](#create-course-material)
-   [Read Course Material](#read-course-material)


<a name="create-course"></a>
#### 1.  Create a new course with a title, description, and duration.
![Create Course 1](https://drive.google.com/uc?export=view&id=1J0sozeh-thaMvOsKPjs8PThezlcUCf8G)
![Create Course 2](https://drive.google.com/uc?export=view&id=1qwXaeby2aMMTrHNfiLNkLfptS2z-i5uW)
![Create Course 3](https://drive.google.com/uc?export=view&id=1E6D111BesMTJ0n9iDLKTj5owpKVD-QbL)

<a name="read-course"></a>
### 2. Read the list of courses and details.
![Create Course 3](https://drive.google.com/uc?export=view&id=1E6D111BesMTJ0n9iDLKTj5owpKVD-QbL)
![Create Course 1](https://drive.google.com/uc?export=view&id=1SWA_rkTuFv1erkksarAxcefDUXoyL9Cf)


<a name="edit-course"></a>
### 3. Edit course information such as title, description, and duration.  
![Edit Course 1](https://drive.google.com/uc?export=view&id=1t-rGoyBLppHkOldQ3ZpCmVr1Zxsr5Vhh)
![Edit Course 2](https://drive.google.com/uc?export=view&id=1wBd-wXjyV6ueDCSwFd_OzKchbL-STqan)
![Edit Course 3](https://drive.google.com/uc?export=view&id=1wkoeLerKwVIrGpwf-oKbqBdHw9nkWjzO)


<a name="delete-course"></a>
### 4. Deleting irrelevant courses.
![Delete](https://drive.google.com/uc?export=view&id=1zBdsyySqtRYOniQOkpnni8CkH1L55Pm8)
![Delete](https://drive.google.com/uc?export=view&id=1eMuvrBskZq2lcBP8zJnRY78SZd17istX)
![Delete](https://drive.google.com/uc?export=view&id=1Y6HQEZAyz73EfCfNhKB3bpm4yvtUOz4y)

<a name="create-course-material"></a>
### 5. Adding material into the course with a title, description, and material embed link.
![Create Material](https://drive.google.com/uc?export=view&id=188fRtwFuI2c8hKhXWt8AjSZmqz6D8ky_)
![Create Material](https://drive.google.com/uc?export=view&id=10kGccR6q6bUGSPKHZhm87ngbAaO4Z7oW)
![Create Material](https://drive.google.com/uc?export=view&id=1G4y1jCE69x0yqoW0n7ZhkIMfYzkarwij)

<a name="read-course-material"></a>
### 6. View list of materials in a course.
![View Material](https://drive.google.com/uc?export=view&id=1G4y1jCE69x0yqoW0n7ZhkIMfYzkarwij)


### 7. Editing material information such as title, description, and embed material links.
![Edit Material](https://drive.google.com/uc?export=view&id=1mf6F7Xn2_uetH6SdAGGQ_-pmk9fKQs6x)
![Edit Material](https://drive.google.com/uc?export=view&id=12pI3718ptk40hHr8lwOR97BDAFKILrs1)
![Edit Material](https://drive.google.com/uc?export=view&id=1RuMkzzyN7UdQl8mUXPKFlIz7gEZbCE_U)

### 8. Remove irrelevant material in a course.
![Delete Material](https://drive.google.com/uc?export=view&id=1YKWBS51BRcCjrj8oKJy1N9lrHb-zOXK6)
![Delete Material](https://drive.google.com/uc?export=view&id=1N7Lrt5CyfxAgPyLeZ46H1aWE5fOa7Rlz)
![Delete Material](https://drive.google.com/uc?export=view&id=1RCkBPWqhji9cQXdhp7oauaFq2G-6SeAa)
![Delete Material](https://drive.google.com/uc?export=view&id=1KMFA1dG-yzFwW_eiyhy6ntAjyGo0jOQs)
