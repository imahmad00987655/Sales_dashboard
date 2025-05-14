<?php
require_once 'includes/auth_check.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>

<div class="ml-64 p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Customer Management</h1>
        <div class="flex space-x-4">
            <button onclick="exportCustomers()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export Customers
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" id="searchInput" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search customers...">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="statusFilter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Customer Type</label>
                <select id="typeFilter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Types</option>
                    <option value="regular">Regular</option>
                    <option value="premium">Premium</option>
                    <option value="vip">VIP</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
                <select id="dateFilter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Time</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="year">This Year</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="customersTableBody">
                    <!-- Customers will be loaded here via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing <span id="showingFrom">1</span> to <span id="showingTo">10</span> of <span id="totalItems">0</span> customers
        </div>
        <div class="flex space-x-2">
            <button id="prevPage" class="px-3 py-1 border rounded-lg hover:bg-gray-100 disabled:opacity-50">Previous</button>
            <button id="nextPage" class="px-3 py-1 border rounded-lg hover:bg-gray-100 disabled:opacity-50">Next</button>
        </div>
    </div>
</div>

<!-- Customer Details Modal -->
<div id="customerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-4xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Customer Details</h2>
            <button onclick="closeCustomerModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">Personal Information</h3>
                <div class="space-y-2">
                    <p><span class="font-medium">Name:</span> <span id="customerName"></span></p>
                    <p><span class="font-medium">Email:</span> <span id="customerEmail"></span></p>
                    <p><span class="font-medium">Phone:</span> <span id="customerPhone"></span></p>
                    <p><span class="font-medium">Address:</span> <span id="customerAddress"></span></p>
                    <p><span class="font-medium">Join Date:</span> <span id="joinDate"></span></p>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-2">Account Information</h3>
                <div class="space-y-2">
                    <p><span class="font-medium">Customer Type:</span> <span id="customerType"></span></p>
                    <p><span class="font-medium">Status:</span> <span id="customerStatus"></span></p>
                    <p><span class="font-medium">Total Orders:</span> <span id="totalOrders"></span></p>
                    <p><span class="font-medium">Total Spent:</span> $<span id="totalSpent"></span></p>
                    <p><span class="font-medium">Last Order:</span> <span id="lastOrder"></span></p>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Recent Orders</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="customerOrdersBody">
                        <!-- Customer orders will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
            <button onclick="updateCustomerStatus()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Status</button>
            <button onclick="sendMessage()" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Send Message</button>
        </div>
    </div>
</div>

<script>
// Customer Management JavaScript
let currentPage = 1;
const itemsPerPage = 10;

// Load customers on page load
document.addEventListener('DOMContentLoaded', function() {
    loadCustomers();
    setupEventListeners();
});

function setupEventListeners() {
    // Search and filter event listeners
    document.getElementById('searchInput').addEventListener('input', debounce(loadCustomers, 300));
    document.getElementById('statusFilter').addEventListener('change', loadCustomers);
    document.getElementById('typeFilter').addEventListener('change', loadCustomers);
    document.getElementById('dateFilter').addEventListener('change', loadCustomers);
    
    // Pagination event listeners
    document.getElementById('prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            loadCustomers();
        }
    });
    
    document.getElementById('nextPage').addEventListener('click', () => {
        currentPage++;
        loadCustomers();
    });
}

