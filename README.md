This project is a custom plain PHP framework structured specifically for your Chartered Accountant firm website.

## IMPORTANT NOTE
You are currently viewing this project in an AI Studio environment which runs a Node.js container to provide the live preview. **PHP is not supported by default in this preview container.**

To run this application, you must export it and run it locally on your computer using XAMPP, WAMP, or any other standard PHP server.

## Installation & Setup Instructions

1. **Download the Source Code:**
   In the AI Studio text editor, click the gear icon in the top right and select "Export as ZIP" or push it to a GitHub repository.

2. **Extract to XAMPP:**
   Extract the contents of the ZIP file into your `C:\xampp\htdocs\ca-firm` directory (or equivalent).

3. **Database Setup:**
   - Open PHPMyAdmin (`http://localhost/phpmyadmin`).
   - Create a new database named `cafirm_db`.
   - Import the `database/schema.sql` file provided in this repository.

4. **Configuration:**
   - Open `config/database.php` and verify the `db_host`, `db_name`, `db_user`, and `db_pass` match your local XAMPP setup.
   - Adjust `app_url` in `config/database.php` if your folder path is different.

5. **Run the Project:**
   Open your browser and navigate to `http://localhost/ca-firm/public`.

## Folder Structure

- `/public`: The document root. Point your web server here for production deployment. Contains the front controller `index.php`.
- `/core`: Tiny, extremely fast MVC implementation handling Database connections, Routing, and Security.
- `/app/Controllers`: Your business logic controllers.
- `/templates`: Plain PHP view files integrated with Tailwind CSS CDN.
- `/admin`: Minimalist admin backend structure.
- `/database`: Migration scripts and initial schema.
"# ca-firm" 
