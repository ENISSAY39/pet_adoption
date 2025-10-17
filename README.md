# 🐾 Pet Adoption System – Laravel 12

This project is a **Pet Adoption Management System** built with **Laravel 12.x**, **PHP 8.4**, and **TailwindCSS**.  
It allows the user to manage animals available for adoption through a complete CRUD system (Create, Read, Update, Delete).  
This project was developed as a **Midterm Project** for the Web Framework course at ITS Surabaya.

## Lecturer : Sir Agus Budi Raharjo

## Author : **Gharbi Yassine**

## 🚀 Features (updated)

-   🐶 Create, edit, view, and delete pets
-   🐱 Link each pet to a species (Dog, Cat or Bird)
-   🔍 Show page with detailed information for each pet
-   ✅ Server-side form validation
-   📨 Success messages after each CRUD action
-   🎨 Responsive layout styled with TailwindCSS
-   🔎 Search & Filters on the pets listing:
    -   Species
    -   Age (Min and Max numeric inputs on the same line)
    -   Adopted (Yes / No / All)
    -   Pagination preserves filter query parameters
-   🧩 Clean MVC structure using Laravel’s Eloquent ORM
-   💾 Database with 2 related models: `Pet` and `Species`

---

## 🧠 Project Overview

### Purpose

The goal of this project is to implement the **Laravel MVC architecture** through a real-world example:  
a small web application to manage animals for adoption.

The project demonstrates:

-   Routing
-   Controller logic (PetController@index now supports species, min_age, max_age and adopted filters)
-   Model relationships
-   Form validation
-   Dynamic Blade templates with TailwindCSS

---

## 🧱 Database Schema

### **Table: species**

| Column     | Type      | Description                   |
| ---------- | --------- | ----------------------------- |
| id         | int       | Primary key                   |
| name       | string    | Species name (e.g., Dog, Cat) |
| created_at | timestamp | Creation date                 |
| updated_at | timestamp | Update date                   |

### **Table: pets**

| Column     | Type        | Description           |
| ---------- | ----------- | --------------------- |
| id         | int         | Primary key           |
| name       | string      | Pet name              |
| breed      | string      | Breed name            |
| age        | integer     | Pet age               |
| adopted    | boolean     | Adoption status       |
| species_id | foreign key | Links to `species.id` |
| created_at | timestamp   | Creation date         |
| updated_at | timestamp   | Update date           |

# 🌱 Database Seeding (Updated with Bird Species)

The database includes three species:

-   🐶 Dog
-   🐱 Cat
-   🐦 Bird

and **20 pets** with mixed species, breeds, ages, and adoption statuses.

## 🔎 How to use the filters

1. Open the pets list page (e.g. GET /pets).
2. Use the filter form at the top:
    - Select a species (or leave empty for all).
    - Enter numeric values for "Min" and "Max" age (both on the same line).
    - Choose Adopted: Oui / Non / Tous.
    - Click "Filtrer". Click "Réinitialiser" to clear filters.
3. Pagination links keep the current filter query parameters.

> Note: a previous double-thumb slider experiment was replaced by two simple numeric inputs for Min and Max age to simplify UX and avoid overlapping handle issues.

## 🧩 Run all seeders

````bash
php artisan migrate:fresh --seed


---

## ⚙️ Installation & Setup

1. Clone this repository:

```bash
git clone https://github.com/yourusername/pet-adoption.git
cd pet-adoption

composer install
````

## 🧩 Install dependencies

```bash
composer install
npm install && npm run dev
```

---

## 🧰 Configure the environment

```bash
cp .env.example .env
php artisan key:generate
```

---

## 🧱 Run the migrations

```bash
php artisan migrate
```

---

### 🐶 Add default species data

```bash
php artisan tinker
>>> App\Models\Species::create(['name' => 'Your_species']);
```

---

### 🚀 Launch the development server

```bash
composer run dev
```
