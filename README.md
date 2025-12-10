# CI-Workflow 

A small PHP form-processing demo. This repository contains a simple front-end form and server-side PHP processing with a minimal DB connection helper.

## Project Purpose

- Demonstration of a PHP form workflow with client-side validation and server-side processing.
- Intended for local development and learning about CI/deployment basics for the course.

## Prerequisites

- PHP 7.4+ (or compatible) installed locally.
- A web server such as built-in PHP server, XAMPP, WampServer, or similar.
- (Optional) MySQL/MariaDB if the project requires persisting form submissions.

## Quick Start (Local)

1. Open a terminal in the project root (where `index.php` is located).

2. Start the built-in PHP server for quick local testing:

```powershell
php -S localhost:8000 -t .
```

3. Visit `http://localhost:8000` in your browser and use the form on the homepage.

## File Structure

- `index.php` — main page with the form.
- `css/style.css` — styles.
- `js/process-forms.js` — client-side form handling.
- `php/process-forms.php` — server-side form processing logic.
- `php/db_connect.php` — database connection helper (edit to configure DB credentials).
- `success.php` — success landing page after form submission.

## Database Setup

If you want to enable database persistence:

- Edit `php/db_connect.php` and update the host, database name, username and password to match your environment.
- Create the required table(s) in your database. (This repo does not include a schema SQL file — add one if you need reproducible DB setup.)

## Notes

- This README intentionally keeps instructions minimal. If you want, I can add example SQL for creating tables, a `.env` example, or Docker/XAMPP-specific steps.

## Contact

If you want changes or additions to this README (schema, deployment steps, tests), tell me what to include and I'll update it.
