# 🐾 Pet Adoption System – Laravel 12

This project is a **Pet Adoption Management System** built with **Laravel 12.x**, **PHP 8.4**, and **TailwindCSS**.  
It allows the user to manage animals available for adoption through a complete CRUD system (Create, Read, Update, Delete).  
This project was developed as a **Midterm Project** for the Web Framework course at ITS Surabaya.

---

## 🚀 Features

-   🐶 Create, edit, view, and delete pets
-   🐱 Link each pet to a species (Dog ,Cat or Bird)
-   🔍 “Show” page with detailed information for each pet
-   ✅ Server-side form validation
-   📨 Success messages after each CRUD action
-   🎨 Responsive layout styled with TailwindCSS
-   🧩 Clean MVC structure using Laravel’s Eloquent ORM
-   💾 Database with 2 related models: `Pet` and `Species`

---

## 🧠 Project Overview

### Purpose

The goal of this project is to implement the **Laravel MVC architecture** through a real-world example:  
a small web application to manage animals for adoption.

The project demonstrates:

-   Routing
-   Controller logic
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

---

## ⚙️ Installation & Setup

1. Clone this repository:

    ```bash
    git clone https://github.com/yourusername/pet-adoption.git
    cd pet-adoption

    composer install
    ```

## 🧩 Install dependencies

```bash
composer install
npm install && npm run dev

```
