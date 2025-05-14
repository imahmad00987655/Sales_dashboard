<?php
require_once 'includes/auth_check.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>

<div class="ml-64 p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Settings</h1>
        <button onclick="saveSettings()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            Save Changes
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- General Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">General Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Name</label>
                    <input type="text" id="storeName" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="My Store">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Email</label>
                    <input type="email" id="storeEmail" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="store@example.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Phone</label>
                    <input type="tel" id="storePhone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="123-456-7890">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Address</label>
                    <textarea id="storeAddress" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">123 Main St, City, Country</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                    <select id="timezone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="UTC">UTC</option>
                        <option value="America/New_York">Eastern Time</option>
                        <option value="America/Chicago">Central Time</option>
                        <option value="America/Denver">Mountain Time</option>
                        <option value="America/Los_Angeles">Pacific Time</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Payment Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Payment Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
                    <select id="currency" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="USD">USD ($)</option>
                        <option value="EUR">EUR (€)</option>
                        <option value="GBP">GBP (£)</option>
                        <option value="JPY">JPY (¥)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Payment Methods</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="creditCard" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Credit Card</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="paypal" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">PayPal</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="bankTransfer" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2">Bank Transfer</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tax Rate (%)</label>
                    <input type="number" id="taxRate" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="8.5" step="0.1">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Minimum Order Amount</label>
                    <input type="number" id="minOrderAmount" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="10.00" step="0.01">
                </div>
            </div>
        </div>

        <!-- Shipping Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Shipping Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Shipping Methods</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="standardShipping" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Standard Shipping</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="expressShipping" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Express Shipping</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="pickup" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2">Local Pickup</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Standard Shipping Cost</label>
                    <input type="number" id="standardShippingCost" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="5.99" step="0.01">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Express Shipping Cost</label>
                    <input type="number" id="expressShippingCost" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="12.99" step="0.01">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Free Shipping Threshold</label>
                    <input type="number" id="freeShippingThreshold" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="50.00" step="0.01">
                </div>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Notification Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Notifications</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="newOrderEmail" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">New Order</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="lowStockEmail" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Low Stock</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="customerReviewEmail" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2">Customer Review</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">SMS Notifications</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="newOrderSMS" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2">New Order</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="lowStockSMS" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2">Low Stock</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Notification Email</label>
                    <input type="email" id="notificationEmail" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="notifications@example.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Notification Phone</label>
                    <input type="tel" id="notificationPhone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="123-456-7890">
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Security Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Two-Factor Authentication</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="twoFactorAuth" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2">Enable 2FA</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Session Timeout (minutes)</label>
                    <input type="number" id="sessionTimeout" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Policy</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" id="requireUpperCase" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Require uppercase letters</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="requireNumbers" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Require numbers</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" id="requireSpecialChars" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                            <span class="ml-2">Require special characters</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Minimum Password Length</label>
                    <input type="number" id="minPasswordLength" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="8">
                </div>
            </div>
        </div>

        <!-- Backup Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Backup Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Backup Frequency</label>
                    <select id="backupFrequency" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Backup Time</label>
                    <input type="time" id="backupTime" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="02:00">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Backup Retention (days)</label>
                    <input type="number" id="backupRetention" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Backup Location</label>
                    <select id="backupLocation" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="local">Local Server</option>
                        <option value="cloud">Cloud Storage</option>
                        <option value="both">Both</option>
                    </select>
                </div>
                <div class="pt-4">
                    <button onclick="runBackup()" class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Run Backup Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Settings Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    loadSettings();
});

function loadSettings() {
    // In a real application, this would load settings from the server
    // For now, we'll use default values that are already set in the HTML
}

function saveSettings() {
    // Collect all settings
    const settings = {
        general: {
            storeName: document.getElementById('storeName').value,
            storeEmail: document.getElementById('storeEmail').value,
            storePhone: document.getElementById('storePhone').value,
            storeAddress: document.getElementById('storeAddress').value,
            timezone: document.getElementById('timezone').value
        },
        payment: {
            currency: document.getElementById('currency').value,
            paymentMethods: {
                creditCard: document.getElementById('creditCard').checked,
                paypal: document.getElementById('paypal').checked,
                bankTransfer: document.getElementById('bankTransfer').checked
            },
            taxRate: parseFloat(document.getElementById('taxRate').value),
            minOrderAmount: parseFloat(document.getElementById('minOrderAmount').value)
        },
        shipping: {
            shippingMethods: {
                standardShipping: document.getElementById('standardShipping').checked,
                expressShipping: document.getElementById('expressShipping').checked,
                pickup: document.getElementById('pickup').checked
            },
            standardShippingCost: parseFloat(document.getElementById('standardShippingCost').value),
            expressShippingCost: parseFloat(document.getElementById('expressShippingCost').value),
            freeShippingThreshold: parseFloat(document.getElementById('freeShippingThreshold').value)
        },
        notifications: {
            email: {
                newOrder: document.getElementById('newOrderEmail').checked,
                lowStock: document.getElementById('lowStockEmail').checked,
                customerReview: document.getElementById('customerReviewEmail').checked
            },
            sms: {
                newOrder: document.getElementById('newOrderSMS').checked,
                lowStock: document.getElementById('lowStockSMS').checked
            },
            notificationEmail: document.getElementById('notificationEmail').value,
            notificationPhone: document.getElementById('notificationPhone').value
        },
        security: {
            twoFactorAuth: document.getElementById('twoFactorAuth').checked,
            sessionTimeout: parseInt(document.getElementById('sessionTimeout').value),
            passwordPolicy: {
                requireUpperCase: document.getElementById('requireUpperCase').checked,
                requireNumbers: document.getElementById('requireNumbers').checked,
                requireSpecialChars: document.getElementById('requireSpecialChars').checked,
                minLength: parseInt(document.getElementById('minPasswordLength').value)
            }
        },
        backup: {
            frequency: document.getElementById('backupFrequency').value,
            time: document.getElementById('backupTime').value,
            retention: parseInt(document.getElementById('backupRetention').value),
            location: document.getElementById('backupLocation').value
        }
    };

    // In a real application, this would save settings to the server
    console.log('Saving settings:', settings);
    
    // Show success message
    alert('Settings saved successfully!');
}

function runBackup() {
    // In a real application, this would trigger a backup process
    console.log('Running backup...');
    alert('Backup process started. You will be notified when it is complete.');
}
</script>

<?php require_once 'includes/footer.php'; ?> 