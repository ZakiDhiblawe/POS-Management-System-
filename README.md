# POS Management System

## Overview

The POS Management System is a beginner-level web application designed for managing point-of-sale operations. This project, developed using PHP and Oracle Database, provides functionalities for adding and viewing products, creating and viewing orders, and managing customers. It's a simple yet effective tool for learning and implementing basic web development and database integration.

## Features

- **Add Product**: Interface for adding new products to the system.
- **View Products**: Displays a list of all products in the inventory.
- **Create Order**: Facilitates the creation of new orders.
- **View Orders**: Provides a view of all orders placed.
- **Add Customer**: Allows users to add new customers.
- **View Customers**: Displays a list of all registered customers.
- **Sales Report**: Generates a report of sales transactions.
- **Inventory Report**: Provides an overview of the inventory status.

## Project Structure

The project directory contains the following files:

- `add_customer.php`: Interface for adding new customers.
- `add_customer_action.php`: Handles the action of adding a new customer.
- `add_product.php`: Interface for adding new products.
- `add_product_action.php`: Handles the action of adding a new product.
- `create_order.php`: Interface for creating new orders.
- `create_order_action.php`: Handles the action of creating a new order.
- `db.txt`: Placeholder file (not used in the provided code).
- `index.php`: The home page of the application.
- `inventory_report.php`: Generates an inventory report.
- `sales_report.php`: Generates a sales report.
- `view_customers.php`: Interface for viewing all customers.
- `view_orders.php`: Interface for viewing all orders.
- `view_products.php`: Interface for viewing all products.

## Getting Started

### Prerequisites

- PHP (Version 7 or above)
- Oracle Database
- Web Server (e.g., Apache or Nginx)

### Setup

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/pos-management-system.git
   cd pos-management-system
   ```

2. **Configure Database**

   Update the `connection for php` files with your Oracle database connection details:

   ```php
   <?php
   // database.php
   try {
       $conn = new PDO('oci:dbname=//localhost:1521/xe', 'system', 'your_password');
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       echo "Error: " . $e->getMessage();
   }
   ?>
   ```

3. **Deploy the Application**

   - Place the project files in your web server's root directory.
   - Access the application through your web browser at `http://localhost/pos-management-system`.

## Usage

- **Home Page**: Navigate to `index.php` to view the home page.
- **Add Product**: Go to `add_product.php` to add a new product.
- **View Products**: Visit `view_products.php` to view all products.
- **Create Order**: Access `create_order.php` to create new orders.
- **View Orders**: Use `view_orders.php` to view all orders.
- **Add Customer**: Go to `add_customer.php` to add a new customer.
- **View Customers**: Visit `view_customers.php` to view all customers.
- **Sales Report**: Generate sales reports via `sales_report.php`.
- **Inventory Report**: Generate inventory reports via `inventory_report.php`.

## Contributing

Feel free to fork the repository and submit pull requests with improvements or bug fixes. Contributions are welcome!

## Contact

For any inquiries or feedback, please reach out to [Zaki Dhiblaawe](mailto:zakidhiblaawe10@gmail.com).
