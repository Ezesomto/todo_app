# todo_app
## 🔄 How to Import the Database

If you want to restore the database using the provided `todo_app.sql` file, follow these steps:

### Option 1: Using phpMyAdmin
1. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Create a new database named **`todo_app`**.
3. Select the new database.
4. Click **Import** → Choose File → select `todo_app.sql`.
5. Click **Go**. The tasks table will be created automatically.

### Option 2: Using Command Line
1. Open **Git Bash**, **Command Prompt**, or **Terminal**.
2. Run the following command:
   ```bash
   mysql -u root -p todo_app < todo_app.sql

3. CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 
 /todo-app/
│
├── db.php              ← Database connection (PDO)
├── index.php           ← Display tasks
├── add.php             ← Add new task
├── edit.php            ← Edit task
├── delete.php          ← Delete task
└── style.css           ← Optional styling

update credidentials

$host = 'localhost';
$db   = 'todo_app';
$user = 'root';
$pass = '';

Open in browser

http://localhost/todo-app/index.php
   