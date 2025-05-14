    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize charts when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Overview Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 26000, 29000, 32000, 40000, 48000],
                        backgroundColor: 'rgba(79, 70, 229, 0.2)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(79, 70, 229, 1)',
                        tension: 0.4
                    }, {
                        label: 'Expenses',
                        data: [8000, 12000, 10000, 15000, 14000, 18000, 17000, 16000, 17000, 19000, 22000, 24000],
                        backgroundColor: 'rgba(239, 68, 68, 0.2)',
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(239, 68, 68, 1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        },
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // User Activity Chart
            const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
            const userActivityChart = new Chart(userActivityCtx, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Active Users',
                        data: [420, 380, 450, 520, 490, 380, 320],
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Sales by Category Chart
            const categorySalesCtx = document.getElementById('categorySalesChart').getContext('2d');
            const categorySalesChart = new Chart(categorySalesCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Electronics', 'Clothing', 'Food', 'Books', 'Other'],
                    datasets: [{
                        data: [35, 25, 20, 15, 5],
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
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
                            position: 'right',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((acc, data) => acc + data, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${percentage}% (${value})`;
                                }
                            }
                        }
                    }
                }
            });

            // Geographic Distribution Chart
            const geoDistributionCtx = document.getElementById('geoDistributionChart').getContext('2d');
            const geoDistributionChart = new Chart(geoDistributionCtx, {
                type: 'polarArea',
                data: {
                    labels: ['North America', 'Europe', 'Asia', 'Australia', 'Africa', 'South America'],
                    datasets: [{
                        data: [42, 28, 18, 7, 3, 2],
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.7)',
                            'rgba(16, 185, 129, 0.7)',
                            'rgba(245, 158, 11, 0.7)',
                            'rgba(239, 68, 68, 0.7)',
                            'rgba(107, 114, 128, 0.7)',
                            'rgba(124, 58, 237, 0.7)'
                        ],
                        borderWidth: 1,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                        }
                    }
                }
            });

            // Conversion Funnel Chart
            const conversionFunnelCtx = document.getElementById('conversionFunnelChart').getContext('2d');
            const conversionFunnelChart = new Chart(conversionFunnelCtx, {
                type: 'bar',
                data: {
                    labels: ['Visitors', 'Product Views', 'Add to Cart', 'Checkout', 'Purchase'],
                    datasets: [{
                        label: 'Conversion Steps',
                        data: [1000, 750, 500, 300, 200],
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(239, 68, 68, 0.8)'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Initialize Data Table
            $('#transactionsTable').DataTable({
                paging: false,
                searching: false,
                info: false,
                ajax: {
                    url: 'api/transactions.php',
                    dataSrc: ''
                },
                columns: [
                    { data: 'id' },
                    { data: 'customer' },
                    { data: 'date' },
                    { data: 'amount' },
                    { 
                        data: 'status',
                        render: function(data) {
                            let badgeClass = 'status-pending';
                            if (data === 'completed') {
                                badgeClass = 'status-completed';
                            } else if (data === 'cancelled') {
                                badgeClass = 'status-cancelled';
                            }
                            return `<span class="status-badge ${badgeClass}">${data.charAt(0).toUpperCase() + data.slice(1)}</span>`;
                        }
                    },
                    {
                        data: null,
                        render: function() {
                            return `
                                <div class="flex space-x-2">
                                    <button class="view-details text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="edit-transaction text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            `;
                        }
                    }
                ]
            });

            // Handle chart drill down
            document.querySelectorAll('canvas').forEach(canvas => {
                canvas.addEventListener('click', function(evt) {
                    const activePoints = Chart.getChart(this.id).getElementsAtEventForMode(evt, 'nearest', { intersect: true }, false);
                    
                    if (activePoints.length > 0) {
                        const chartData = activePoints[0];
                        const label = Chart.getChart(this.id).data.labels[chartData.index];
                        const value = Chart.getChart(this.id).data.datasets[chartData.datasetIndex].data[chartData.index];
                        
                        // Show drill down modal
                        showDrillDownModal(this.id, label, value);
                    }
                });
            });

            // Function to show drill down modal
            function showDrillDownModal(chartId, label, value) {
                const modal = document.getElementById('drillDownModal');
                const modalTitle = document.getElementById('modalTitle');
                const drillDownChartCtx = document.getElementById('drillDownChart').getContext('2d');
                
                // Set modal title
                modalTitle.textContent = `Detailed Analysis: ${label}`;
                
                // Show modal
                modal.classList.remove('hidden');
                
                // Generate data based on the selected chart segment
                let chartConfig;
                
                if (chartId === 'revenueChart') {
                    chartConfig = {
                        type: 'line',
                        data: {
                            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                            datasets: [{
                                label: `${label} Breakdown`,
                                data: generateRandomData(4, value * 0.2, value * 0.3),
                                backgroundColor: 'rgba(79, 70, 229, 0.2)',
                                borderColor: 'rgba(79, 70, 229, 1)',
                                borderWidth: 2,
                                tension: 0.4
                            }]
                        }
                    };
                    
                    // Generate table data
                    generateTableData(['Week', 'Revenue', 'Growth'], [
                        ['Week 1', formatCurrency(chartConfig.data.datasets[0].data[0]), '+5%'],
                        ['Week 2', formatCurrency(chartConfig.data.datasets[0].data[1]), '+3%'],
                        ['Week 3', formatCurrency(chartConfig.data.datasets[0].data[2]), '+7%'],
                        ['Week 4', formatCurrency(chartConfig.data.datasets[0].data[3]), '+2%']
                    ]);
                    
                } else if (chartId === 'categorySalesChart') {
                    chartConfig = {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets: [{
                                label: `${label} Sales`,
                                data: generateRandomData(6, value * 0.7, value * 1.3),
                                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                            }]
                        }
                    };
                    
                    // Generate table data
                    generateTableData(['Month', 'Units Sold', 'Revenue'], [
                        ['January', Math.round(chartConfig.data.datasets[0].data[0] / 10), formatCurrency(chartConfig.data.datasets[0].data[0] * 100)],
                        ['February', Math.round(chartConfig.data.datasets[0].data[1] / 10), formatCurrency(chartConfig.data.datasets[0].data[1] * 100)],
                        ['March', Math.round(chartConfig.data.datasets[0].data[2] / 10), formatCurrency(chartConfig.data.datasets[0].data[2] * 100)],
                        ['April', Math.round(chartConfig.data.datasets[0].data[3] / 10), formatCurrency(chartConfig.data.datasets[0].data[3] * 100)],
                        ['May', Math.round(chartConfig.data.datasets[0].data[4] / 10), formatCurrency(chartConfig.data.datasets[0].data[4] * 100)],
                        ['June', Math.round(chartConfig.data.datasets[0].data[5] / 10), formatCurrency(chartConfig.data.datasets[0].data[5] * 100)]
                    ]);
                    
                } else if (chartId === 'geoDistributionChart') {
                    chartConfig = {
                        type: 'pie',
                        data: {
                            labels: ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'],
                            datasets: [{
                                label: `Top Cities in ${label}`,
                                data: generateRandomData(5, value * 0.1, value * 0.25),
                                backgroundColor: [
                                    'rgba(79, 70, 229, 0.7)',
                                    'rgba(16, 185, 129, 0.7)',
                                    'rgba(245, 158, 11, 0.7)',
                                    'rgba(239, 68, 68, 0.7)',
                                    'rgba(107, 114, 128, 0.7)'
                                ],
                            }]
                        }
                    };
                    
                    // Generate table data
                    const total = chartConfig.data.datasets[0].data.reduce((a, b) => a + b, 0);
                    generateTableData(['City', 'Customers', 'Percentage'], [
                        ['New York', chartConfig.data.datasets[0].data[0], ((chartConfig.data.datasets[0].data[0] / total) * 100).toFixed(1) + '%'],
                        ['Los Angeles', chartConfig.data.datasets[0].data[1], ((chartConfig.data.datasets[0].data[1] / total) * 100).toFixed(1) + '%'],
                        ['Chicago', chartConfig.data.datasets[0].data[2], ((chartConfig.data.datasets[0].data[2] / total) * 100).toFixed(1) + '%'],
                        ['Houston', chartConfig.data.datasets[0].data[3], ((chartConfig.data.datasets[0].data[3] / total) * 100).toFixed(1) + '%'],
                        ['Phoenix', chartConfig.data.datasets[0].data[4], ((chartConfig.data.datasets[0].data[4] / total) * 100).toFixed(1) + '%']
                    ]);
                    
                } else {
                    // Default chart for other charts
                    chartConfig = {
                        type: 'bar',
                        data: {
                            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                            datasets: [{
                                label: `${label} Details`,
                                data: generateRandomData(5, value * 0.15, value * 0.25),
                                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                            }]
                        }
                    };
                    
                    // Generate table data
                    generateTableData(['Day', 'Value', 'Change'], [
                        ['Monday', chartConfig.data.datasets[0].data[0], '+' + (Math.random() * 5).toFixed(1) + '%'],
                        ['Tuesday', chartConfig.data.datasets[0].data[1], '+' + (Math.random() * 5).toFixed(1) + '%'],
                        ['Wednesday', chartConfig.data.datasets[0].data[2], '+' + (Math.random() * 5).toFixed(1) + '%'],
                        ['Thursday', chartConfig.data.datasets[0].data[3], '+' + (Math.random() * 5).toFixed(1) + '%'],
                        ['Friday', chartConfig.data.datasets[0].data[4], '+' + (Math.random() * 5).toFixed(1) + '%']
                    ]);
                }
                
                // Add common options
                chartConfig.options = {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                };
                
                // Create or update drill down chart
                if (window.drillDownChart) {
                    window.drillDownChart.destroy();
                }
                window.drillDownChart = new Chart(drillDownChartCtx, chartConfig);
            }
            
            // Generate random data for drill down charts
            function generateRandomData(count, min, max) {
                const data = [];
                for (let i = 0; i < count; i++) {
                    data.push(Math.floor(Math.random() * (max - min) + min));
                }
                return data;
            }
            
            // Format currency for tables
            function formatCurrency(value) {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
            }
            
            // Generate table for drill down modal
            function generateTableData(headers, rows) {
                const tableHead = document.getElementById('drillDownTableHead');
                const tableBody = document.getElementById('drillDownTableBody');
                
                // Clear previous content
                tableHead.innerHTML = '';
                tableBody.innerHTML = '';
                
                // Add headers
                headers.forEach(header => {
                    const th = document.createElement('th');
                    th.scope = 'col';
                    th.className = 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider';
                    th.textContent = header;
                    tableHead.appendChild(th);
                });
                
                // Add rows
                rows.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-gray-50';
                    
                    row.forEach((cell, index) => {
                        const td = document.createElement('td');
                        td.className = 'px-6 py-4 whitespace-nowrap text-sm text-gray-500';
                        
                        // Apply different styling for first column
                        if (index === 0) {
                            td.className = 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800';
                        }
                        
                        td.textContent = cell;
                        tr.appendChild(td);
                    });
                    
                    tableBody.appendChild(tr);
                });
            }
            
            // Close drill down modal
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('drillDownModal').classList.add('hidden');
            });
            
            // Handle data filtering
            document.getElementById('statusFilter').addEventListener('change', filterTransactions);
            document.getElementById('dateFilter').addEventListener('change', filterTransactions);
            
            function filterTransactions() {
                const statusFilter = document.getElementById('statusFilter').value;
                const dateFilter = document.getElementById('dateFilter').value;
                
                // Reload data with filters
                $('#transactionsTable').DataTable().ajax.url(`api/transactions.php?status=${statusFilter}&days=${dateFilter}`).load();
            }
            
            // Handle export button
            document.getElementById('exportBtn').addEventListener('click', function() {
                const statusFilter = document.getElementById('statusFilter').value;
                const dateFilter = document.getElementById('dateFilter').value;
                
                // Redirect to export endpoint
                window.location.href = `api/export.php?status=${statusFilter}&days=${dateFilter}`;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Common JavaScript functions
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white`;
            notification.textContent = message;
            document.body.appendChild(notification);
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        function confirmAction(message) {
            return confirm(message);
        }

        // Debounce function for search inputs
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
</body>
</html> 