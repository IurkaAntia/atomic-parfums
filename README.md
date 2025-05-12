# Atomic Parfums

Welcome to **Atomic Parfums** — a modern, responsive web app for a boutique fragrance brand. This project features a clean UI, dynamic content handling, and performant, modern architecture.

## 🚀 Features

- ✨ Stylish, minimalist UI built with Tailwind CSS
- 🧭 SPA behavior with Inertia.js
- 📦 Component-based Vue 3 front-end
- 📨 Newsletter subscription form
- 📄 Helpful pages: Shipping Policy, Privacy Policy, FAQ, and more
- 🔗 Contact form and footer links
- ⚡ Optimized for performance and accessibility

## 🛠️ Stack

- **Frontend**: Vue 3 + Inertia.js + Tailwind CSS
- **Backend**: PHP + Laravel
- **Routing**: Inertia-powered SPA navigation
- **Styling**: Tailwind CSS

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/atomic-parfums.git
cd atomic-parfums

npm install

cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
composer run dev
