  # Emergency Room

  - [Emergency Room](#emergency-room)
    - [Done](#done)
    - [Prerequisite](#prerequisite)
    - [Installation](#installation)
    - [Configuration](#configuration)
      - [XAMPP](#xampp)
      - [Laravel](#laravel)

  ---

  ## Done
  | Name              | C | R | U | D | Result    |
  | ----------------- | - | - | - | - | --------- |
  | Person            | v | v | x | v | Done      |
  | Shift             | v | v | v | v | Done      |
  | Bed               | v | v | x | v | Done      |
  | Medication        | v | v | x | v | Done      |
  | PersonStatus      | v | v | x | v | Done      |
  | WorkerShift       | x | v | v | x | Done      |
  | Med               | v | v | v | v | Done      |
  | Beda              | v | v | v | v | Done      |
  | Adm               | v | v | x | v | Done      |
  | Casedoc && Triage | v | v | x | v | Done      |
  | Supby && Meda     |

  ---

  ## Prerequisite

  1. XAMPP php >= 7.3 [Download](https://www.apachefriends.org/index.html)
  2. Postgre SQL >= 12 [Download](https://www.postgresql.org)
  3. Node JS [Download](https://nodejs.org/en)
  4. Composer [Download](https://getcomposer.org/download)
  5. Git [Download](https://git-scm.com/downloads)

  ## Installation

  ```
  git clone https://github.com/arifblogger77/emergency-room.git
  ```

  ## Configuration
  ### XAMPP
  1. Open XAMPP
  2. In line Apache Module click Config
  3. Select PHP (php.ini)
  4. Search pgsql
  5. Remove `;` (semicolon) in `extension=pdo_pgsql` and `extension=pgsql`

  ### Laravel
  1. Open Project Emergency Room
    - Setup Installation
      1. Open terminal with path the project
      2. Run `composer install`
      3. Run `npm install`
      4. Run `npm run dev`
    - Setup Environtment 
      1. Duplicate `.env.example`
      2. Rename to `.env`
      3. Run `php artisan key:generate`
      4. Setup `.env`
          ```env
          DB_CONNECTION=pgsql
          DB_HOST=127.0.0.1
          DB_PORT=5432
          DB_DATABASE=yourdatabase
          DB_USERNAME=yourusername
          DB_PASSWORD=yourpassword
          ```
          > Don't forget to create database in Postgre SQL
    - Setup Project
      1. Open terminal with path the project
      2. Run `php artisan migrate:fresh --seed`
      3. Run `php artisan serve`
      4. Open the url
