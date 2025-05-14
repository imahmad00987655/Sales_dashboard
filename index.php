<?php
// Initialize the session
session_start();

// Include database configuration
include_once 'config/database.php';

// Redirect to login page if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: login.php');
    exit;
}

// Get current user data
$userId = $_SESSION['id'] ?? 0;
$username = $_SESSION['username'] ?? 'Guest';

// Include header
include_once 'includes/header.php';
?>

<!-- Dashboard content -->
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <?php include_once 'includes/sidebar.php'; ?>
    
    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Topbar -->
        <?php include_once 'includes/topbar.php'; ?>
        
        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Welcome Message -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Welcome back, <?php echo htmlspecialchars($username); ?>!</h1>
                <p class="text-gray-600">Here's what's happening with your projects today.</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <?php include_once 'components/stats-cards.php'; ?>
            </div>
            
            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Revenue Chart -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Revenue Overview</h2>
                    <div class="h-80">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                
                <!-- User Activity Chart -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">User Activity</h2>
                    <div class="h-80">
                        <canvas id="userActivityChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Additional Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Sales by Category Chart -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Sales by Category</h2>
                    <div class="h-64">
                        <canvas id="categorySalesChart"></canvas>
                    </div>
                </div>
                
                <!-- Geographic Distribution -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Geographic Distribution</h2>
                    <div class="h-64">
                        <canvas id="geoDistributionChart"></canvas>
                    </div>
                </div>
                
                <!-- Conversion Funnel -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Conversion Funnel</h2>
                    <div class="h-64">
                        <canvas id="conversionFunnelChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Data Table Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Recent Transactions</h2>
                    
                    <!-- Filter Controls -->
                    <div class="flex space-x-2">
                        <select id="statusFilter" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">All Statuses</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        
                        <select id="dateFilter" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="7">Last 7 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="365">Last Year</option>
                        </select>
                        
                        <button id="exportBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm">
                            Export
                        </button>
                    </div>
                </div>
                
                <!-- Data Table -->
                <div class="overflow-x-auto">
                    <table id="transactionsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="transactionsBody">
                            <!-- Data will be loaded here via AJAX -->
                        </tbody>
                    </table>
                    
                    <!-- Pagination -->
                    <div class="flex items-center justify-between py-3">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <button id="prevPageMobile" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                            <button id="nextPageMobile" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</button>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing <span id="startRecord">1</span> to <span id="endRecord">10</span> of <span id="totalRecords">--</span> results
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination" id="pagination">
                                    <!-- Pagination will be generated here -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Drill-down Modal -->
<div id="drillDownModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800" id="modalTitle">Detailed Analysis</h3>
            <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="modalContent" class="mt-2">
            <!-- Drill-down chart will be rendered here -->
            <div class="h-96">
                <canvas id="drillDownChart"></canvas>
            </div>
            
            <!-- Drill-down data table -->
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr id="drillDownTableHead">
                            <!-- Headers will be dynamically generated -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="drillDownTableBody">
                        <!-- Data will be dynamically generated -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?> 