
# Developer Portfolio – Laravel + Inertia + Vue 3

This is a personal portfolio web application built using Laravel, Inertia.js, Vue 3, and Tailwind CSS. It features sections for projects, skills, experience, education, CV uploads, and a contact form.

---

## 🧰 Requirements

Make sure your environment matches the following:

- **PHP**: ^8.2  
- **Laravel**: ^12.x  
- **Composer**: ^2.x  
- **Node.js**: ^18.x or ^20.x  
- **NPM**: ^9.x  
- **Database**: MySQL  

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/RejwanAhmed/portfolio.git
cd portfolio
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install JS dependencies

```bash
npm install
```

### 4. Copy `.env` file and configure it

```bash
cp .env.example .env
```

### 5. Set database and mail configuration in `.env`

```env
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="Your Name"
```

### 6. Generate app key and run migrations with seeders

```bash
php artisan key:generate
php artisan migrate --seed
```

### 7. Start local development server

```bash
php artisan serve
npm run dev
```

Visit: [http://localhost:8000](http://localhost:8000)