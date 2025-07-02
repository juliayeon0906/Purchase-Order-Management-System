# Purchase Order Management System (PHP & MySQL)

This project is a web-based application for managing **purchase orders (POs)**. Built using PHP, MySQL, and Bootstrap, it allows users to **submit new purchase orders** and **query the status of existing ones**. 
---

## Project Overview

The application supports:
- Creation and management of purchase orders (POs)
- Viewing part availability and client information
- Tracking purchase order status and financials

The backend is powered by PHP and MySQL, and the frontend uses Bootstrap for styling. It runs on a local server using XAMPP for development and testing.

---

## Database Schema

The following tables are used in the system.

### `Parts`
Stores parts available for sale:
- `partNo` – Primary Key
- `descrPart` – Description
- `pricePart` – Unit price
- `qoh` – Quantity on hand

### `Clients`
Stores client information:
- `clientId` – Primary Key
- `clientName` – Name
- `clientPhone` – Contact number
- `moneyOwed` – Amount the client owes

### `POs`
Stores purchase order summaries:
- `poNo` – Primary Key
- `clientCompID` – Foreign Key to `Clients`
- `dateOfPO` – Date of order
- `statusPO` – Status of the PO (e.g., open, closed)

### `Lines`
Stores individual lines/items on a PO:
- `poNo` – Foreign Key to `POs`, part of Primary Key
- `lineNo` – Unique line number per PO, part of Primary Key
- `partNo` – Foreign Key to `Parts`
- `qtyOrdered` – Quantity ordered
- `priceOrdered` – Price per unit at time of order

---

## Technologies Used

- **PHP** – Backend & dynamic frontend generation
- **Bootstrap** – UI styling
- **JavaScript / CSS** – Custom interactivity & layout
- **MySQL** – Relational database
- **phpMyAdmin** – Web-based MySQL administration
- **MySQL Workbench** – DB design and maintenance
- **XAMPP** – Local server environment (Apache + MySQL)

---

## How To Run

### 1. Install XAMPP
- Download from: https://www.apachefriends.org
- Start **Apache** and **MySQL** modules

### 2. Import the Database
- Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Create a new database (e.g., `yeon`)
- Import the provided `.sql` file

### 3. Configure the Database Connection
- Copy the template config file:

```bash
cp db_connect_sample.php db_connect.php