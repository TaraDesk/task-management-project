# Task Management System

## Overview
The Task Management System is a PHP-based web application designed to help users manage and share tasks. It includes user authentication, task creation, sharing tasks with other users, and marking tasks as completed.

---

## Features

- **User Authentication:** Secure login and registration system.
- **Task Management:**
  - Create, edit, and delete tasks.
  - Mark tasks as completed.
- **Task Sharing:** Share tasks with other registered users via their email.
- **Interactive Alerts:** SweetAlert integration for user feedback.
- **Responsive Design:** Tailwind CSS for a clean and modern interface.
- **Icons:** Bootstrap Icons for task action buttons.

---

## Technologies Used

- **Frontend:** Tailwind CSS, Bootstrap Icons, SweetAlert
- **Backend:** PHP
- **Database:** MySQL

---

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/TaraDesk/task-management-project.git
   ```

2. **Setup Database**
   - Import the `task_db.sql` file located in the `database/` directory into your MySQL server.
   - Create a `credentials.php` file in `src/config` folder with the following content:
     ```php
     $db_host = 'YOUR_SERVER_HOST';
     $db_user = 'YOUR_SQL_USER';
     $db_pass = 'YOUR_SQL_PASSWORD';
     $db_name = 'YOUR_DATABASE_NAME';
     ```

3. **Run the Application**
   - Start a local server using XAMPP, WAMP, or similar tools.
   - Place the project folder in the server's root directory (e.g., `htdocs` for XAMPP).
   - Access the application in your browser: `http://localhost/task-management-project/`

---

## Usage

1. **Register an Account:** Sign up with a unique email and password.
2. **Login:** Use your credentials to access the dashboard.
3. **Create Tasks:** Add tasks with detailed descriptions and optional sharing with other users.
4. **Manage Tasks:** Mark tasks as done, edit or delete them when no longer needed.
