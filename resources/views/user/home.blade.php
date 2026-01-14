@include('user.header')

        <!-- Main Content -->
        <main class="main-content">
            <!-- Welcome Section -->
            <div class="welcome-section fade-in">
                <h1>Welcome back, <span class="text-primary">{{ Auth::user()->name }}</span>!</h1>
                <p id="currentDate">Here's your financial overview for today</p>
            </div>

            {{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Error Messages --}}
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

            <!-- Balance Card -->
            <div class="balance-card fade-in">
                <div class="balance-header">
                    <div>
                        <div class="balance-label">Total Balance</div>
                        <div class="balance-amount">${{ $balance_total }}</div>
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

        <a href="{{ route('home') }}" class="action-btn fade-in enhanced-card">
            <div class="action-icon">
                <i class="bi bi-cash-stack"></i>
            </div>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('transfers') }}" class="action-btn fade-in enhanced-card">
            <div class="action-icon">
                <i class="bi bi-arrow-left-right"></i>
            </div>
            <span>Transfer</span>
        </a>

        <a href="{{ route('profile') }}" class="action-btn fade-in enhanced-card">
            <div class="action-icon">
                <i class="bi bi-credit-card"></i>
            </div>
            <span>Profile</span>
        </a>

        <a href="/logout" class="action-btn fade-in enhanced-card">
            <div class="action-icon">
                <i class="bi bi-graph-up"></i>
            </div>
            <span>Logout</span>
        </a>

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
                        
                   <form  method="POST" action="{{ route('transfer.store') }}">
    @csrf
    <!-- Account Name -->
    <div class="form-group">
        <label class="form-label" for="accountName">Account Name</label>
        <input
            type="text"
            class="form-control"
            id="accountName"
            name="account_name"
            placeholder="Enter account holder name"
            required
        >
    </div>

    <!-- Account Number -->
    <div class="form-group">
        <label class="form-label" for="accountNumber">Account Number</label>
        <input
            type="text"
            class="form-control"
            id="accountNumber"
            name="account_number"
            placeholder="Enter account number"
            required
        >
    </div>

    <!-- Bank Name -->
    <div class="form-group">
        <label class="form-label" for="bankName">Bank Name</label>
        <input
            type="text"
            class="form-control"
            id="bankName"
            name="bank_name"
            placeholder="Enter bank name"
            required
        >
    </div>

    <!-- Bank Country -->
    <div class="form-group">
        <label class="form-label" for="bankCountry">Bank Country</label>
        <input
            type="text"
            class="form-control"
            id="bankCountry"
            name="bank_country"
            placeholder="Enter bank country"
            required
        >
    </div>

    <!-- Bank Address -->
    <div class="form-group">
        <label class="form-label" for="bankAddress">Bank Address</label>
        <input
            type="text"
            class="form-control"
            id="bankAddress"
            name="bank_address"
            placeholder="Enter bank address"
            required
        >
    </div>

    <!-- Amount -->
    <div class="form-group">
        <label class="form-label" for="amount">Amount</label>
        <div class="amount-input">
            <span class="currency-symbol">$</span>
            <input
                type="number"
                class="form-control"
                id="amount"
                name="amount"
                placeholder="0.00"
                min="1"
                step="0.01"
                required
            >
        </div>
    </div>

    <!-- Description -->
    <div class="form-group">
        <label class="form-label" for="description">Description</label>
        <input
            type="text"
            class="form-control"
            id="description"
            name="description"
            placeholder="Optional description"
            maxlength="100"
        >
    </div>

    <!-- Actions -->
    <div class="transfer-actions">
        <button type="button" class="btn-outline" id="cancelBtn">
            Cancel
        </button>
        <button type="submit" class="btn-primary">
            Continue
        </button>
    </div>
</form>
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

      @include('user.footer')