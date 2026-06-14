# Shared Expenses Management System

## Overview

A Laravel-based Shared Expenses Management System inspired by Splitwise. The application allows users to create groups, manage group members, record shared expenses, track balances, record settlements, and import expense data from CSV files.

## Features

* User Authentication
* Group Creation and Management
* Dynamic Group Membership (Join/Leave Support)
* Expense Management
* Equal Expense Splitting
* Balance Calculation
* Settlement Recording
* CSV Import Module
* Import Anomaly Detection
* Import Reporting

## Tech Stack

### Backend

* Laravel 12
* PHP 8.2

### Database

* MySQL

### Frontend

* Blade Templates
* Bootstrap

## Installation

1. Clone Repository

```bash
git clone <repository-url>
cd shared-expenses-app
```

2. Install Dependencies

```bash
composer install
npm install
npm run build
```

3. Configure Environment

```bash
cp .env.example .env
```

Update database credentials.

4. Generate Key

```bash
php artisan key:generate
```

5. Run Migrations

```bash
php artisan migrate
```

6. Start Application

```bash
php artisan serve
```

## AI Tools Used

* ChatGPT
* GitHub Copilot

## Project Structure

* Authentication Module
* Group Management Module
* Expense Management Module
* Settlement Module
* CSV Import Module
* Import Reporting Module

## Future Enhancements

* Percentage Split
* Exact Split
* Automatic Debt Simplification
* Multi-Currency Conversion
* Advanced Import Validation
