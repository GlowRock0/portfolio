# Hospital Triage System

## Setup and Running Locally

**Dependencies**
- php
- pgAdmin4

1. **Clone the Repository**: 
   ```bash
   git clone <repository-url>
   cd <repository-directory>

2. **Create the Database**:
   - Open the `pgAdmin` tool or use the PostgreSQL command line.
   - Create a new database and `name` it, remember the `name` for later
   - Set the database `user`, remember the `user` for later
   - Set the database `password`, remember the `password` for later

3. **Configure the Database Schema**:
   - Use the following SQL commands to set up the database schema:
     ```sql
     CREATE TABLE patients (
         id SERIAL PRIMARY KEY,
         name VARCHAR(100) NOT NULL,
         code CHAR(3) NOT NULL UNIQUE,
         severity INT NOT NULL,
         wait_time INT NOT NULL
     );

     CREATE TABLE wait_times (
         id SERIAL PRIMARY KEY,
         patient_id INT REFERENCES patients(id),
         time_in_queue INT NOT NULL,
         severity INT NOT NULL
     );
     ```

4. **Insert Sample Data**:
   - Use the following SQL commands to populate the database with sample data:
     ```sql
     INSERT INTO patients (name, code, severity, wait_time) VALUES ('John Doe', 'JD1', 2, 30);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (1, 30, 2);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Jane Smith', 'JS2', 3, 45);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (2, 45, 3);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Alice Johnson', 'AJ3', 1, 15);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (3, 15, 1);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Bob Brown', 'BB4', 2, 25);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (4, 25, 2);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Charlie Davis', 'CD5', 3, 50);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (5, 50, 3);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Dana White', 'DW6', 1, 10);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (6, 10, 1);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Eve Black', 'EB7', 2, 35);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (7, 35, 2);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Frank Green', 'FG8', 3, 55);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (8, 55, 3);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Grace Harris', 'GH9', 1, 20);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (9, 20, 1);

     INSERT INTO patients (name, code, severity, wait_time) VALUES ('Hank Wilson', 'HW0', 2, 40);
     INSERT INTO wait_times (patient_id, time_in_queue, severity) VALUES (10, 40, 2);
     ```
5. **Run The Application**
    - Open cmd in the root directory of the assignment
    - Type: `php -S localhost:4000`
    - Open your browse and navigate to `http://localhost:4000/client/index.html`

6. **Configure The Database**
    -On the Home page, navigate to the form
    -For `Database Name`, use the same `name` you named your database in Step 2.
    -For `Database User`, use the same `user` you named your database in Step 2.
    -For `Database Password`, use the same `password` you named your database in Step 2.
    -Click the `Save Configuration` button.

## Overview

The Hospital Triage System is a web application designed to help staff and patients understand emergency room wait times. The application provides two interfaces:
1. **Patient Interface**: Allows patients to check their approximate wait time using their name and 3-letter code.
2. **Admin Dashboard**: Allows administrators to view a full list of patients with their wait times and codes.

## Project Structure

- `./client/`: Contains front-end code for the patient and admin interfaces.
  - `index.html`: Homepage with navigation to patient and admin interfaces.
  - `patient.html`: Patient interface for checking wait times.
  - `admin.html`: Admin dashboard for viewing patient list.
  - `styles.css`: Styles for the patient interface.
  - `admin.css`: Styles for the admin dashboard.
  - `app.js`: JavaScript for handling patient interface interactions.
  - `admin.js`: JavaScript for handling admin dashboard interactions.

- `./public/`: Contains back-end code and database interaction scripts.
  - `db.php`: Database connection configuration.
  - `patient.php`: PHP script for handling patient wait time requests.
  - `admin.php`: PHP script for fetching the list of patients.

## User Documentation

### Patient Interface

- **Check Wait Time**:
  1. Open the Patient Interface by navigating to the "Patient Interface" button from the homepage.
  2. Enter your name in the "Name" field.
  3. Enter your 3-letter code in the "3-Letter Code" field.
  4. Click the "Check Wait Time" button.
  5. The application will display the approximate wait time below the form based on the provided name and code.

### Admin Dashboard

- **View Patient List**:
  1. Open the Admin Dashboard by navigating to the "Admin Dashboard" button from the homepage.
  2. The dashboard will automatically display a list of all patients in the system.
  3. The list includes each patient's name, 3-letter code, severity level, and wait time.

## Developer Notes

- **Front-End**:
  - The patient and admin interfaces are built using HTML, CSS, and JavaScript.
  - JavaScript files (`app.js` and `admin.js`) handle user interactions and fetch data from the PHP back-end.

- **Back-End**:
  - PHP scripts (`patient.php` and `admin.php`) handle requests from the front-end and interact with the PostgreSQL database.
  - The `db.php` file contains the configuration for connecting to the PostgreSQL database.

- **Database**:
  - The database (`emergency_waitlist`) stores patient information and wait times.
  - Make sure the credentials in `db.php` match those of your PostgreSQL setup.
