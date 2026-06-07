# RulfaDev Portfolio

A modern and professional portfolio website for web development services. This project is built to showcase services, case studies, brand collaborations, testimonials, client reviews, and project inquiries through a clean, responsive, SEO-friendly interface.

The website is designed for a professional web developer or small digital service brand that wants to present projects, collect client leads, manage portfolio content, and publish client testimonials without exposing personal identity publicly.

---

## Overview

RulfaDev Portfolio is not only a personal portfolio website. It also works as a service landing page for web development services such as landing pages, company profiles, ecommerce websites, and custom web applications.

The public website helps visitors understand available services, view project case studies, explore technology stacks, see trusted brands or collaborators, read testimonials, and submit project inquiries.

The admin panel allows the owner to manage website content dynamically without editing code.

---

## Main Features

### Public Website

* Modern landing page for web development services
* Responsive and mobile-friendly design
* Professional hero section
* Website solution cards
* Services section
* Project showcase
* Project case study catalog
* Project detail page
* Brand and collaborator section
* Brand logo marquee
* Technology stack section
* Workflow section
* Testimonials section
* Client review display
* Contact / project inquiry form
* Floating WhatsApp button
* SEO meta tags
* Open Graph support
* Sitemap and robots.txt

### Admin Panel

* Admin dashboard overview
* Manage projects
* Upload project thumbnail
* Upload project gallery
* Manage services
* Manage brands and logos
* Manage testimonials
* Manage project inquiries
* Manage site settings
* Upload website logo
* Create client review links
* View client reviews
* SweetAlert2 delete confirmation
* Reusable form components
* Reusable custom dropdown component
* Reusable action button component

### Client Review Link

The project includes a special client review system.

Admin can create a unique review link and share it with a client. The client can submit one review through that link. If the client opens the same link again, they can edit their own review as long as the link is still active.

Admin can only view the review and cannot edit the review content submitted by the client.

---

## Tech Stack

### Backend

* PHP 8.3+
* Laravel 13
* MySQL
* Eloquent ORM
* Blade Template Engine

### Frontend

* Tailwind CSS
* Alpine.js
* Vite
* FontAwesome
* SweetAlert2

### Tools

* Composer
* NPM
* Git
* GitHub
* Visual Studio Code
* Postman
* Figma

---

## Project Modules

### Projects

Used to manage portfolio projects and case studies.

Features:

* Project title
* Slug
* Category
* Client name
* Private client option
* Summary
* Description
* Problem
* Solution
* Result
* Features
* Tech stack
* Thumbnail upload
* Gallery upload
* Demo URL
* Repository URL
* SEO title
* SEO description
* Status
* Featured option
* Active option
* Sort order

### Services

Used to manage services displayed on the homepage.

Features:

* Service title
* Slug
* Icon or FontAwesome class
* Description
* Feature list
* Active option
* Sort order

### Brands

Used to manage brand collaborations, clients, partners, or internal brands.

Features:

* Brand name
* Brand type
* Logo upload
* Website URL
* Description
* Featured option
* Active option
* Sort order

### Testimonials

Used to manage manual testimonials from the admin panel.

Features:

* Client name
* Role
* Company
* Message
* Rating
* Anonymous option
* Active option
* Sort order

### Client Reviews

Used to collect reviews directly from clients using unique links.

Features:

* Unique review link
* One review per link
* Client can edit review using the same link
* Admin cannot edit review content
* Publish consent option
* Active / inactive review link
* Optional expiration date

### Project Inquiries

Used to collect project requests from potential clients.

Fields:

* Name
* Email
* Phone / WhatsApp
* Website type
* Budget range
* Timeline
* Message
* Status
* Admin notes

Inquiry statuses:

* New
* Contacted
* In Progress
* Closed
* Spam

### Site Settings

Used to manage global website identity.

Fields:

* Brand name
* Brand tagline
* Hero title
* Hero description
* Business email
* Business phone
* Business WhatsApp
* Location label
* Website logo
* SEO title
* SEO description
* SEO keywords

---

## Installation

Clone the repository:

```bash
git clone https://github.com/username/repository-name.git
cd repository-name
```

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

Copy environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Run migration:

```bash
php artisan migrate
```

Create storage link:

```bash
php artisan storage:link
```

