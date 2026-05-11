# PHP Blog System (Full Stack Learning Project)

# BlogBold — Modern Blog Management System

A modern and responsive **Blog Management System** built using **PHP, MySQL, AJAX, jQuery, Bootstrap, and PDO**.

This project was developed as a complete full-stack learning and implementation project focused on understanding how modern web applications handle:

- Authentication
- Blog management
- AJAX-based dynamic filtering
- Database architecture
- Responsive frontend design
- Secure CRUD operations
- Session handling
- Admin dashboard workflows

The platform allows users to create and manage blogs dynamically while providing a modern UI experience and real-time filtering without page reloads.

---

# Live Features

## Public User Features

- View all published blogs
- Read full blog details
- Search blogs dynamically
- Filter blogs by category
- Filter blogs by publish date
- Responsive blog cards
- Pagination system
- Modern responsive UI

---

## Authentication System

- User Registration
- Secure Login System
- Logout Functionality
- Session-Based Authentication
- Password Hashing using `password_hash()`
- Authorization Checks

---

## Blog Management System

Authenticated users can:

- Create blogs
- Upload featured images
- Edit blogs
- Delete blogs
- Manage blog categories
- Add blog content dynamically

Each blog includes:

- Title
- Category
- Featured Image
- Content
- Author Information
- Publish Date

---

# AJAX + jQuery Features

The project includes real-time dynamic functionality using AJAX and jQuery.

### Implemented AJAX Features

- Live blog search
- Dynamic category filtering
- Date-based filtering
- Real-time content rendering
- Delete blog without page refresh
- Loading spinner during AJAX requests

These features improve user experience and simulate modern frontend interactions.

---

# Admin Dashboard

A modern admin dashboard was implemented to provide centralized blog management.

### Dashboard Features

- Total blogs statistics
- Total users statistics
- Recent blogs table
- Quick management actions
- Edit/Delete controls
- Dashboard navigation

---

# Security Implementations

Security practices were integrated throughout the application.

### Security Features

- Prepared statements using PDO
- CSRF protection for forms
- Output escaping using `htmlspecialchars()`
- Session-based authorization
- Input validation
- File upload validation
- Protected routes

---

# Tech Stack

## Backend

- PHP
- PDO (PHP Data Objects)

## Database

- MySQL

## Frontend

- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- jQuery
- AJAX

## Development Environment

- XAMPP
- phpMyAdmin
- Git & GitHub

---

# Project Structure

```bash
blog_site/
│
├── admin/                 # Admin dashboard
│   └── dashboard.php
│
├── ajax/                  # AJAX handlers
│   └── filter_posts.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   ├── js/
│   │   └── main.js
│   │
│   └── uploads/           # Uploaded blog images
│
├── auth/                  # Authentication system
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── config/
│   └── database.php
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── posts/
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── blog.php               # Blog details page
├── index.php              # Homepage
│
├── blog_site_db.sql       # Database export
│
└── README.md
```

---

# Database Setup

Create a database named:

```sql
blog_site_db
```

Import:

```bash
blog_site_db.sql
```

using phpMyAdmin.

---

# Main Database Tables

## users

| Column      | Type              |
| ------------| ----------------- |
| id          | INT (Primary Key) |
| name        | VARCHAR           |
| email       | VARCHAR           |
| password    | VARCHAR           |
| created_at  | TIMESTAMP         |

---

## posts

| Column      | Type              |
| ------------| ----------------- |
| id          | INT (Primary Key) |
| user_id     | INT               |
| title       | VARCHAR           |
| category    | VARCHAR           |
| image       | VARCHAR           |
| content     | TEXT              |
| created_at  | TIMESTAMP         |

---

# Installation & Setup

## 1. Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/php_blog_site.git
```

---

## 2. Move Project

Move the folder into:

```bash
xampp/htdocs/
```

Example:

```bash
C:\xampp\htdocs\blog_site
```

---

## 3. Start Server

Open XAMPP and start:

- Apache
- MySQL

---

## 4. Import Database

Open:

```bash
http://localhost/phpmyadmin
```

Create database:

```sql
blog_site_db
```

Then import:

```bash
blog_site_db.sql
```

---

## 5. Configure Database

Update credentials inside:

```bash
config/database.php
```

if needed.

---

## 6. Run the Project

Open browser:

```bash
http://localhost/blog_site
```

---

# Responsive Design

The application was designed to work across:

- Desktop
- Laptop
- Tablet
- Mobile Devices

Bootstrap grid system and responsive layouts were used throughout the project.

---

# Learning Outcomes

This project was built to strengthen understanding of:

- Full Stack Development
- Backend Architecture
- Authentication Systems
- CRUD Operations
- AJAX Integration
- Secure Database Handling
- Responsive Design
- Admin Dashboard Design
- Real-World Project Structuring
- Git & GitHub Workflow

---

# Future Enhancements

Planned improvements include:

- Rich text editor
- Blog comments system
- Like & bookmark system
- Role-based admin authentication
- Dark mode
- REST API integration
- Email verification
- Blog tags system
- Advanced analytics dashboard
- Cloud image storage integration

---

# GitHub Repository

Add your repository link here:

```bash
https://github.com/KushankVerma5/php_blog_site
```

---

# Deployment

This project can be deployed using free hosting services such as:

- InfinityFree
- 000webhost
- Render

---

# Author

## Kushank Verma

Aspiring Full Stack Developer focused on building modern scalable applications and strengthening backend + frontend development skills through real-world projects.

---

# License

This project is created for educational, learning, and portfolio purposes.