<?php
// Include database configuration
include_once '../config/database.php';

// Get filter parameters from request
$statusFilter = $_GET['status'] ?? '';
$daysFilter = $_GET['days'] ?? '30';

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="transactions_export_' . date('Y-m-d') . '.csv"');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, ['ID', 'Customer', 'Date', 'Amount', 'Status']);

// Mock transactions data for demonstration
// Same as in transactions.php
$mockTransactions = [
    [
        'id' => 'TRX-1234',
        'customer' => 'John Doe',
        'date' => '2023-05-10',
        'amount' => '$1,250.00',
        'status' => 'completed'
    ],
    [
        'id' => 'TRX-1235',
        'customer' => 'Jane Smith',
        'date' => '2023-05-09',
        'amount' => '$890.50',
        'status' => 'pending'
    ],
    [
        'id' => 'TRX-1236',
        'customer' => 'Robert Johnson',
        'date' => '2023-05-08',
        'amount' => '$2,400.00',
        'status' => 'completed'
    ],
    [
        'id' => 'TRX-1237',
        'customer' => 'Emily Davis',
        'date' => '2023-05-07',
        'amount' => '$150.75',
        'status' => 'cancelled'
    ],
    [
        'id' => 'TRX-1238',
        'customer' => 'Michael Wilson',
        'date' => '2023-05-06',
        'amount' => '$3,542.25',
        'status' => 'completed'
    ],
    [
        'id' => 'TRX-1239',
        'customer' => 'Sarah Brown',
        'date' => '2023-05-05',
        'amount' => '$720.00',
        'status' => 'pending'
    ],
    [
        'id' => 'TRX-1240',
        'customer' => 'David Taylor',
        'date' => '2023-05-04',
        'amount' => '$1,800.50',
        'status' => 'completed'
    ],
    [
        'id' => 'TRX-1241',
        'customer' => 'Lisa Anderson',
        'date' => '2023-05-03',
        'amount' => '$950.25',
        'status' => 'pending'
    ],
    [
        'id' => 'TRX-1242',
        'customer' => 'James Martinez',
        'date' => '2023-05-02',
        'amount' => '$2,100.00',
        'status' => 'cancelled'
    ],
    [
        'id' => 'TRX-1243',
        'customer' => 'Linda Robinson',
        'date' => '2023-05-01',
        'amount' => '$1,375.50',
        'status' => 'completed'
    ]
];

// Apply filters
if (!empty($statusFilter)) {
    $mockTransactions = array_filter($mockTransactions, function($transaction) use ($statusFilter) {
        return $transaction['status'] === $statusFilter;
    });
}

// If connected to a real database, we would query the database instead
if (isset($GLOBALS['db_connected']) && $GLOBALS['db_connected']) {
    try {
        // Prepare the base query
        $sql = "SELECT id, customer_name as customer, DATE_FORMAT(transaction_date, '%Y-%m-%d') as date, 
                CONCAT('$', FORMAT(amount, 2)) as amount, status
                FROM transactions
                WHERE transaction_date >= DATE_SUB(NOW(), INTERVAL ? DAY)";
        
        // Add status filter if provided
        $params = [$daysFilter];
        if (!empty($statusFilter)) {
            $sql .= " AND status = ?";
            $params[] = $statusFilter;
        }
        
        // Add sorting
        $sql .= " ORDER BY transaction_date DESC";
        
        // Prepare and execute the statement
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $mysqli->error);
        }
        
        // Bind parameters
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        
        // Execute query
        $stmt->execute();
        
        // Get result
        $result = $stmt->get_result();
        
        // Fetch all transactions and output as CSV
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [
                $row['id'],
                $row['customer'],
                $row['date'],
                $row['amount'],
                $row['status']
            ]);
        }
        
        // Close statement
        $stmt->close();
        exit;
    } catch (Exception $e) {
        // Log the error
        error_log("Database query error: " . $e->getMessage());
        // Continue with mock data
    }
}

// Output mock data
foreach ($mockTransactions as $transaction) {
    fputcsv($output, [
        $transaction['id'],
        $transaction['customer'],
        $transaction['date'],
        $transaction['amount'],
        $transaction['status']
    ]);
} 