Run development server:

```bash
php artisan serve
```

Run Vite development server:

```bash
npm run dev
```

Open the website:

```txt
http://localhost:8000
```

---

## Build for Production

Build frontend assets:

```bash
npm run build
```

Clear and cache Laravel configuration:

```bash
php artisan optimize:clear
php artisan optimize
```

For production, update `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

---

## Admin Panel

Admin panel URL:

```txt
/admin/login
```

Dashboard URL:

```txt
/admin/dashboard
```

Admin features:

* Dashboard overview
* Projects management
* Services management
* Brands management
* Testimonials management
* Project inquiries
* Review links
* Site settings

Set up your admin user through seeder, database, or your existing authentication setup.

---

## Environment Variables

Recommended `.env` values:

```env
APP_NAME=RulfaDev
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

BUSINESS_EMAIL=hello@example.com
BUSINESS_PHONE=6281234567890
BUSINESS_WHATSAPP=6281234567890
```

For production:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

---

## SEO Features

This project includes basic SEO support:

* Dynamic SEO title
* Dynamic SEO description
* SEO keywords
* Canonical URL
* Open Graph meta tags
* Twitter card meta tags
* Sitemap XML
* Robots TXT
* JSON-LD schema
* Project detail SEO metadata

SEO routes:

```txt
/sitemap.xml
/robots.txt
```

Private routes such as admin pages and client review links should not be indexed.

---

## Public Routes

Main public routes:

```txt
/
 /projects
 /projects/{project}
 /contact
 /review/{token}
 /sitemap.xml
 /robots.txt
```

The `/review/{token}` route is intended for private client review links.

---

## Admin Routes

Main admin routes:

```txt
/admin/dashboard
/admin/projects
/admin/services
/admin/brands
/admin/testimonials
/admin/inquiries
/admin/review-links
/admin/settings
```

---

## File Uploads

Uploaded files are stored in:

```txt
storage/app/public
```

Public access is handled through:

```txt
public/storage
```

Make sure to run:

```bash
php artisan storage:link
```

Uploaded files include:

* Website logo
* Project thumbnails
* Project gallery images
* Brand logos

---

## cPanel Deployment Checklist

Before uploading to cPanel:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan optimize:clear
php artisan optimize
```

Check `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

Make sure these folders are writable:

```txt
storage
bootstrap/cache
```

If symbolic link is not supported on cPanel, manually ensure uploaded storage files can be accessed from the public path.

---

## Security Notes

* Do not expose `.env`
* Set `APP_DEBUG=false` in production
* Protect admin routes with authentication
* Do not index `/admin`
* Do not index `/review/{token}`
* Use strong admin credentials
* Backup database regularly
* Keep dependencies updated

---

## Suggested Business Content

### Brand Tagline

```txt
Jasa Pembuatan Website & Web App Profesional
```

### Hero Title

```txt
Website modern untuk bisnis yang ingin tampil profesional.
```

### Hero Description

```txt
Bangun website company profile, landing page, ecommerce, dan web app custom yang responsif, cepat, SEO-friendly, dan mudah dikelola.
```

### SEO Title

```txt
RulfaDev - Jasa Pembuatan Website Profesional
```

### SEO Description

```txt
RulfaDev menyediakan jasa pembuatan website company profile, landing page, ecommerce, dan web app custom yang modern, responsif, SEO-friendly, cepat, dan mudah dikelola untuk bisnis, UMKM, komunitas, dan brand profesional.
```

### SEO Keywords

```txt
jasa pembuatan website, jasa website profesional, web developer indonesia, pembuatan website company profile, jasa landing page, jasa ecommerce website, custom web application, laravel developer, website responsive, website SEO friendly, web app custom, jasa website UMKM, website bisnis, portfolio web developer
```

---

## Recommended Commit Message

```txt
Update:
- Public Portfolio Homepage
- Project Case Study Pages
- Admin Dashboard
- Projects Management
- Services Management
- Brands Management
- Testimonials Management
- Client Review Links
- Project Inquiry Form
- Site Settings
- SEO Configuration
- FontAwesome Integration
- SweetAlert2 Delete Confirmation
- Reusable Form Components
- README.md
```

---

## License

This project is open for personal and professional portfolio usage. Adjust the license based on your repository preference.
