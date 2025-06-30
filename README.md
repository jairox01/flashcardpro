# 📘 FlashcardPro

**FlashcardPro** is a Laravel + Livewire application that allows users to create, manage, and study flashcards grouped into decks. This project is a technical assessment submission for the Laravel Developer position at **Awesome Motive**.

---

## 👤 Developer

**Jairo Mendieta**  
📧 j4iro.a@gmail.com  
🔗 GitHub: [https://github.com/jairox01](https://github.com/jairox01)

---

## ⚙️ Tech Stack

- Laravel 11
- PHP 8.3
- Laravel Sail (Docker)
- Laravel Livewire
- Tailwind CSS
- MySQL (Dockerized)
- Eloquent ORM
- Pest (and PHPUnit)

---

## 🚀 Setup Instructions

1. **Clone the repository:**

```bash
git clone git@github-personal:jairox01/flashcardpro.git
cd flashcardpro
```

2. **Copy the environment file:**

```bash
cp .env.example .env
```

3. **Start the environment using Laravel Sail:**

```bash
./vendor/bin/sail up -d
```

4. **Install dependencies:**

```bash
./vendor/bin/sail composer install
```

5. **Generate the application key:**

```bash
./vendor/bin/sail artisan key:generate
```

6. **Run database migrations and seeders:**

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

7. **Visit the application:**

```
http://localhost
```

---

## ✅ Implemented Features

### 🔐 Authentication

- User registration and login
- Session-based protected routes
- API token generation using Laravel Sanctum

### 🧠 Flashcard and Deck Management

- Full CRUD for decks and flashcards
- Deck → Flashcard (One-to-Many)
- Validation with FormRequests
- Authorization with Laravel Policies

### 📚 Study Mode (Livewire)

- Study flashcards deck-by-deck
- Flip-style UI to show/hide answers
- Livewire reactivity without full-page reloads

### 🔓 Public API (Token Protected)

- `/api/token`: generate auth token
- `/api/public/decks`: list public decks
- `/api/public/decks/{deck}/flashcards`: list public flashcards for a deck
- Middleware: custom logger for public API access

### 🧪 Testing

- Pest-powered suite with over 95% feature coverage:
  - API token validation
  - Authenticated and unauthenticated API access
  - Study mode behavior
  - Deck & flashcard ownership and access control

---

## 🧪 Run Tests

```bash
./vendor/bin/sail test
```

---

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   ├── Livewire/
│   └── Middleware/
├── Models/
├── Policies/
├── Services/
routes/
├── web.php
├── api.php
resources/
├── views/
└── livewire/
```

---

## 🧠 Architectural Decisions

- **Livewire** used to reduce frontend complexity and support dynamic interactivity
- **Sanctum** + custom middleware for API token access
- **FormRequests** enforce validation logic cleanly
- **Policy-based authorization** for all flashcard/deck actions
- Structured seeders and factories ensure predictable test data
- Docker-first setup via Sail

---

## 🤖 AI Tool Usage Disclosure

| Tool             | Area                     | Purpose                                          |
|------------------|--------------------------|--------------------------------------------------|
| ChatGPT          | Initial scaffolding       | Route structure, seeder examples, Livewire logic |
| GitHub Copilot   | Boilerplate generation    | Factories, form requests, test shells            |
| ChatGPT          | Testing + documentation   | Pest coverage, README.md formatting              |

All AI-assisted code was manually verified and adapted to Laravel 11 best practices.

---

## 🖼️ Screenshots (To Be Attached)

- Login and registration
- Deck listing
- Flashcard creation/editing
- Study mode (Livewire)
- API response (e.g., curl/Postman)

---

## 📌 Laravel & PHP Versions

- **PHP:** 8.3
- **Laravel:** 11.x

---

## 📎 Environment

- Laravel Sail (Docker)
- MySQL container via Sail
- `.env.example` file included
