@include('user.header')

        <!-- Main Content -->
        <main class="main-content">
            <!-- Welcome Section -->
            <div class="welcome-section fade-in">
                <h1>Welcome back, <span class="text-primary">{{ Auth::user()->name }}</span>!</h1>
                <p id="currentDate">Here's your financial overview for today</p>
            </div>

            <!-- Balance Card -->
            <div class="balance-card fade-in">
                <div class="balance-header">
                    <div>
                        <div class="balance-label">Total Balance</div>
                        <div class="balance-amount" id="totalBalance">$0.00</div>
                        {{-- <div class="balance-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            +2.5% this month
                        </div> --}}
                    </div>
                    <div class="balance-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>
                </div>
                <div style="position: relative; z-index: 1;">
                    <small>ID Number: {{ Auth::user()->id_number }}</small>
                </div>
            </div>

            {{-- <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card income fade-in enhanced-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <span class="stat-change positive">+5.2%</span>
                    </div>
                    <div class="stat-value">$4,320.50</div>
                    <div class="stat-label">Monthly Income</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 75%"></div>
                    </div>
                </div>

                <div class="stat-card expenses fade-in enhanced-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <span class="stat-change negative">-1.3%</span>
                    </div>
                    <div class="stat-value">$1,850.25</div>
                    <div class="stat-label">Monthly Expenses</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 45%"></div>
                    </div>
                </div>

                <div class="stat-card savings fade-in enhanced-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                        <span class="stat-change positive">+8.7%</span>
                    </div>
                    <div class="stat-value">$8,642.00</div>
                    <div class="stat-label">Total Savings</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 65%"></div>
                    </div>
                </div>

                <div class="stat-card credit fade-in enhanced-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <span class="stat-change positive">Excellent</span>
                    </div>
                    <div class="stat-value">785</div>
                    <div class="stat-label">Credit Score</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 85%"></div>
                    </div>
                </div>
            </div> --}}

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h3 class="section-title">Quick Actions</h3>
                <div class="actions-grid">
                    <button class="action-btn fade-in enhanced-card" id="depositBtn">
                        <div class="action-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <span>Deposit</span>
                    </button>
                    <button class="action-btn fade-in enhanced-card" id="transferBtn">
                        <div class="action-icon">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>
                        <span>Transfer</span>
                    </button>
                    <button class="action-btn fade-in enhanced-card" id="payBillsBtn">
                        <div class="action-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <span>Profile</span>
                    </button>
                    <button class="action-btn fade-in enhanced-card" id="investBtn">
                        <div class="action-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <span>Logout</span>
                    </button>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Left Column -->
                <div>
                    <!-- Quick Transfer -->
                    <div class="quick-transfer fade-in enhanced-card">
                        <div class="card-header">
                            <h3>Quick Transfer</h3>
                        </div>
                        <div class="transfer-form">
                            <input type="text" placeholder="Recipient Account Number" id="recipientAccount">
                            <input type="text" placeholder="Amount" id="transferAmount">
                            <button class="sidebar-btn w-100" id="sendMoneyBtn">
                                <i class="bi bi-send"></i>
                                <span>Send Money</span>
                            </button>
                        </div>
                    </div>

                    {{-- <!-- Recent Transactions -->
                    <div class="transactions-card fade-in enhanced-card" style="margin-top: 1.5rem;">
                        <div class="card-header">
                            <h3>Recent Transactions</h3>
                            <a href="#" class="view-all" id="viewAllTransactions">View All</a>
                        </div>
                        
                        <div class="transactions-list" id="transactionsList">
                            <!-- Transactions will be loaded dynamically -->
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- Accounts Overview -->
                    <div class="accounts-card fade-in enhanced-card">
                        <div class="card-header">
                            <h3>Your Accounts</h3>
                            <button class="btn btn-sm btn-outline-primary" id="addAccountBtn">+ Add</button>
                        </div>
                        
                        <div class="accounts-list" id="accountsList">
                            <!-- Accounts will be loaded dynamically -->
                        </div>
                    </div>

                    <!-- Stats Summary -->
                    <div class="stats-summary fade-in enhanced-card" style="margin-top: 1.5rem;">
                        <div class="card-header">
                            <h3>Monthly Summary</h3>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Spending Limit</small>
                            <div class="d-flex justify-content-between">
                                <span>$2,500</span>
                                <span class="text-success">$1,850 left</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 35%; background: var(--success);"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Savings Goal</small>
                            <div class="d-flex justify-content-between">
                                <span>$10,000</span>
                                <span class="text-primary">86%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 86%;"></div>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">Credit Utilization</small>
                            <div class="d-flex justify-content-between">
                                <span>Credit Card</span>
                                <span class="text-success">25%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 25%; background: var(--success);"></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </main>

        <!-- Mobile Bottom Navigation -->
        <nav class="mobile-nav mobile-nav-enhanced">
            <a href="#" class="mobile-nav-item active" id="mobileDashboard">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="mobile-nav-item" id="mobileDeposit">
                <i class="bi bi-cash-stack"></i>
                <span>Deposit</span>
            </a>
            <a href="#" class="mobile-nav-item" id="mobileTransfer">
                <i class="bi bi-arrow-left-right"></i>
                <span>Transfer</span>
            </a>
            <a href="#" class="mobile-nav-item" id="mobileProfile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
            <a href="#" class="mobile-nav-item" id="mobileLogout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </nav>
    </div>

    <!-- Dashboard JavaScript -->
    <script>
        // Sample data
        const sampleTransactions = [
            { id: 1, name: 'Amazon Purchase', type: 'expense', amount: -89.99, date: 'Today • 2:45 PM', icon: 'cart' },
            { id: 2, name: 'Salary Deposit', type: 'income', amount: 3500.00, date: 'Yesterday • 9:00 AM', icon: 'building' },
            { id: 3, name: 'Netflix Subscription', type: 'expense', amount: -15.99, date: '2 days ago', icon: 'film' },
            { id: 4, name: 'Uber Ride', type: 'expense', amount: -24.50, date: '3 days ago', icon: 'car-front' },
            { id: 5, name: 'Electric Bill', type: 'expense', amount: -120.75, date: '5 days ago', icon: 'lightning-charge' }
        ];

        const sampleAccounts = [
            { id: 1, name: 'Savings Account', type: 'bank', number: '4832', balance: 8642.00, status: 'Active' },
            { id: 2, name: 'Checking Account', type: 'credit-card', number: '5916', balance: 3808.75, status: 'Active' },
            { id: 3, name: 'Investment Account', type: 'graph-up', number: '7421', balance: 15320.50, status: 'Active' },
            { id: 4, name: 'Cryptocurrency', type: 'currency-bitcoin', number: '9384', balance: 2450.30, status: 'Active' }
        ];

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize components
            initSidebarToggle();
            initDropdown();
            initMobileNavigation();
            initInteractiveElements();
            loadTransactions();
            loadAccounts();
            updateCurrentDate();
            startLiveUpdates();
        });

        // Sidebar toggle functionality
        function initSidebarToggle() {
            const navToggle = document.getElementById('navToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (navToggle && sidebar && overlay) {
                navToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                    document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
                    
                    // Change icon
                    const icon = navToggle.querySelector('i');
                    icon.className = sidebar.classList.contains('active') ? 'bi bi-x-lg' : 'bi bi-list';
                });
                
                // Close sidebar when overlay is clicked
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                    navToggle.querySelector('i').className = 'bi bi-list';
                });
                
                // Close sidebar when clicking a nav item on mobile
                document.querySelectorAll('.nav-item').forEach(item => {
                    item.addEventListener('click', function() {
                        if (window.innerWidth < 992) {
                            sidebar.classList.remove('active');
                            overlay.classList.remove('active');
                            document.body.style.overflow = '';
                            navToggle.querySelector('i').className = 'bi bi-list';
                        }
                    });
                });
                
                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 992) {
                        sidebar.classList.add('active');
                        overlay.classList.remove('active');
                        document.body.style.overflow = '';
                        if (navToggle.querySelector('i')) {
                            navToggle.querySelector('i').className = 'bi bi-list';
                        }
                    }
                });
                
                // Initialize sidebar state
                if (window.innerWidth >= 992) {
                    sidebar.classList.add('active');
                }
            }
        }

        // User dropdown functionality
        function initDropdown() {
            const dropdownBtn = document.getElementById('userDropdownBtn');
            const dropdownMenu = document.getElementById('dropdownMenu');
            
            if (dropdownBtn && dropdownMenu) {
                // Toggle dropdown on click
                dropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('show');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.remove('show');
                    }
                });
                
                // Handle dropdown item clicks
                document.querySelectorAll('.dropdown-item').forEach(item => {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                        const action = this.querySelector('span').textContent;
                        showNotification(`${action} page would load here`);
                        dropdownMenu.classList.remove('show');
                    });
                });
            }
        }

        // Mobile navigation functionality
        function initMobileNavigation() {
            const mobileNavItems = document.querySelectorAll('.mobile-nav-item');
            
            mobileNavItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all items
                    mobileNavItems.forEach(i => i.classList.remove('active'));
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                    
                    // Get action text
                    const action = this.querySelector('span').textContent;
                    
                    // Show notification for demonstration
                    if (action !== 'Dashboard') {
                        showNotification(`${action} page would load here`);
                    }
                    
                    // If it's logout, show confirmation
                    if (action === 'Logout') {
                        if (confirm('Are you sure you want to logout?')) {
                            showNotification('Logged out successfully');
                        }
                    }
                });
            });
        }

        // Initialize interactive elements
        function initInteractiveElements() {
            // Quick action buttons
            const quickActions = {
                depositBtn: 'Deposit',
                transferBtn: 'Transfer',
                payBillsBtn: 'Pay Bills',
                investBtn: 'Invest'
            };
            
            Object.keys(quickActions).forEach(btnId => {
                const btn = document.getElementById(btnId);
                if (btn) {
                    btn.addEventListener('click', function() {
                        const action = quickActions[btnId];
                        showNotification(`${action} initiated successfully`);
                        
                        // Add click animation
                        this.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 150);
                    });
                }
            });
            
            // Sidebar buttons
            const sidebarActions = {
                newAccountBtn: 'New Account',
                helpCenterBtn: 'Help Center'
            };
            
            Object.keys(sidebarActions).forEach(btnId => {
                const btn = document.getElementById(btnId);
                if (btn) {
                    btn.addEventListener('click', function() {
                        const action = sidebarActions[btnId];
                        showNotification(`${action} feature would open here`);
                    });
                }
            });
            
            // Send money button
            const sendMoneyBtn = document.getElementById('sendMoneyBtn');
            if (sendMoneyBtn) {
                sendMoneyBtn.addEventListener('click', function() {
                    const recipient = document.getElementById('recipientAccount');
                    const amount = document.getElementById('transferAmount');
                    
                    if (recipient.value && amount.value) {
                        showNotification(`$${amount.value} sent to account ${recipient.value}`);
                        recipient.value = '';
                        amount.value = '';
                    } else {
                        showNotification('Please enter recipient and amount', 'warning');
                    }
                });
            }
            
            // View all transactions
            const viewAllBtn = document.getElementById('viewAllTransactions');
            if (viewAllBtn) {
                viewAllBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    showNotification('Loading all transactions...');
                });
            }
            
            // Add account button
            const addAccountBtn = document.getElementById('addAccountBtn');
            if (addAccountBtn) {
                addAccountBtn.addEventListener('click', function() {
                    showNotification('Opening new account form...');
                });
            }
            
            // Notification bell
            const notificationBtn = document.getElementById('notificationBtn');
            if (notificationBtn) {
                notificationBtn.addEventListener('click', function() {
                    const badge = this.querySelector('.notification-badge');
                    if (badge && badge.textContent !== '0') {
                        badge.textContent = '0';
                        badge.style.opacity = '0.5';
                        showNotification('Notifications cleared');
                    }
                });
            }
            
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                let searchTimer;
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimer);
                    searchTimer = setTimeout(() => {
                        if (this.value.trim().length > 0) {
                            showNotification(`Searching for "${this.value}"...`);
                        }
                    }, 500);
                });
            }
        }

        // Load transactions
        function loadTransactions() {
            const transactionsList = document.getElementById('transactionsList');
            if (!transactionsList) return;
            
            transactionsList.innerHTML = '';
            
            sampleTransactions.forEach(transaction => {
                const isIncome = transaction.type === 'income';
                const transactionItem = document.createElement('div');
                transactionItem.className = 'transaction-item';
                
                transactionItem.innerHTML = `
                    <div class="transaction-info">
                        <div class="transaction-icon ${transaction.type}">
                            <i class="bi bi-${transaction.icon}"></i>
                        </div>
                        <div class="transaction-details">
                            <h5>${transaction.name}</h5>
                            <p>${transaction.date}</p>
                        </div>
                    </div>
                    <div class="transaction-amount ${isIncome ? 'positive' : 'negative'}">
                        ${isIncome ? '+' : '-'}$${Math.abs(transaction.amount).toFixed(2)}
                    </div>
                `;
                
                transactionsList.appendChild(transactionItem);
            });
        }

        // Load accounts
        function loadAccounts() {
            const accountsList = document.getElementById('accountsList');
            if (!accountsList) return;
            
            accountsList.innerHTML = '';
            
            sampleAccounts.forEach(account => {
                const accountItem = document.createElement('div');
                accountItem.className = 'account-item';
                
                accountItem.innerHTML = `
                    <div class="account-info">
                        <div class="account-icon">
                            <i class="bi bi-${account.type}"></i>
                        </div>
                        <div class="account-details">
                            <h5>${account.name}</h5>
                            <p>•••• ${account.number}</p>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="account-balance">$${account.balance.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })}</div>
                        <div class="account-status">${account.status}</div>
                    </div>
                `;
                
                accountsList.appendChild(accountItem);
            });
        }

        // Update current date
        function updateCurrentDate() {
            const dateElement = document.getElementById('currentDate');
            if (dateElement) {
                const now = new Date();
                const options = { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                };
                dateElement.textContent = now.toLocaleDateString('en-US', options);
            }
        }

        // Show notification
        function showNotification(message, type = 'success') {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = 'position-fixed bottom-4 end-4 p-3 rounded shadow-lg';
            toast.style.zIndex = '9999';
            toast.style.maxWidth = '300px';
            toast.style.fontSize = '0.9rem';
            toast.style.animation = 'fadeIn 0.3s ease-out';
            toast.style.background = type === 'warning' ? '#fef3c7' : '#1e293b';
            toast.style.color = type === 'warning' ? '#92400e' : 'white';
            toast.style.border = type === 'warning' ? '1px solid #f59e0b' : '1px solid #334155';
            
            const icon = type === 'warning' ? 'exclamation-triangle' : 'check-circle';
            const iconColor = type === 'warning' ? 'warning' : 'success';
            
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-${icon} me-2 text-${iconColor}"></i>
                    <div class="flex-grow-1">${message}</div>
                    <button class="btn-close ${type === 'warning' ? '' : 'btn-close-white'} ms-2" 
                            onclick="this.parentElement.parentElement.remove()"></button>
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 3000);
        }

        // Live updates simulation
        function startLiveUpdates() {
            // Update balance every 30 seconds
            setInterval(() => {
                const balanceElement = document.getElementById('totalBalance');
                if (balanceElement) {
                    const currentBalance = parseFloat(balanceElement.textContent.replace(/[^0-9.-]+/g, ""));
                    const randomChange = (Math.random() - 0.5) * 50;
                    const newBalance = currentBalance + randomChange;
                    
                    // Animate the change
                    balanceElement.style.opacity = '0.6';
                    setTimeout(() => {
                        balanceElement.textContent = '$' + newBalance.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        balanceElement.style.opacity = '1';
                    }, 300);
                }
            }, 30000);
            
            // Add scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            
            // Observe elements for animation
            document.querySelectorAll('.stat-card, .action-btn, .transaction-item, .account-item').forEach(el => {
                observer.observe(el);
            });
        }

        // Make functions globally available
        window.showNotification = showNotification;
    </script>
</body>
</html>