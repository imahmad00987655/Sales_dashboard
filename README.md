# Sales Dashboard

A modern, responsive web-based sales dashboard built with PHP, featuring real-time analytics, data visualization, and comprehensive sales management tools.

## Features

- 📊 Interactive Dashboard with Key Performance Indicators
- 📈 Real-time Analytics and Data Visualization
- 👥 Customer Management
- 📦 Product Management
- 🛍️ Order Processing
- 🔄 Transaction History
- 📱 Responsive Design
- 🔒 Secure Authentication System

## Prerequisites

- PHP 8.0 or higher
- MySQL Database (optional - falls back to mock data if not available)
- Web Server (Apache/Nginx) or PHP's built-in development server
- mysqli PHP extension (optional - for database connectivity)
- XAMPP (recommended for easy setup)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/imahmad00987655/Sales_dashboard
cd sales-dashboard
```

2. Configure the database:
   - Start XAMPP and ensure MySQL service is running
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `admin_dashboard`
   - Import the `database.sql` file from the project root
   - Update database credentials in `config/database.php`:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'root');
     define('DB_PASSWORD', '');
     define('DB_NAME', 'admin_dashboard');
     ```

3. Start the development server:
```bash
php -S localhost:8000
```

4. Access the application:
   - Open your web browser
   - Navigate to `http://localhost:8000`
   - Login with your credentials:
     - Username: admin
     - Password: admin123

## Project Structure

```
sales-dashboard/
├── api/              # API endpoints
├── components/       # Reusable UI components
├── config/          # Configuration files
├── includes/        # Common PHP includes
├── analytics.php    # Analytics dashboard
├── customers.php    # Customer management
├── index.php        # Main dashboard
├── login.php        # Authentication
├── orders.php       # Order management
├── products.php     # Product management
└── settings.php     # Application settings
```

## Features in Detail

### Dashboard
- Overview of key metrics
- Revenue charts
- User activity tracking
- Sales by category
- Geographic distribution
- Conversion funnel analysis

### Customer Management
- Customer profiles
- Purchase history
- Contact information
- Customer segmentation

### Order Processing
- Order tracking
- Status updates
- Transaction history
- Export functionality

### Analytics
- Real-time data visualization
- Custom date range selection
- Export capabilities
- Drill-down analysis

## Security

- Session-based authentication
- SQL injection prevention
- XSS protection
- Secure password handling

## Development

The project uses a modular structure for easy maintenance and scalability. Key components include:

- PHP for backend logic
- MySQL for data storage (optional)
- Modern UI with responsive design
- Chart.js for data visualization
- AJAX for real-time updates

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please open an issue in the GitHub repository or contact the development team. 