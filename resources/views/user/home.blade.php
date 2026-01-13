<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Fundclaim Bank</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Dashboard CSS -->
    <style>
        :root {
            --primary: #2a5bd7;
            --primary-dark: #1a365d;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light: #f8fafc;
            --dark: #1e293b;
            --border: #e2e8f0;
            --card-shadow: 0 4px 12px rgba(0,0,0,0.05);
            --hover-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: white;
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo {
            width: 36px;
            height: 36px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-logo i {
            color: white;
            font-size: 1.2rem;
        }

        .bank-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .user-section {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary), #667eea);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
            font-size: 1rem;
        }

        .user-info h5 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .user-info p {
            margin: 4px 0 0;
            font-size: 0.8rem;
            color: var(--secondary);
        }

        .nav-menu {
            flex: 1;
            padding: 1rem 0;
        }

        .nav-item {
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--secondary);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            background: var(--light);
            color: var(--primary);
        }

        .nav-item.active {
            background: rgba(42, 91, 215, 0.05);
            color: var(--primary);
            font-weight: 500;
            border-left: 3px solid var(--primary);
        }

        .nav-item i {
            font-size: 1.1rem;
            width: 20px;
        }

        .nav-item span {
            font-size: 0.9rem;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .sidebar-btn {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
            margin-bottom: 0.75rem;
        }

        .sidebar-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .sidebar-btn.secondary {
            background: transparent;
            color: var(--dark);
            border: 1px solid var(--border);
        }

        .sidebar-btn.secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Top Navigation */
        .top-nav {
            height: 60px;
            background: white;
            border-bottom: 1px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 900;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .nav-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
            color: var(--dark);
            font-size: 1.25rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .nav-toggle:hover {
            background: var(--light);
            color: var(--primary);
        }

        .brand-mobile {
            margin-left: 1rem;
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 1.1rem;
        }

        .nav-spacer {
            flex: 1;
        }

        .nav-search {
            position: relative;
            margin-right: 1rem;
            display: none;
        }

        @media (min-width: 768px) {
            .nav-search {
                display: block;
                width: 300px;
            }
        }

        .nav-search i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .nav-search input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--light);
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .nav-search input:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-action-btn {
            width: 36px;
            height: 36px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            position: relative;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .nav-action-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.65rem;
            min-width: 16px;
            height: 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
            font-weight: 600;
        }

        .user-dropdown {
            position: relative;
        }

        .user-dropdown-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0.4rem 0.75rem;
            background: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            border: none;
            outline: none;
        }

        .user-dropdown-btn:hover {
            border-color: var(--primary);
        }

        .user-avatar-sm {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary), #667eea);
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: var(--hover-shadow);
            min-width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
            z-index: 1000;
            overflow: hidden;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.2s ease;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: var(--light);
            color: var(--primary);
        }

        .dropdown-item i {
            width: 16px;
            font-size: 1rem;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 60px 1rem 1rem;
            transition: margin-left 0.3s ease;
            max-width: 100%;
            overflow-x: hidden;
        }

        @media (min-width: 992px) {
            .sidebar {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 260px;
                padding: 80px 1.5rem 1.5rem;
            }
            
            .top-nav {
                left: 260px;
            }
            
            .nav-toggle {
                display: none;
            }
            
            .brand-mobile {
                display: none;
            }
        }

        /* Welcome Section */
        .welcome-section {
            margin-bottom: 2rem;
        }

        .welcome-section h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .welcome-section p {
            color: var(--secondary);
            font-size: 0.95rem;
        }

        /* Balance Card */
        .balance-card {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            border-radius: 16px;
            padding: 1.5rem;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(42, 91, 215, 0.15);
        }

        .balance-card::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .balance-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .balance-label {
            font-size: 0.85rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .balance-amount {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .balance-trend {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0.4rem 0.8rem;
            background: rgba(255,255,255,0.15);
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .balance-trend.positive {
            color: var(--success);
        }

        .balance-icon {
            width: 44px;
            height: 44px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.25rem;
            transition: all 0.3s ease;
            box-shadow: var(--card-shadow);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .income .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .expenses .stat-icon {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .savings .stat-icon {
            background: rgba(42, 91, 215, 0.1);
            color: var(--primary);
        }

        .credit .stat-icon {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .stat-change {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .stat-change.positive {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .stat-change.negative {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--secondary);
            font-size: 0.85rem;
        }

        /* Quick Actions */
        .quick-actions {
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
        }

        .action-btn {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.25rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            box-shadow: var(--card-shadow);
        }

        .action-btn:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: var(--hover-shadow);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            background: rgba(42, 91, 215, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            font-size: 1.4rem;
            color: var(--primary);
        }

        .action-btn span {
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--dark);
            display: block;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 992px) {
            .content-grid {
                grid-template-columns: 2fr 1fr;
            }
        }

        /* Transactions Card */
        .transactions-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
            color: var(--dark);
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .transaction-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .transaction-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .transaction-icon.income {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .transaction-icon.expense {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .transaction-details h5 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--dark);
        }

        .transaction-details p {
            margin: 4px 0 0;
            font-size: 0.8rem;
            color: var(--secondary);
        }

        .transaction-amount {
            font-weight: 600;
            font-size: 1rem;
        }

        .transaction-amount.positive {
            color: var(--success);
        }

        .transaction-amount.negative {
            color: var(--danger);
        }

        /* Accounts Card */
        .accounts-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .account-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .account-item:last-child {
            border-bottom: none;
        }

        .account-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .account-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            background: rgba(42, 91, 215, 0.1);
            color: var(--primary);
        }

        .account-details h5 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--dark);
        }

        .account-details p {
            margin: 4px 0 0;
            font-size: 0.8rem;
            color: var(--secondary);
        }

        .account-balance {
            font-weight: 600;
            font-size: 1rem;
            color: var(--dark);
        }

        .account-status {
            padding: 0.25rem 0.75rem;
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Chart Card */
        .chart-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        /* Mobile Bottom Navigation */
        .mobile-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-around;
            padding: 0.5rem 0;
            z-index: 1000;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }

        @media (min-width: 992px) {
            .mobile-nav {
                display: none;
            }
        }

        .mobile-nav-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.5rem;
            text-decoration: none;
            color: var(--secondary);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .mobile-nav-item:hover {
            color: var(--primary);
        }

        .mobile-nav-item.active {
            color: var(--primary);
            background: rgba(42, 91, 215, 0.05);
        }

        .mobile-nav-item i {
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .mobile-nav-item span {
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Add padding for mobile nav */
        @media (max-width: 991px) {
            .main-content {
                padding-bottom: 70px;
            }
        }

        /* Overlay for sidebar on mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Enhanced Features */
        .enhanced-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .enhanced-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }

        .quick-transfer {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .transfer-form input {
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.75rem;
            width: 100%;
            margin-bottom: 1rem;
        }

        .transfer-form input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }

        .stats-summary {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .progress-bar {
            height: 8px;
            background: var(--border);
            border-radius: 4px;
            overflow: hidden;
            margin: 0.5rem 0;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 4px;
            transition: width 1s ease;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        /* Enhanced Mobile Bottom Nav */
        .mobile-nav-enhanced {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }

        .mobile-nav-enhanced .mobile-nav-item {
            color: rgba(255,255,255,0.7);
        }

        .mobile-nav-enhanced .mobile-nav-item.active {
            color: white;
            background: rgba(255,255,255,0.15);
        }

        .mobile-nav-enhanced .mobile-nav-item:hover {
            color: white;
        }
    </style>
</head>
<body>
    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar Overlay -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <!-- Sidebar Header -->
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <i class="bi bi-bank"></i>
                </div>
                <div class="bank-name">Fundclaim Bank</div>
            </div>

            <!-- User Section -->
            <div class="user-section">
                <div class="user-avatar">JD</div>
                <div class="user-info">
                    <h5>John Doe</h5>
                    <p>Premium Account</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="nav-menu">
                <a href="#" class="nav-item active">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-wallet2"></i>
                    <span>Accounts</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Transfers</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-cash-stack"></i>
                    <span>Deposit</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-credit-card"></i>
                    <span>Cards</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-graph-up"></i>
                    <span>Investments</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-receipt"></i>
                    <span>Statements</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-shield-check"></i>
                    <span>Security</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- Sidebar Footer -->
            <div class="sidebar-footer">
                <button class="sidebar-btn" id="newAccountBtn">
                    <i class="bi bi-plus-circle"></i>
                    <span>New Account</span>
                </button>
                <button class="sidebar-btn secondary" id="helpCenterBtn">
                    <i class="bi bi-question-circle"></i>
                    <span>Help Center</span>
                </button>
            </div>
        </aside>

        <!-- Top Navigation -->
        <nav class="top-nav">
            <button class="nav-toggle" id="navToggle">
                <i class="bi bi-list"></i>
            </button>

            <div class="brand-mobile">Fundclaim Bank</div>

            <div class="nav-spacer"></div>

            <div class="nav-search">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search..." id="searchInput">
            </div>

            <div class="nav-actions">
                <div class="nav-action-btn notification-btn" id="notificationBtn">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">3</span>
                </div>

                <div class="user-dropdown" id="userDropdown">
                    <button class="user-dropdown-btn" id="userDropdownBtn">
                        <div class="user-avatar-sm">JD</div>
                        <span class="d-none d-md-inline">John Doe</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="#" class="dropdown-item" id="profileLink">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                        <a href="#" class="dropdown-item" id="settingsLink">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="dropdown-item" id="securityLink">
                            <i class="bi bi-shield-check"></i>
                            <span>Security</span>
                        </a>
                        <a href="#" class="dropdown-item text-danger" id="logoutLink">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

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