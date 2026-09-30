<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col relative overflow-hidden">
        <p class="text-sm font-semibold text-slate-500 mb-1 relative z-10">Total Services</p>
        <h3 class="text-3xl font-bold text-blue-900 relative z-10">12</h3>
        <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col relative overflow-hidden">
        <p class="text-sm font-semibold text-slate-500 mb-1 relative z-10">Team Members</p>
        <h3 class="text-3xl font-bold text-blue-900 relative z-10">8</h3>
        <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col relative overflow-hidden">
        <p class="text-sm font-semibold text-slate-500 mb-1 relative z-10">Blog Posts</p>
        <h3 class="text-3xl font-bold text-blue-900 relative z-10">24</h3>
        <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col relative overflow-hidden">
        <p class="text-sm font-semibold text-slate-500 mb-1 relative z-10">New Inquiries</p>
        <h3 class="text-3xl font-bold text-blue-900 relative z-10">5</h3>
        <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Chart 1: Content Growth -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Content Growth Overview</h3>
        <div class="w-full h-64">
            <canvas id="contentGrowthChart"></canvas>
        </div>
    </div>
    
    <!-- Chart 2: Inquiries Trend -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Client Inquiries (Last 6 Months)</h3>
        <div class="w-full h-64">
            <canvas id="inquiriesChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Content Growth Chart
    const ctx1 = document.getElementById('contentGrowthChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Services', 'Members', 'Blog Posts', 'Pages'],
            datasets: [{
                data: [12, 8, 24, 6],
                backgroundColor: [
                    '#3b82f6', // blue-500
                    '#10b981', // emerald-500
                    '#8b5cf6', // violet-500
                    '#f59e0b'  // amber-500
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                }
            },
            cutout: '70%'
        }
    });

    // Inquiries Line Chart
    const ctx2 = document.getElementById('inquiriesChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Inquiries',
                data: [4, 7, 5, 12, 8, 15],
                borderColor: '#2563eb', // blue-600
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#2563eb',
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
                    grid: { color: '#f1f5f9' }, // slate-100
                    border: { display: false }
                },
                x: {
                    grid: { display: false },
                    border: { display: false }
                }
            }
        }
    });
});
</script>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Recent Activities</h3>
        <!-- Activity List -->
        <div class="space-y-4">
            <div class="flex items-start text-sm pb-4 border-b border-slate-50 last:border-0">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3 mt-1">C</div>
                <div>
                    <p class="font-medium text-slate-800">New Contact Submission</p>
                    <p class="text-slate-500">John Doe inquired about Audit Services.</p>
                    <span class="text-xs text-slate-400">2 hours ago</span>
                </div>
            </div>
            <div class="flex items-start text-sm pb-4 border-b border-slate-50 last:border-0">
                <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 mt-1">F</div>
                <div>
                    <p class="font-medium text-slate-800">Facebook Auto-Sync Completed</p>
                    <p class="text-slate-500">Imported 2 new posts from AQC Official Page.</p>
                    <span class="text-xs text-slate-400">5 hours ago</span>
                </div>
            </div>
            <div class="flex items-start text-sm pb-4 border-b border-slate-50 last:border-0">
                <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center mr-3 mt-1">P</div>
                <div>
                    <p class="font-medium text-slate-800">Page Content Updated</p>
                    <p class="text-slate-500">System Admin updated the "About Us" page content.</p>
                    <span class="text-xs text-slate-400">1 day ago</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Quick Actions</h3>
        <div class="space-y-2">
            <button class="w-full text-left px-4 py-3 bg-slate-50 hover:bg-blue-50 hover:text-blue-700 rounded border border-slate-100 font-medium transition-colors text-sm">
                + Add New Service
            </button>
            <button class="w-full text-left px-4 py-3 bg-slate-50 hover:bg-blue-50 hover:text-blue-700 rounded border border-slate-100 font-medium transition-colors text-sm">
                + Write Blog Post
            </button>
            <button class="w-full text-left px-4 py-3 bg-slate-50 hover:bg-blue-50 hover:text-blue-700 rounded border border-slate-100 font-medium transition-colors text-sm">
                + Add Team Member
            </button>
            <button class="w-full text-left px-4 py-3 bg-slate-50 hover:bg-blue-50 hover:text-blue-700 rounded border border-slate-100 font-medium transition-colors text-sm">
                ⚙️ Check FB Sync Status
            </button>
            <button class="w-full text-left px-4 py-3 bg-slate-50 hover:bg-blue-50 hover:text-blue-700 rounded border border-slate-100 font-medium transition-colors text-sm">
                📥 View Deployment Logs
            </button>
        </div>
    </div>
</div>
