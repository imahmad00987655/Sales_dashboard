<div class="hidden md:flex flex-col bg-indigo-800 text-white w-64 py-4 px-2 min-h-screen">
    <!-- Logo -->
    <div class="px-4 py-4">
        <div class="flex items-center">
            <svg class="h-8 w-8 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4.75L19.25 9L12 13.25L4.75 9L12 4.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.25 12L4.75 15L12 19.25L19.25 15L14.6722 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span class="ml-2 text-xl font-bold">AdminDash</span>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="mt-8 flex-1 px-2 space-y-1">
        <a href="index.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md group transition-colors duration-200">
            <svg class="mr-3 h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 16a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Dashboard
        </a>
        
        <a href="analytics.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'analytics.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md group transition-colors duration-200">
            <svg class="mr-3 h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 11C9.20914 11 11 9.20914 11 7C11 4.79086 9.20914 3 7 3C4.79086 3 3 4.79086 3 7C3 9.20914 4.79086 11 7 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 13V11C18.791 11 17 9.20914 17 7C17 4.79086 18.791 3 21 3V1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 21.0001C9.9714 20.4275 8.81462 20.0635 7.61511 19.9341C6.41559 19.8047 5.20138 19.9127 4.05 20.251" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3 15.364C4.10857 14.6893 5.36978 14.3196 6.65901 14.2929C7.94824 14.2662 9.22064 14.5835 10.355 15.212" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14 15.5C14 17.0651 14.4021 18.591 15.1586 19.9122C15.915 21.2334 17.0009 22.2954 18.318 22.9824" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 8.5C18.4368 8.5 16.921 9.00243 15.682 9.93579C14.4431 10.8691 13.5687 12.183 13.1879 13.6619" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Analytics
        </a>
        
        <a href="products.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md group transition-colors duration-200">
            <svg class="mr-3 h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10M5 10H19C20.1046 10 21 10.8954 21 12V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V12C3 10.8954 3.89543 10 5 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Products
        </a>
        
        <a href="orders.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md group transition-colors duration-200">
            <svg class="mr-3 h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 20H7C5.89543 20 5 19.1046 5 18V9C5 7.89543 5.89543 7 7 7H17C18.1046 7 19 7.89543 19 9V18C19 19.1046 18.1046 20 17 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 7V4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 4H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 11H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Orders
        </a>
        
        <a href="customers.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md group transition-colors duration-200">
            <svg class="mr-3 h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4.5C12 6.433 10.433 8 8.5 8C6.567 8 5 6.433 5 4.5C5 2.567 6.567 1 8.5 1C10.433 1 12 2.567 12 4.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 19.5C12 21.433 10.433 23 8.5 23C6.567 23 5 21.433 5 19.5C5 17.567 6.567 16 8.5 16C10.433 16 12 17.567 12 19.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19 12C20.1046 12 21 11.1046 21 10C21 8.89543 20.1046 8 19 8C17.8954 8 17 8.89543 17 10C17 11.1046 17.8954 12 19 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 4.5H19C20.1046 4.5 21 5.39543 21 6.5V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 19.5H19C20.1046 19.5 21 18.6046 21 17.5V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Customers
        </a>
        
        <a href="settings.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md group transition-colors duration-200">
            <svg class="mr-3 h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.325 4.317C10.751 2.561 13.249 2.561 13.675 4.317C13.7389 4.5808 13.8642 4.82578 14.0407 5.032C14.2172 5.23822 14.4399 5.39985 14.6907 5.50375C14.9414 5.60764 15.2132 5.65085 15.4838 5.62987C15.7544 5.60889 16.0162 5.5243 16.248 5.383C17.791 4.443 19.558 6.209 18.618 7.753C18.4769 7.98466 18.3924 8.24634 18.3715 8.51677C18.3506 8.78721 18.3938 9.05877 18.4975 9.30938C18.6013 9.55999 18.7627 9.78258 18.9687 9.95905C19.1747 10.1355 19.4194 10.2609 19.683 10.325C21.439 10.751 21.439 13.249 19.683 13.675C19.4192 13.7389 19.1742 13.8642 18.968 14.0407C18.7618 14.2172 18.6001 14.4399 18.4963 14.6907C18.3924 14.9414 18.3491 15.2132 18.3701 15.4838C18.3911 15.7544 18.4757 16.0162 18.617 16.248C19.557 17.791 17.791 19.558 16.247 18.618C16.0153 18.4769 15.7537 18.3924 15.4832 18.3715C15.2128 18.3506 14.9412 18.3938 14.6906 18.4975C14.44 18.6013 14.2174 18.7627 14.0409 18.9687C13.8645 19.1747 13.7391 19.4194 13.675 19.683C13.249 21.439 10.751 21.439 10.325 19.683C10.2611 19.4192 10.1358 19.1742 9.95929 18.968C9.7828 18.7618 9.56011 18.6001 9.30935 18.4963C9.05859 18.3924 8.78683 18.3491 8.51621 18.3701C8.24559 18.3911 7.98375 18.4757 7.752 18.617C6.209 19.557 4.442 17.791 5.382 16.247C5.5231 16.0153 5.60755 15.7537 5.62848 15.4832C5.64942 15.2128 5.60624 14.9412 5.50247 14.6906C5.3987 14.44 5.23726 14.2174 5.03127 14.0409C4.82529 13.8645 4.58056 13.7391 4.317 13.675C2.561 13.249 2.561 10.751 4.317 10.325C4.5808 10.2611 4.82578 10.1358 5.032 9.95929C5.23822 9.7828 5.39985 9.56011 5.50375 9.30935C5.60764 9.05859 5.65085 8.78683 5.62987 8.51621C5.60889 8.24559 5.5243 7.98375 5.383 7.752C4.443 6.209 6.209 4.442 7.753 5.382C8.753 5.99 10.049 5.452 10.325 4.317Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Settings
        </a>
    </nav>
    
    <!-- User Profile -->
    <div class="mt-auto px-4 py-2">
        <hr class="my-6 border-indigo-700">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($username); ?>&background=6366F1&color=fff" alt="User avatar">
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-indigo-100"><?php echo htmlspecialchars($username); ?></p>
                <a href="logout.php" class="text-xs font-medium text-indigo-300 hover:text-indigo-100">Sign out</a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Toggle -->
