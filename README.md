# UniLink 🎓💬

**UniLink** is a Laravel-based university communication system with separate roles for Admins, Lecturers, and Students. It supports secure, **non real-time** messaging to improve structured academic communication.

🔗 [GitHub Repository](https://github.com/Kaarthiraghav/UniLink)

---

## 🚀 Features

- 🔐 **Role-Based Access**
  - **Admin**: Create/manage users and groups (no messaging)
  - **Lecturer**: Message students 1-to-1 and participate in group chats
  - **Student**: Message lecturers 1-to-1 and participate in group chats

- 💬 **Messaging System**
  - Server-based (non-real-time)
  - Messages stored in the database and displayed per request

- ✅ **Secure Authentication**
  - Laravel’s session-based auth

- 🤖 **Built with AI**
  - Developed using ChatGPT and GitHub Copilot

---

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP)
- **Frontend**: Blade templating
- **Database**: MySQL / MariaDB
- **Authentication**: Laravel session auth
- **Tools**: ChatGPT, GitHub Copilot

---

## 👥 User Roles & Permissions

| Role     | Abilities                                                               |
|----------|-------------------------------------------------------------------------|
| Admin    | Create users and groups (no messaging capabilities)                     |
| Lecturer | Message students 1-to-1 and participate in assigned group discussions   |
| Student  | Message lecturers 1-to-1 and communicate within assigned groups         |

---

## ⚙️ Project Setup

### 1. Clone the Repository
```bash
git clone https://github.com/Kaarthiraghav/UniLink.git
cd UniLink
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run dev
```

### 3. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```
Edit the `.env` file with your database config:
```
DB_DATABASE=unilink_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run Migrations and Seed Data
```bash
php artisan migrate --seed
```
This will create the tables and insert 3 test users.

---

## 🔑 Default Login Credentials

| Role     | User ID              | Password   |
|----------|----------------------|------------|
| Admin    | A001                 | password   |
| Lecturer | L001                 | password   |
| Student  | S001                 | password   |

> ⚠️ You can change these in the database after setup.

---

## 🧪 Testing Locally

### Laravel Valet / Custom Host
If using Laravel Valet or a custom `.test` domain, access the project at:

```
http://unilink.test
```

Otherwise, serve with Artisan:

```bash
php artisan serve
```

Then access:

```
http://localhost:8000
```

---

## 📂 Project Structure (Simplified)

```
UniLink/
├── app/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── .env
├── composer.json
└── README.md
```

---

## ✍️ Author

**NexusNet**  
_NSBM Green University_

---

## 📜 License

This project is licensed under the [MIT License](https://github.com/Kaarthiraghav/UniLink/blob/main/LICENSE).
