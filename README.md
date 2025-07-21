# UniLink 🎓💬

**UniLink** is a role-based university chat system designed to improve academic communication between students, lecturers, and admins. It is built as a **server-based (non real-time)** messaging platform using Laravel.

---

## 🚀 Features

- 🔐 **Role-Based Access**
  - **Admin**: Can create users and groups (no messaging ability)
  - **Lecturer**: Can message students 1-to-1 and participate in group chats
  - **Student**: Can message in assigned groups and chat 1-to-1 with lecturers

- 💬 **Messaging System**
  - Server-based (non real-time)
  - Messages retrieved on-demand

- ✅ **Session-Based Authentication**
  - Secure login for each user role using Laravel's built-in system

- 🤖 **Built with AI Assistance**
  - Developed using ChatGPT and GitHub Copilot

---

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP)
- **Frontend**: Blade templating engine
- **Database**: MySQL
- **Authentication**: Laravel Auth (session-based)
- **Tools**: ChatGPT, GitHub Copilot

---

## 👥 User Roles

| Role     | Abilities                                                               |
|----------|-------------------------------------------------------------------------|
| Admin    | Manage users and groups (no messaging ability)                          |
| Lecturer | Message students directly and participate in assigned group discussions |
| Student  | Message lecturers and engage in group chats                             |