<div class="md:hidden bg-indigo-800 text-white p-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <svg class="h-8 w-8 text-indigo-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4.75L19.25 9L12 13.25L4.75 9L12 4.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.25 12L4.75 15L12 19.25L19.25 15L14.6722 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span class="ml-2 text-xl font-bold">AdminDash</span>
        </div>
        <button id="mobileMenuButton" class="text-indigo-100">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Mobile Menu (Hidden by default) -->
<div id="mobileMenu" class="hidden md:hidden bg-indigo-800 text-white">
    <nav class="px-4 py-2 space-y-1">
        <a href="index.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md">
            Dashboard
        </a>
        <a href="analytics.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'analytics.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md">
            Analytics
        </a>
        <a href="products.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md">
            Products
        </a>
        <a href="orders.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md">
            Orders
        </a>
        <a href="customers.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md">
            Customers
        </a>
        <a href="settings.php" class="flex items-center px-4 py-3 text-indigo-100 <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'bg-indigo-700' : 'hover:bg-indigo-700'; ?> rounded-md">
            Settings
        </a>
        <hr class="my-2 border-indigo-700">
        <div class="flex items-center px-4 py-3">
            <div class="flex-shrink-0">
                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($username); ?>&background=6366F1&color=fff" alt="User avatar">
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-indigo-100"><?php echo htmlspecialchars($username); ?></p>
                <a href="logout.php" class="text-xs font-medium text-indigo-300 hover:text-indigo-100">Sign out</a>
            </div>
        </div>
    </nav>
</div>

<script>
    // Toggle mobile menu
    document.getElementById('mobileMenuButton').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    });
</script>

<!-- Sidebar -->
<div class="fixed left-0 top-16 bottom-0 w-64 bg-white shadow-md overflow-y-auto">
    <nav class="mt-5 px-2">
        <div class="space-y-1">
            <a href="index.php" class="group flex items-center px-2 py-2 text-base font-medium rounded-md <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'; ?>">
                <i class="fas fa-home mr-3"></i>
                Dashboard
            </a>
            <a href="analytics.php" class="group flex items-center px-2 py-2 text-base font-medium rounded-md <?php echo basename($_SERVER['PHP_SELF']) == 'analytics.php' ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'; ?>">
                <i class="fas fa-chart-line mr-3"></i>
                Analytics
            </a>
            <a href="products.php" class="group flex items-center px-2 py-2 text-base font-medium rounded-md <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'; ?>">
                <i class="fas fa-box mr-3"></i>
                Products
            </a>
            <a href="orders.php" class="group flex items-center px-2 py-2 text-base font-medium rounded-md <?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'; ?>">
                <i class="fas fa-shopping-cart mr-3"></i>
                Orders
            </a>
            <a href="customers.php" class="group flex items-center px-2 py-2 text-base font-medium rounded-md <?php echo basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'; ?>">
                <i class="fas fa-users mr-3"></i>
                Customers
            </a>
            <a href="settings.php" class="group flex items-center px-2 py-2 text-base font-medium rounded-md <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'; ?>">
                <i class="fas fa-cog mr-3"></i>
                Settings
            </a>
        </div>
    </nav>
</div> 