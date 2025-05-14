<?php
// Sample data for stats cards
// In a real application, these would come from database queries
$statsCards = [
    [
        'title' => 'Total Revenue',
        'value' => '$48,254.32',
        'change' => '+12.5%',
        'trend' => 'up',
        'icon' => '<svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'bg' => 'bg-indigo-50',
        'text' => 'text-indigo-600'
    ],
    [
        'title' => 'New Orders',
        'value' => '342',
        'change' => '+8.2%',
        'trend' => 'up',
        'icon' => '<svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>',
        'bg' => 'bg-blue-50',
        'text' => 'text-blue-600'
    ],
    [
        'title' => 'Active Users',
        'value' => '1,823',
        'change' => '+5.4%',
        'trend' => 'up',
        'icon' => '<svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'bg' => 'bg-green-50',
        'text' => 'text-green-600'
    ],
    [
        'title' => 'Conversion Rate',
        'value' => '3.42%',
        'change' => '-1.8%',
        'trend' => 'down',
        'icon' => '<svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>',
        'bg' => 'bg-yellow-50',
        'text' => 'text-yellow-600'
    ]
];

// Loop through and output each stats card
foreach ($statsCards as $card):
?>
    <div class="relative overflow-hidden bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300 hover:shadow-lg">
        <div class="flex justify-between">
            <div>
                <h2 class="text-sm font-medium text-gray-600"><?php echo $card['title']; ?></h2>
                <div class="mt-2 flex items-baseline">
                    <p class="text-2xl font-semibold text-gray-900"><?php echo $card['value']; ?></p>
                    <p class="ml-2 flex items-baseline text-sm font-semibold <?php echo $card['trend'] === 'up' ? 'text-green-600' : 'text-red-600'; ?>">
                        <?php if ($card['trend'] === 'up'): ?>
                            <svg class="h-3 w-3 self-center" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                        <?php else: ?>
                            <svg class="h-3 w-3 self-center" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        <?php endif; ?>
                        <?php echo $card['change']; ?>
                    </p>
                </div>
            </div>
            <div class="flex-shrink-0 rounded-full p-3 <?php echo $card['bg']; ?>">
                <?php echo $card['icon']; ?>
            </div>
        </div>
        
        <!-- Mini Sparkline Chart -->
        <div class="absolute bottom-0 inset-x-0 h-1 bg-gray-200">
            <div class="<?php echo $card['trend'] === 'up' ? 'bg-green-500' : 'bg-red-500'; ?> h-1" style="width: <?php echo rand(60, 85); ?>%;"></div>
        </div>
    </div>
<?php endforeach; ?> 