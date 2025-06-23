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
- PHPUnit

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
./vendor/bin/sail artisan migrate --seed
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

### 🧠 Flashcard and Deck Management

- CRUD for decks and flashcards
- Deck → Flashcard (One-to-Many)
- Validation with FormRequests
- Authorization using Laravel Policies

### 📚 Study Mode (Livewire)

- Study flashcards deck-by-deck
- Flip-style interface to show/hide answers
- Built with Livewire + Tailwind CSS

### 🔓 Public API (Token Protected)

- Access flashcards via API (GET)
- Custom middleware for API key authentication
- API Resources for JSON formatting

### 🧪 Testing

- PHPUnit test suite
- Unit tests and feature tests
- Coverage includes:
  - Authentication
  - Deck/card CRUD
  - Study session logic
  - API authentication

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

- **Livewire** was used for study interactions to reduce frontend complexity while maintaining reactivity.
- A **custom middleware** handles token-based API access.
- Business logic (e.g., study flow) was extracted into a **dedicated service class**.
- **FormRequests** and **Policies** enforce security and validation.
- **Sail** simplifies the local setup with Docker.

---

## 🔐 AI Tool Usage Disclosure

AI-assisted tools were used responsibly during development:

| Tool             | Context                     | Area                             | Purpose                           |
|------------------|------------------------------|-----------------------------------|------------------------------------|
| ChatGPT          | Initial setup                | Docker config, `.env.example`     | Speed up boilerplate configuration |
| GitHub Copilot   | Controller logic & migrations| Decks, Cards, API, Tests          | Autocomplete repetitive patterns   |
| ChatGPT          | Validation & testing         | FormRequests, feature tests       | Ensure best practices              |

All AI-assisted code was reviewed, validated, and tested before being committed.

---

## 🖼️ Screenshots (To Be Attached)

- Login and registration
- Deck listing
- Flashcard creation/editing
- Study mode (Livewire)
- API response (e.g., Postman view)

---

## 📌 Laravel & PHP Versions

- **PHP:** 8.3
- **Laravel:** 11.x

---

## 📎 Environment

- Laravel Sail (Docker)
- MySQL container via Sail
- `.env.example` file included