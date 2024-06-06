# WAMP-Server Assignment

This project is a basic PHP web application that interacts with a MySQL database using WampServer. It allows you to search, insert, update, and delete user data.

## Prerequisites

- WampServer installed on your local machine.

## Setting Up the Project

1. **Install WampServer:**
   - Download WampServer from the [official website](http://www.wampserver.com/).
   - Follow the installation instructions to install it on your machine.

2. **Create the MySQL Database:**
   - Open WampServer and start the services.
   - Access phpMyAdmin by navigating to `http://localhost/phpmyadmin/`.
   - Create a new database named `user_data`.
   - Create a table named `teachers` with the following structure:

     ```sql
     CREATE TABLE teachers (
         id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(100) NOT NULL,
         email VARCHAR(100) NOT NULL,
         age INT(11) NOT NULL
     );
     ```

3. **Add the Project Files:**
   - Place the `process.php` file in the `www` directory of your WampServer installation (e.g., `C:\wamp64\www\`).
   - Create a `styles.css` file in the same directory if you want to add custom styles.

## process.php Structure

- **Database Connection:**
  The script connects to the MySQL database using the credentials specified at the beginning of the file.

- **Handling POST Requests:**
  - **Insert:** Adds a new record to the `teachers` table.
  - **Update:** Updates an existing record in the `teachers` table based on the ID.
  - **Delete:** Deletes a record from the `teachers` table based on the ID.

- **Handling GET Requests:**
  - **Search:** Searches for records in the `teachers` table based on the name or email.

- **HTML Forms:**
  - **Search Form:** Allows searching for records by name or email.
  - **Insert Form:** Allows adding new records.
  - **Update Form:** Allows updating existing records.
  - **Delete Form:** Allows deleting records.

- **Display Data:**
  Displays the data from the `teachers` table in an HTML table format.

## Usage

1. **Access the Application:**
   Open your web browser and navigate to 
   ```bash
   http://localhost/index.php
   ```

2. **Search for Data:**
   - Use the search form to find records by entering a name or email.
   - Click the "Search" button to display the results.

3. **Insert New Data:**
   - Fill in the "Name," "Email," and "Age" fields in the insert form.
   - Click the "Upload" button to add the new record.

4. **Update Existing Data:**
   - Fill in the "ID" of the record you want to update.
   - Fill in the new values for "Name," "Email," and "Age."
   - Click the "Update" button to modify the record.

5. **Delete Data:**
   - Fill in the "ID" of the record you want to delete.
   - Click the "Delete" button to remove the record.

## Notes

- Ensure WampServer services are running before accessing the application.
- Make sure the database and table are correctly set up as described.
- Customize the `styles.css` file to enhance the appearance of your web application.

By following these steps, you will have a fully functional PHP application that interacts with a MySQL database using WampServer.