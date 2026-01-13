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
                <div class="user-avatar">{{ Auth::user()->name }}</div>
                <div class="user-info">
                    <h5>{{ Auth::user()->name }}</h5>
                    {{-- <p>Premium Account</p> --}}
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="nav-menu">
                <a href="#" class="nav-item active">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
                 <a href="#" class="nav-item">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Transfers</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-wallet2"></i>
                    <span>Profile</span>
                </a>
               
                {{-- <a href="#" class="nav-item">
                    <i class="bi bi-cash-stack"></i>
                    <span>Deposit</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="bi bi-credit-card"></i>
                    <span>Cards</span>
                </a> --}}
                {{-- <a href="#" class="nav-item">
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
                </a> --}}
                <a href="#" class="nav-item">
                    <i class="bi bi-gear"></i>
                    <span>Logout</span>
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

            {{-- <div class="nav-search">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search..." id="searchInput">
            </div> --}}

            <div class="nav-actions">
                {{-- <div class="nav-action-btn notification-btn" id="notificationBtn">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">3</span>
                </div> --}}

                <div class="user-dropdown" id="userDropdown">
                    <button class="user-dropdown-btn" id="userDropdownBtn">
                        <div class="user-avatar-sm">{{ Auth::user()->name }}</div>
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="#" class="dropdown-item" id="profileLink">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                        {{-- <a href="#" class="dropdown-item" id="settingsLink">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="dropdown-item" id="securityLink">
                            <i class="bi bi-shield-check"></i>
                            <span>Security</span>
                        </a> --}}
                        <a href="#" class="dropdown-item text-danger" id="logoutLink">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>