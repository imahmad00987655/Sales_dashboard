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
        
        <!-- Analytics Content -->
        <main class="p-6">
            <!-- Page Title -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Analytics Dashboard</h1>
                <p class="text-gray-600">Detailed metrics and performance analysis</p>
            </div>
            
            <!-- Time Period Filter -->
            <div class="mb-6 bg-white p-4 rounded-lg shadow-md">
                <div class="flex flex-wrap items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2 md:mb-0">Time Period</h2>
                    <div class="flex space-x-2">
                        <button id="timeDay" class="px-4 py-2 text-sm rounded-md bg-indigo-100 text-indigo-700 font-medium hover:bg-indigo-200 transition-colors">Day</button>
                        <button id="timeWeek" class="px-4 py-2 text-sm rounded-md bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Week</button>
                        <button id="timeMonth" class="px-4 py-2 text-sm rounded-md bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Month</button>
                        <button id="timeYear" class="px-4 py-2 text-sm rounded-md bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Year</button>
                        <button id="timeCustom" class="px-4 py-2 text-sm rounded-md bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Custom</button>
                    </div>
                </div>
                
                <!-- Custom Date Range (Hidden by default) -->
                <div id="customDateRange" class="mt-4 hidden">
                    <div class="flex flex-wrap gap-4">
                        <div>
                            <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                            <input type="date" id="startDate" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="endDate" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                            <input type="date" id="endDate" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="flex items-end">
                            <button id="applyDateRange" class="px-4 py-2 text-sm bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 transition-colors">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Users</p>
                            <p class="text-2xl font-bold mt-1">2,453</p>
                            <p class="text-sm text-green-600 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                7.2% increase
                            </p>
                        </div>
                        <div class="p-3 bg-indigo-100 rounded-full">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Sessions</p>
                            <p class="text-2xl font-bold mt-1">12,821</p>
                            <p class="text-sm text-green-600 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                12.3% increase
                            </p>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Avg. Session Duration</p>
                            <p class="text-2xl font-bold mt-1">3m 42s</p>
                            <p class="text-sm text-red-600 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                2.1% decrease
                            </p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Bounce Rate</p>
                            <p class="text-2xl font-bold mt-1">42.3%</p>
                            <p class="text-sm text-green-600 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                3.5% improvement
                            </p>
                        </div>
                        <div class="p-3 bg-yellow-100 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Traffic Analytics Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Traffic Overview</h2>
                        <div class="flex space-x-2">
                            <button class="text-xs px-2 py-1 rounded bg-indigo-100 text-indigo-700">Users</button>
                            <button class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-700">Sessions</button>
                            <button class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-700">Conversion</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="trafficChart"></canvas>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Traffic Sources</h2>
                    <div class="h-80">
                        <canvas id="trafficSourcesChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- User Demographics & Devices -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Demographics</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-600 mb-4">Age Groups</h3>
                            <div class="h-64">
                                <canvas id="ageChart"></canvas>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-600 mb-4">Gender</h3>
                            <div class="h-64">
                                <canvas id="genderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Devices & Browsers</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-600 mb-4">Devices</h3>
                            <div class="h-64">
                                <canvas id="devicesChart"></canvas>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-600 mb-4">Browsers</h3>
                            <div class="h-64">
                                <canvas id="browsersChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Page Performance -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Page Performance</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Page</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avg. Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bounce Rate</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Conversion</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">/home</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5,240</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2m 12s</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">32.4%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8.7%</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">/products</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3,890</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3m 45s</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25.1%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12.3%</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">/checkout</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1,456</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4m 32s</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15.8%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">45.2%</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">/blog</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2,150</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5m 18s</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">38.7%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5.1%</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">/contact</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">980</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1m 54s</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">42.3%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3.7%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Time period filter functionality
    const timeButtons = document.querySelectorAll('#timeDay, #timeWeek, #timeMonth, #timeYear, #timeCustom');
    const customDateRange = document.getElementById('customDateRange');
    
    timeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Reset all buttons
            timeButtons.forEach(btn => {
                btn.classList.remove('bg-indigo-100', 'text-indigo-700');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            
            // Highlight selected button
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-indigo-100', 'text-indigo-700');
            
            // Show/hide custom date range
            if (this.id === 'timeCustom') {
                customDateRange.classList.remove('hidden');
            } else {
                customDateRange.classList.add('hidden');
                // Here you'd update charts based on selected time period
                updateCharts(this.id.replace('time', '').toLowerCase());
            }
        });
    });
    
    document.getElementById('applyDateRange').addEventListener('click', function() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        if (startDate && endDate) {
            // Update charts with custom date range
            updateCharts('custom', { start: startDate, end: endDate });
        }
    });
    
    // Initialize charts
    initializeCharts();
});

function initializeCharts() {
    // Traffic Overview Chart
    const trafficCtx = document.getElementById('trafficChart').getContext('2d');
    const trafficChart = new Chart(trafficCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Users',
                data: [1200, 1500, 1800, 1600, 2200, 2400, 2800, 3100, 2900, 3300, 3500, 3800],
                borderColor: 'rgba(79, 70, 229, 1)',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
    
    // Traffic Sources Chart
    const sourcesCtx = document.getElementById('trafficSourcesChart').getContext('2d');
    const sourcesChart = new Chart(sourcesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Direct', 'Organic Search', 'Referral', 'Social', 'Email', 'Other'],
            datasets: [{
                data: [30, 35, 15, 10, 8, 2],
                backgroundColor: [
                    'rgba(79, 70, 229, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(107, 114, 128, 0.8)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });
    
    // Age Chart
    const ageCtx = document.getElementById('ageChart').getContext('2d');
    const ageChart = new Chart(ageCtx, {
        type: 'bar',
        data: {
            labels: ['18-24', '25-34', '35-44', '45-54', '55-64', '65+'],
            datasets: [{
                label: 'Users by Age',
                data: [15, 30, 25, 18, 8, 4],
                backgroundColor: 'rgba(79, 70, 229, 0.8)',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            }
        }
    });
    
    // Gender Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(genderCtx, {
        type: 'pie',
        data: {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
                data: [48, 50, 2],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                    'rgba(107, 114, 128, 0.8)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
    
    // Devices Chart
    const devicesCtx = document.getElementById('devicesChart').getContext('2d');
    const devicesChart = new Chart(devicesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Mobile', 'Desktop', 'Tablet'],
            datasets: [{
                data: [62, 30, 8],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(79, 70, 229, 0.8)',
                    'rgba(245, 158, 11, 0.8)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '60%'
        }
    });
    
    // Browsers Chart
    const browsersCtx = document.getElementById('browsersChart').getContext('2d');
    const browsersChart = new Chart(browsersCtx, {
        type: 'bar',
        data: {
            labels: ['Chrome', 'Safari', 'Firefox', 'Edge', 'Others'],
            datasets: [{
                label: 'Usage',
                data: [68, 15, 8, 7, 2],
                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            }
        }
    });
}

function updateCharts(period, customDates) {
    // This function would update all charts based on the selected time period
    console.log(`Updating charts for period: ${period}`);
    if (period === 'custom' && customDates) {
        console.log(`Custom date range: ${customDates.start} to ${customDates.end}`);
    }
    
    // In a real implementation, you would fetch data from the server
    // and update each chart with the new data
}
</script>

<?php include_once 'includes/footer.php'; ?> 