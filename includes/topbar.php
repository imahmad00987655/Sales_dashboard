<div class="bg-white shadow-sm">
    <div class="flex justify-between items-center py-4 px-6">
        <!-- Search Bar -->
        <div class="flex-1 max-w-lg">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search...">
            </div>
        </div>
        
        <!-- Right Navigation -->
        <div class="flex items-center space-x-4">
            <!-- Notifications Dropdown -->
            <div class="relative">
                <button id="notificationsButton" class="flex text-sm rounded-full text-gray-600 hover:text-gray-900 focus:outline-none">
                    <span class="sr-only">View notifications</span>
                    <div class="relative">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                    </div>
                </button>
                
                <!-- Notifications Dropdown Panel -->
                <div id="notificationsPanel" class="hidden origin-top-right absolute right-0 mt-2 w-80 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                    <div class="py-2 px-4 bg-indigo-600 text-white rounded-t-md">
                        <div class="flex justify-between items-center">
                            <h3 class="text-sm font-medium">Notifications</h3>
                            <a href="#" class="text-xs underline">Mark all as read</a>
                        </div>
                    </div>
                    <div class="max-h-60 overflow-y-auto py-1">
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition ease-in-out duration-150">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-indigo-100 rounded-md p-1">
                                    <svg class="h-5 w-5 text-indigo-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15M9 5C9 6.10457 9.89543 7 11 7H13C14.1046 7 15 6.10457 15 5M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">New order received</p>
                                    <p class="text-xs text-gray-500">Order #12345 from John Doe</p>
                                    <p class="text-xs text-gray-500 mt-1">5 minutes ago</p>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <span class="inline-block h-2 w-2 rounded-full bg-indigo-500"></span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition ease-in-out duration-150">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-green-100 rounded-md p-1">
                                    <svg class="h-5 w-5 text-green-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Payment received</p>
                                    <p class="text-xs text-gray-500">$1,299.00 for order #12345</p>
                                    <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition ease-in-out duration-150">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-yellow-100 rounded-md p-1">
                                    <svg class="h-5 w-5 text-yellow-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 8V12M12 16H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Inventory alert</p>
                                    <p class="text-xs text-gray-500">Product "Wireless Headphones" is low on stock</p>
                                    <p class="text-xs text-gray-500 mt-1">3 hours ago</p>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <span class="inline-block h-2 w-2 rounded-full bg-indigo-500"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="py-1 bg-gray-50 rounded-b-md">
                        <a href="#" class="block text-center px-4 py-2 text-sm text-indigo-600 hover:text-indigo-800">View all notifications</a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions Dropdown -->
            <div class="relative">
                <button id="quickActionsButton" class="flex text-sm rounded-full text-gray-600 hover:text-gray-900 focus:outline-none">
                    <span class="sr-only">Quick actions</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
                
                <!-- Quick Actions Dropdown Panel -->
                <div id="quickActionsPanel" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center">
                                <svg class="mr-3 h-5 w-5 text-indigo-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                New Product
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center">
                                <svg class="mr-3 h-5 w-5 text-indigo-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                New Customer
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center">
                                <svg class="mr-3 h-5 w-5 text-indigo-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15M9 5C9 6.10457 9.89543 7 11 7H13C14.1046 7 15 6.10457 15 5M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Create Invoice
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Help Button -->
            <button class="flex text-sm rounded-full text-gray-600 hover:text-gray-900 focus:outline-none">
                <span class="sr-only">Help</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    // Toggle notifications dropdown
    document.getElementById('notificationsButton').addEventListener('click', function() {
        const panel = document.getElementById('notificationsPanel');
        panel.classList.toggle('hidden');
        
        // Close other dropdowns
        document.getElementById('quickActionsPanel').classList.add('hidden');
    });
    
    // Toggle quick actions dropdown
    document.getElementById('quickActionsButton').addEventListener('click', function() {
        const panel = document.getElementById('quickActionsPanel');
        panel.classList.toggle('hidden');
        
        // Close other dropdowns
        document.getElementById('notificationsPanel').classList.add('hidden');
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const notificationsButton = document.getElementById('notificationsButton');
        const notificationsPanel = document.getElementById('notificationsPanel');
        const quickActionsButton = document.getElementById('quickActionsButton');
        const quickActionsPanel = document.getElementById('quickActionsPanel');
        
        if (!notificationsButton.contains(event.target) && !notificationsPanel.contains(event.target)) {
            notificationsPanel.classList.add('hidden');
        }
        
        if (!quickActionsButton.contains(event.target) && !quickActionsPanel.contains(event.target)) {
            quickActionsPanel.classList.add('hidden');
        }
    });
</script> 