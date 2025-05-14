<?php
require_once 'includes/auth_check.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>

<div class="ml-64 p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Order Management</h1>
        <div class="flex space-x-4">
            <button onclick="exportOrders()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export Orders
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" id="searchInput" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search orders...">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="statusFilter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                <select id="dateFilter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="year">This Year</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                <select id="paymentFilter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Payments</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="ordersTableBody">
                    <!-- Orders will be loaded here via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing <span id="showingFrom">1</span> to <span id="showingTo">10</span> of <span id="totalItems">0</span> orders
        </div>
        <div class="flex space-x-2">
            <button id="prevPage" class="px-3 py-1 border rounded-lg hover:bg-gray-100 disabled:opacity-50">Previous</button>
            <button id="nextPage" class="px-3 py-1 border rounded-lg hover:bg-gray-100 disabled:opacity-50">Next</button>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-4xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Order Details</h2>
            <button onclick="closeOrderModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">Order Information</h3>
                <div class="space-y-2">
                    <p><span class="font-medium">Order ID:</span> <span id="orderId"></span></p>
                    <p><span class="font-medium">Date:</span> <span id="orderDate"></span></p>
                    <p><span class="font-medium">Status:</span> <span id="orderStatus"></span></p>
                    <p><span class="font-medium">Payment Status:</span> <span id="paymentStatus"></span></p>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-2">Customer Information</h3>
                <div class="space-y-2">
                    <p><span class="font-medium">Name:</span> <span id="customerName"></span></p>
                    <p><span class="font-medium">Email:</span> <span id="customerEmail"></span></p>
                    <p><span class="font-medium">Phone:</span> <span id="customerPhone"></span></p>
                    <p><span class="font-medium">Address:</span> <span id="customerAddress"></span></p>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="orderItemsBody">
                        <!-- Order items will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6 flex justify-between items-center">
            <div class="text-lg font-semibold">
                Total Amount: $<span id="orderTotal">0.00</span>
            </div>
            <div class="flex space-x-3">
                <button onclick="updateOrderStatus()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Status</button>
                <button onclick="printOrder()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">Print Invoice</button>
            </div>
        </div>
    </div>
</div>

<script>
// Order Management JavaScript
let currentPage = 1;
const itemsPerPage = 10;

// Load orders on page load
document.addEventListener('DOMContentLoaded', function() {
    loadOrders();
    setupEventListeners();
});

function setupEventListeners() {
    // Search and filter event listeners
    document.getElementById('searchInput').addEventListener('input', debounce(loadOrders, 300));
    document.getElementById('statusFilter').addEventListener('change', loadOrders);
    document.getElementById('dateFilter').addEventListener('change', loadOrders);
    document.getElementById('paymentFilter').addEventListener('change', loadOrders);
    
    // Pagination event listeners
    document.getElementById('prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            loadOrders();
        }
    });
    
    document.getElementById('nextPage').addEventListener('click', () => {
        currentPage++;
        loadOrders();
    });
}

