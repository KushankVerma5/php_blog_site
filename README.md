# PHP Blog System (Full Stack Learning Project)

A simple blog system built using **PHP, MySQL, and PDO** to explore and strengthen full-stack development concepts.
This project focuses on understanding **backend architecture, secure database interaction, authentication, and CRUD operations** while building a functional blogging platform.

The goal of this project is not only to build features but also to understand **how real web applications handle data, security, and user interactions.**

---

## Project Overview

This application allows users to:

* Register and log into the system
* Create blog posts
* View posts on the homepage
* Edit and delete their own posts
* Search posts by title
* Navigate posts using pagination

The project also implements important **security and backend practices** such as:

* Prepared SQL statements (prevent SQL injection)
* CSRF protection for form submissions
* Session-based authentication
* Input validation and sanitization

---

## Tech Stack

**Backend**

* PHP
* PDO (PHP Data Objects)

**Database**

* MySQL

**Frontend**

* HTML
* Bootstrap (for layout and styling)

**Development Environment**

* XAMPP
* phpMyAdmin

---

## Features Implemented

### User Authentication

* User login system using sessions
* Authorization checks for protected actions

### Blog Post Management

* Create new blog posts
* Edit existing posts
* Delete posts
* Display posts with author information

### Security

* CSRF token validation for form submissions
* Prepared statements using PDO
* Output escaping using `htmlspecialchars`

### Search

Users can search blog posts by title.

### Pagination

Posts are displayed with pagination to limit the number of posts per page.

---

## Project Structure

```
blog_site/
│
├── auth/              # Authentication pages
│
├── config/            # Database configuration
│   └── database.php
│
├── posts/             # Post operations
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── includes/          # Shared layout components
│   ├── header.php
│   └── footer.php
│
├── assets/            # CSS / JS files
│
└── index.php          # Homepage (post listing)
```

---

## Database Setup

Create a database:

```
blog_project
```

Example tables:

### users

| column   | type              |
| -------- | ----------------- |
| id       | INT (Primary Key) |
| name     | VARCHAR           |
| email    | VARCHAR           |
| password | VARCHAR           |

### posts

| column     | type              |
| ---------- | ----------------- |
| id         | INT (Primary Key) |
| user_id    | INT               |
| title      | VARCHAR           |
| content    | TEXT              |
| created_at | TIMESTAMP         |

---

## How to Run the Project

1. Install **XAMPP**
2. Start **Apache** and **MySQL**
3. Clone this repository inside:

```
xampp/htdocs/
```

Example:

```
C:\xampp\htdocs\blog_site
```

4. Create the database using **phpMyAdmin**

```
http://localhost/phpmyadmin
```

5. Update database credentials in:

```
config/database.php
```

6. Run the project in the browser:

```
http://localhost/blog_site
```

---

## Learning Goals

This project was built to explore and understand:

* Full stack development workflow
* Database-driven web applications
* Secure database interaction using PDO
* CRUD system architecture
* Authentication using sessions
* Backend debugging and testing

---

## Future Improvements

Planned enhancements:

* Dynamic pagination
* Flash success messages
* AJAX-based post deletion
* Image upload for blog posts
* Categories and tags for posts
* Better UI design
* REST API version of the blog

---

## Author

**Kushank Verma**

Aspiring **Full Stack Developer** exploring different technologies and building projects to strengthen system design and development skills.

---

## License

This project is for educational and learning purposes.
