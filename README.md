# StreamPlus Multi-step Onboarding Form
## 📂 Project Structure
project_root/
├── README.md
├── composer.json
├── config/
│   ├── packages/
│   │   ├── doctrine.yaml
│   │   ├── framework.yaml
│   │   └── routes.yaml
│   └── services.yaml
├── migrations/
│   └── Version20231001xxxxxx.php
├── public/
│   ├── index.php
│   └── js/
│       └── form-handler.js
├── src/
│   ├── Controller/
│   │   └── RegistrationController.php
│   ├── Entity/
│   │   └── User.php
│   ├── Form/
│   │   ├── UserInformationType.php
│   │   ├── AddressInformationType.php
│   │   └── PaymentInformationType.php
│   ├── Repository/
│   │   └── UserRepository.php
│   └── Validator/
│       └── CustomValidator.php
├── templates/
│   └── registration/
│       ├── user_information.html.twig
│       ├── address_information.html.twig
│       ├── payment_information.html.twig
│       └── confirmation.html.twig


## Project Overview
The StreamPlus application is a multi-step onboarding form designed to streamline the user registration process. This application guides users through providing necessary information in several steps while ensuring a smooth and user-friendly experience.

## Prerequisites
Before you begin, ensure you have the following software installed:
- PHP >= 8.1
- Composer
- MySQL
- Symfony CLI

## Installation Steps

1. **Clone the Repository**
   To get a copy of the project, open your terminal and run:
   git clone https://github.com/masif85/streamplus
   
   

## 🚀 Setup Instructions

### **1. Install Symfony**

Make sure you have **PHP 8.1+**, **Composer**, and **Symfony CLI** installed.

```bash
composer create-project symfony/skeleton senior-php-assignment
cd senior-php-assignment
```

### **2. Install Dependencies**

```bash
composer install
```

### **3. Configure Database**

Edit the `.env` file:

```
DATABASE_URL="mysql://root:password@127.0.0.1:3306/streamplus?serverVersion=5.7"
```

Run migrations:

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Installation Instructions
  Follow these steps to set up the application:

  1. **Clone the Repository**:
     
 copy
1
2
3
bash
     git clone <repository-url>
     cd <repository-folder>


  2. **Install Dependencies**: 
     Run the following command to install the project dependencies:
     
 copy
1
2
bash
     composer install


  3. **Configure Environment**:
     - Copy the `.env.example` file to `.env` and fill in your database connection parameters.
     - Ensure it contains the correct database name, user, and password.

  4. **Create the Database**:
     Create a new database in MySQL that matches your configuration in the `.env` file.

  5. **Run Database Migrations**:
     Use the following command to set up your database schema:
     
 copy
1
2
bash
     php bin/console doctrine:migrations:migrate


  ## Running the Application
  Start the local Symfony server:
  
 copy
1
2
bash
  symfony server:start

  Open your web browser and navigate to `http://localhost:8000` to access the application.

  ## Using the Application
  The onboarding form consists of multiple steps:
  
  1. **User Information**: 
      - Fill in your name, email, phone number, and select your subscription type (Free or Premium).
      - Validation checks are performed dynamically; ensure the email and phone number meet the specified formats.

  2. **Address Information**:
      - If you select Free, you'll skip to the confirmation step. If you select Premium, provide your address information.
      - Depending on your selected country, specific address fields will be displayed or hidden. 

  3. **Payment Information**:
      - If Premium is selected in Step 1, input your credit card details, including credit card number, expiration date, and CVV. Validations are applied dynamically.

  4. **Confirmation Page**:
      - Review the entered information and click "Submit" to finalize your registration.

   