function loadOrders() {
    const search = document.getElementById('searchInput').value;
    const status = document.getElementById('statusFilter').value;
    const date = document.getElementById('dateFilter').value;
    const payment = document.getElementById('paymentFilter').value;
    
    // In a real application, this would be an API call
    // For now, we'll use mock data
    const mockOrders = [
        {
            id: "ORD-001",
            customer: {
                name: "John Doe",
                email: "john@example.com",
                phone: "123-456-7890",
                address: "123 Main St, City, Country"
            },
            date: "2024-04-01",
            amount: 299.99,
            status: "processing",
            payment: "paid",
            items: [
                {
                    product: "Smartphone X",
                    quantity: 1,
                    price: 299.99,
                    total: 299.99
                }
            ]
        },
        // Add more mock orders as needed
    ];
    
    // Filter orders based on search and filters
    let filteredOrders = mockOrders.filter(order => {
        const matchesSearch = order.id.toLowerCase().includes(search.toLowerCase()) ||
                            order.customer.name.toLowerCase().includes(search.toLowerCase());
        const matchesStatus = !status || order.status === status;
        const matchesPayment = !payment || order.payment === payment;
        const matchesDate = !date || checkDateRange(order.date, date);
        return matchesSearch && matchesStatus && matchesPayment && matchesDate;
    });
    
    // Update pagination info
    const totalItems = filteredOrders.length;
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
    
    document.getElementById('showingFrom').textContent = startIndex + 1;
    document.getElementById('showingTo').textContent = endIndex;
    document.getElementById('totalItems').textContent = totalItems;
    
    // Update pagination buttons
    document.getElementById('prevPage').disabled = currentPage === 1;
    document.getElementById('nextPage').disabled = currentPage === totalPages;
    
    // Update table
    const tableBody = document.getElementById('ordersTableBody');
    tableBody.innerHTML = '';
    
    filteredOrders.slice(startIndex, endIndex).forEach(order => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">${order.id}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">${order.customer.name}</div>
                <div class="text-sm text-gray-500">${order.customer.email}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">${order.date}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">$${order.amount.toFixed(2)}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusColor(order.status)}">
                    ${order.status}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getPaymentColor(order.payment)}">
                    ${order.payment}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button onclick="viewOrder('${order.id}')" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                <button onclick="updateOrderStatus('${order.id}')" class="text-green-600 hover:text-green-900">Update</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function getStatusColor(status) {
    switch(status) {
        case 'pending': return 'bg-yellow-100 text-yellow-800';
        case 'processing': return 'bg-blue-100 text-blue-800';
        case 'shipped': return 'bg-purple-100 text-purple-800';
        case 'delivered': return 'bg-green-100 text-green-800';
        case 'cancelled': return 'bg-red-100 text-red-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function getPaymentColor(status) {
    switch(status) {
        case 'paid': return 'bg-green-100 text-green-800';
        case 'pending': return 'bg-yellow-100 text-yellow-800';
        case 'failed': return 'bg-red-100 text-red-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function checkDateRange(date, range) {
    const orderDate = new Date(date);
    const today = new Date();
    const diffTime = Math.abs(today - orderDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    switch(range) {
        case 'today':
            return diffDays === 0;
        case 'week':
            return diffDays <= 7;
        case 'month':
            return diffDays <= 30;
        case 'year':
            return diffDays <= 365;
        default:
            return true;
    }
}

function viewOrder(id) {
    // In a real application, this would fetch the order data from the server
    const order = {
        id: id,
        customer: {
            name: "John Doe",
            email: "john@example.com",
            phone: "123-456-7890",
            address: "123 Main St, City, Country"
        },
        date: "2024-04-01",
        status: "processing",
        payment: "paid",
        items: [
            {
                product: "Smartphone X",
                quantity: 1,
                price: 299.99,
                total: 299.99
            }
        ],
        total: 299.99
    };
    
    // Update modal content
    document.getElementById('orderId').textContent = order.id;
    document.getElementById('orderDate').textContent = order.date;
    document.getElementById('orderStatus').textContent = order.status;
    document.getElementById('paymentStatus').textContent = order.payment;
    document.getElementById('customerName').textContent = order.customer.name;
    document.getElementById('customerEmail').textContent = order.customer.email;
    document.getElementById('customerPhone').textContent = order.customer.phone;
    document.getElementById('customerAddress').textContent = order.customer.address;
    document.getElementById('orderTotal').textContent = order.total.toFixed(2);
    
    // Update order items
    const itemsBody = document.getElementById('orderItemsBody');
    itemsBody.innerHTML = '';
    
    order.items.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">${item.product}</td>
            <td class="px-6 py-4 whitespace-nowrap">${item.quantity}</td>
            <td class="px-6 py-4 whitespace-nowrap">$${item.price.toFixed(2)}</td>
            <td class="px-6 py-4 whitespace-nowrap">$${item.total.toFixed(2)}</td>
        `;
        itemsBody.appendChild(row);
    });
    
    // Show modal
    document.getElementById('orderModal').classList.remove('hidden');
    document.getElementById('orderModal').classList.add('flex');
}

function closeOrderModal() {
    document.getElementById('orderModal').classList.add('hidden');
    document.getElementById('orderModal').classList.remove('flex');
}

function updateOrderStatus(id) {
    // In a real application, this would update the order status on the server
    console.log('Updating order status:', id);
    closeOrderModal();
    loadOrders();
}

function printOrder() {
    window.print();
}

function exportOrders() {
    // In a real application, this would export orders to CSV or Excel
    console.log('Exporting orders...');
}

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
</script>

<?php require_once 'includes/footer.php'; ?> 