function loadCustomers() {
    const search = document.getElementById('searchInput').value;
    const status = document.getElementById('statusFilter').value;
    const type = document.getElementById('typeFilter').value;
    const date = document.getElementById('dateFilter').value;
    
    // In a real application, this would be an API call
    // For now, we'll use mock data
    const mockCustomers = [
        {
            id: 1,
            name: "John Doe",
            email: "john@example.com",
            phone: "123-456-7890",
            address: "123 Main St, City, Country",
            type: "premium",
            status: "active",
            joinDate: "2024-01-01",
            totalOrders: 15,
            totalSpent: 2999.99,
            lastOrder: "2024-04-01"
        },
        // Add more mock customers as needed
    ];
    
    // Filter customers based on search and filters
    let filteredCustomers = mockCustomers.filter(customer => {
        const matchesSearch = customer.name.toLowerCase().includes(search.toLowerCase()) ||
                            customer.email.toLowerCase().includes(search.toLowerCase());
        const matchesStatus = !status || customer.status === status;
        const matchesType = !type || customer.type === type;
        const matchesDate = !date || checkDateRange(customer.joinDate, date);
        return matchesSearch && matchesStatus && matchesType && matchesDate;
    });
    
    // Update pagination info
    const totalItems = filteredCustomers.length;
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
    const tableBody = document.getElementById('customersTableBody');
    tableBody.innerHTML = '';
    
    filteredCustomers.slice(startIndex, endIndex).forEach(customer => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">${customer.name}</div>
                        <div class="text-sm text-gray-500">ID: ${customer.id}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">${customer.email}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">${customer.phone}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getTypeColor(customer.type)}">
                    ${customer.type}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">${customer.totalOrders}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusColor(customer.status)}">
                    ${customer.status}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button onclick="viewCustomer(${customer.id})" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                <button onclick="editCustomer(${customer.id})" class="text-green-600 hover:text-green-900">Edit</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function getTypeColor(type) {
    switch(type) {
        case 'regular': return 'bg-gray-100 text-gray-800';
        case 'premium': return 'bg-blue-100 text-blue-800';
        case 'vip': return 'bg-purple-100 text-purple-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function getStatusColor(status) {
    switch(status) {
        case 'active': return 'bg-green-100 text-green-800';
        case 'inactive': return 'bg-red-100 text-red-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function checkDateRange(date, range) {
    const joinDate = new Date(date);
    const today = new Date();
    const diffTime = Math.abs(today - joinDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    switch(range) {
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

function viewCustomer(id) {
    // In a real application, this would fetch the customer data from the server
    const customer = {
        id: id,
        name: "John Doe",
        email: "john@example.com",
        phone: "123-456-7890",
        address: "123 Main St, City, Country",
        type: "premium",
        status: "active",
        joinDate: "2024-01-01",
        totalOrders: 15,
        totalSpent: 2999.99,
        lastOrder: "2024-04-01",
        recentOrders: [
            {
                id: "ORD-001",
                date: "2024-04-01",
                amount: 299.99,
                status: "processing"
            },
            {
                id: "ORD-002",
                date: "2024-03-15",
                amount: 199.99,
                status: "delivered"
            }
        ]
    };
    
    // Update modal content
    document.getElementById('customerName').textContent = customer.name;
    document.getElementById('customerEmail').textContent = customer.email;
    document.getElementById('customerPhone').textContent = customer.phone;
    document.getElementById('customerAddress').textContent = customer.address;
    document.getElementById('joinDate').textContent = customer.joinDate;
    document.getElementById('customerType').textContent = customer.type;
    document.getElementById('customerStatus').textContent = customer.status;
    document.getElementById('totalOrders').textContent = customer.totalOrders;
    document.getElementById('totalSpent').textContent = customer.totalSpent.toFixed(2);
    document.getElementById('lastOrder').textContent = customer.lastOrder;
    
    // Update recent orders
    const ordersBody = document.getElementById('customerOrdersBody');
    ordersBody.innerHTML = '';
    
    customer.recentOrders.forEach(order => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">${order.id}</td>
            <td class="px-6 py-4 whitespace-nowrap">${order.date}</td>
            <td class="px-6 py-4 whitespace-nowrap">$${order.amount.toFixed(2)}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusColor(order.status)}">
                    ${order.status}
                </span>
            </td>
        `;
        ordersBody.appendChild(row);
    });
    
    // Show modal
    document.getElementById('customerModal').classList.remove('hidden');
    document.getElementById('customerModal').classList.add('flex');
}

function closeCustomerModal() {
    document.getElementById('customerModal').classList.add('hidden');
    document.getElementById('customerModal').classList.remove('flex');
}

function updateCustomerStatus() {
    // In a real application, this would update the customer status on the server
    console.log('Updating customer status...');
    closeCustomerModal();
    loadCustomers();
}

function editCustomer(id) {
    // In a real application, this would open an edit form
    console.log('Editing customer:', id);
}

function sendMessage() {
    // In a real application, this would open a message form
    console.log('Sending message to customer...');
}

function exportCustomers() {
    // In a real application, this would export customers to CSV or Excel
    console.log('Exporting customers...');
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