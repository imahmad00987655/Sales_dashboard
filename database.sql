-- Create the database
CREATE DATABASE IF NOT EXISTS admin_dashboard;
USE admin_dashboard;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role ENUM('admin', 'manager', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Customers table
CREATE TABLE IF NOT EXISTS customers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    city VARCHAR(50),
    country VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Products table
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(50),
    stock_quantity INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

-- Order items table
CREATE TABLE IF NOT EXISTS order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Transactions table
CREATE TABLE IF NOT EXISTS transactions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50),
    status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- Insert sample data

-- Sample users
INSERT INTO users (username, password, email, role) VALUES
('admin', '$2y$10$8K1p/a0dR1x0M1mF3IqQeO1VqK1x0M1mF3IqQeO1VqK1x0M1mF3I', 'admin@example.com', 'admin'),
('manager', '$2y$10$8K1p/a0dR1x0M1mF3IqQeO1VqK1x0M1mF3IqQeO1VqK1x0M1mF3I', 'manager@example.com', 'manager'),
('user', '$2y$10$8K1p/a0dR1x0M1mF3IqQeO1VqK1x0M1mF3IqQeO1VqK1x0M1mF3I', 'user@example.com', 'user');

-- Sample customers
INSERT INTO customers (name, email, phone, address, city, country) VALUES
('John Doe', 'john@example.com', '+1234567890', '123 Main St', 'New York', 'USA'),
('Jane Smith', 'jane@example.com', '+1987654321', '456 Oak Ave', 'London', 'UK'),
('Bob Johnson', 'bob@example.com', '+1122334455', '789 Pine Rd', 'Sydney', 'Australia');

-- Sample products
INSERT INTO products (name, description, price, category, stock_quantity) VALUES
('Laptop Pro', 'High-performance laptop', 1299.99, 'Electronics', 50),
('Smartphone X', 'Latest smartphone model', 899.99, 'Electronics', 100),
('Office Chair', 'Ergonomic office chair', 199.99, 'Furniture', 75),
('Desk Lamp', 'LED desk lamp', 49.99, 'Furniture', 200);

-- Sample orders
INSERT INTO orders (customer_id, total_amount, status) VALUES
(1, 2199.98, 'completed'),
(2, 899.99, 'completed'),
(3, 249.98, 'pending');

-- Sample order items
INSERT INTO order_items (order_id, product_id, quantity, price) VALUES
(1, 1, 1, 1299.99),
(1, 2, 1, 899.99),
(2, 2, 1, 899.99),
(3, 3, 1, 199.99),
(3, 4, 1, 49.99);

-- Sample transactions
INSERT INTO transactions (order_id, amount, payment_method, status) VALUES
(1, 2199.98, 'credit_card', 'completed'),
(2, 899.99, 'paypal', 'completed'),
(3, 249.98, 'credit_card', 'pending'); 