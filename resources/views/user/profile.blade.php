<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Fundclaim Bank</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Dashboard CSS (Same as main dashboard) -->
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

        /* Profile Page Specific Styles */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .page-header p {
            color: var(--secondary);
            font-size: 0.95rem;
        }

        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Profile Header Card */
        .profile-header-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        @media (min-width: 768px) {
            .profile-header-card {
                flex-direction: row;
                text-align: left;
            }
        }

        .profile-avatar-container {
            margin-bottom: 1.5rem;
            position: relative;
        }

        @media (min-width: 768px) {
            .profile-avatar-container {
                margin-bottom: 0;
                margin-right: 2rem;
            }
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary), #667eea);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .change-avatar-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 40px;
            background: white;
            border: 2px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .change-avatar-btn:hover {
            background: var(--light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .profile-role {
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .profile-email {
            color: var(--secondary);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .profile-stats {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--dark);
            display: block;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--secondary);
            margin-top: 2px;
        }

        /* Profile Content Grid */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 992px) {
            .profile-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        .card-action-btn {
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: var(--primary);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-action-btn:hover {
            background: rgba(42, 91, 215, 0.05);
            border-color: var(--primary);
        }

        /* Info List */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .info-value {
            color: var(--secondary);
            font-size: 0.9rem;
            text-align: right;
            max-width: 60%;
        }

        .info-value strong {
            color: var(--dark);
            font-weight: 600;
        }

        /* Security Items */
        .security-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
        }

        .security-item:last-child {
            border-bottom: none;
        }

        .security-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .security-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(42, 91, 215, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .security-details h5 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--dark);
        }

        .security-details p {
            margin: 0.25rem 0 0;
            font-size: 0.85rem;
            color: var(--secondary);
        }

        .security-status {
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-inactive {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: var(--light);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .form-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Verification Badge */
        .verification-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-primary {
            padding: 0.75rem 1.5rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary:hover:not(:disabled) {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn-outline {
            padding: 0.75rem 1.5rem;
            background: transparent;
            color: var(--dark);
            border: 1px solid var(--border);
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
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

        /* Edit Mode */
        .edit-mode .info-value {
            display: none;
        }

        .edit-mode .edit-input {
            display: block;
        }

        .edit-input {
            display: none;
            width: 100%;
        }

        .edit-actions {
            display: none;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .edit-mode .edit-actions {
            display: flex;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    {{-- <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar Overlay (Mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <i class="bi bi-bank"></i>
                </div>
                <div class="bank-name">Fundclaim Bank</div>
            </div>
            
            <div class="user-section">
                <div class="user-avatar">JS</div>
                <div class="user-info">
                    <h5>John Smith</h5>
                    <p>Premium Account</p>
                </div>
            </div>
            
            <nav class="nav-menu">
                <a href="dashboard.html" class="nav-item">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
                <a href="accounts.html" class="nav-item">
                    <i class="bi bi-wallet"></i>
                    <span>Accounts</span>
                </a>
                <a href="transfer.html" class="nav-item">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Transfer Funds</span>
                </a>
                <a href="payments.html" class="nav-item">
                    <i class="bi bi-credit-card"></i>
                    <span>Payments</span>
                </a>
                <a href="transactions.html" class="nav-item">
                    <i class="bi bi-clock-history"></i>
                    <span>Transactions</span>
                </a>
                <a href="profile.html" class="nav-item active">
                    <i class="bi bi-person-circle"></i>
                    <span>My Profile</span>
                </a>
                <a href="settings.html" class="nav-item">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
                <a href="support.html" class="nav-item">
                    <i class="bi bi-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <button class="sidebar-btn" id="newAccountBtn">
                    <i class="bi bi-plus-circle"></i>
                    New Account
                </button>
                <button class="sidebar-btn secondary" id="helpCenterBtn">
                    <i class="bi bi-info-circle"></i>
                    Help Center
                </button>
            </div>
        </aside>
         --}}
        <!-- Top Navigation -->
  @include('user.navbar')
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="profile-container">
                <!-- Page Header -->
                <div class="page-header fade-in">
                    <h1>My Profile</h1>
                    <p>Manage your personal information, security settings, and preferences</p>
                </div>

                <!-- Profile Header Card -->
                <div class="profile-header-card fade-in">
                    <div class="profile-avatar-container">
                        <div class="profile-avatar" id="profileAvatar">{{ Auth::user()->name }}</div>
                        <div class="change-avatar-btn" id="changeAvatarBtn">
                            <i class="bi bi-camera"></i>
                        </div>
                    </div>
                    
                    <div class="profile-info">
                        <h2 class="profile-name" id="profileName">{{ Auth::user()->name }}</h2>
                        {{-- <div class="profile-role">Premium Account Holder</div> --}}
                        <div class="profile-email" id="profileEmail">{{ Auth::user()->email }}</div>
                        
                        {{-- <div class="profile-stats">
                            <div class="stat-item">
                                <span class="stat-value">3</span>
                                <span class="stat-label">Accounts</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">$27,771.25</span>
                                <span class="stat-label">Total Balance</span>
                            </div> --}}
                            <div class="stat-item">
                                <span class="stat-value">Member Since {{ Auth::user()->created_at}}</span>
                                <span class="stat-label">Customer</span>
                            </div>
                        </div>
                    </div>
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

                <!-- Profile Content Grid -->
                <div class="profile-grid">
                    <!-- Personal Information Card -->
                    <div class="profile-card fade-in">
                        <div class="card-header">
                            <h3>Personal Information</h3>
                            <button class="card-action-btn" id="editPersonalInfoBtn">
                                <i class="bi bi-pencil"></i>
                                Edit
                            </button>
                        </div>


<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="info-list" id="personalInfoList">

        <div class="info-item">
            <div class="info-label">Full Name</div>
            <div class="info-value">{{ Auth::user()->name }}</div>
            <input
                type="text"
                class="form-control edit-input"
                name="name"
                value="{{ old('name', Auth::user()->name) }}"
            >
        </div>

        <div class="info-item">
            <div class="info-label">Email Address</div>
            <div class="info-value">{{ Auth::user()->email }}</div>
            <input
                type="email"
                class="form-control edit-input"
                name="email"
                value="{{ old('email', Auth::user()->email) }}"
            >
        </div>

        <div class="info-item">
            <div class="info-label">Phone Number</div>
            <div class="info-value">{{ Auth::user()->phone }}</div>
            <input
                type="tel"
                class="form-control edit-input"
                name="phone"
                value="{{ old('phone', Auth::user()->phone) }}"
            >
        </div>

        <div class="info-item">
            <div class="info-label">Date of Birth</div>
            <div class="info-value">{{ Auth::user()->dob }}</div>
            <input
                type="date"
                class="form-control edit-input"
                name="dob"
                value="{{ old('dob', Auth::user()->dob) }}"
            >
        </div>

        <div class="info-item">
            <div class="info-label">Address</div>
            <div class="info-value">{{ Auth::user()->address }}</div>
            <textarea
                class="form-control edit-input"
                name="address"
                rows="2"
            >{{ old('address', Auth::user()->address) }}</textarea>
        </div>

    </div>

    <div class="edit-actions" id="personalInfoActions">
        <button type="reset" class="btn-outline" id="cancelPersonalEditBtn">
            Cancel
        </button>

        <button type="submit" class="btn-primary" id="savePersonalInfoBtn">
            <span>Save Changes</span>
            <div class="loading-spinner" id="personalInfoSpinner"></div>
        </button>
    </div>
</form>
</div>

                    <!-- Account Information Card -->
                    <div class="profile-card fade-in">
                        <div class="card-header">
                            <h3>Account Information</h3>
                        </div>
                        
                        <div class="info-list">
                            {{-- <div class="info-item">
                                <div class="info-label">Account Type</div>
                                <div class="info-value"><strong>Premium Checking</strong></div>
                            </div> --}}
                            <div class="info-item">
                                <div class="info-label">ID Number</div>
                                <div class="info-value">{{ Auth::user()->id_number }}</div>
                            </div>
                            {{-- <div class="info-item">
                                <div class="info-label">Routing Number</div>
                                <div class="info-value">021000021</div>
                            </div> --}}
                            <div class="info-item">
                                <div class="info-label">Member Since</div>
                                <div class="info-value">{{ Auth::user()->created_at }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Account Status</div>
                                <div class="info-value">
                                    <strong>Active</strong>
                                    <span class="verification-badge">
                                        <i class="bi bi-shield-check"></i>
                                        Verified
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Security Settings Card -->
                    <div class="profile-card fade-in">
                        <div class="card-header">
                            <h3>Security Settings</h3>
                        </div>
                        
                        <div class="security-list">
                            <div class="security-item">
                                <div class="security-info">
                                    <div class="security-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                    <div class="security-details">
                                        <h5>Two-Factor Authentication</h5>
                                        <p>Add an extra layer of security to your account</p>
                                    </div>
                                </div>
                                <div class="security-status status-active">Active</div>
                            </div>
                            
                            <div class="security-item">
                                <div class="security-info">
                                    <div class="security-icon">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div class="security-details">
                                        <h5>Password</h5>
                                        
                                    </div>
                                </div>
                                <button class="card-action-btn" id="changePasswordBtn">
                                    <i class="bi bi-arrow-clockwise"></i>
                                    Change
                                </button>
                            </div>
                            
                           
                            
                            </div> 
                    </div>

                 

                <!-- Change Password Modal (Hidden by default) -->
                <div class="profile-card fade-in" id="changePasswordCard" style="display: none;">
                    <div class="card-header">
                        <h3>Change Password</h3>
                        <button class="card-action-btn" id="closePasswordBtn">
                            <i class="bi bi-x"></i>
                            Close
                        </button>
                    </div>
                    
                    <form id="changePasswordForm">
                        <div class="form-group">
                            <label class="form-label" for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" required>
                                <div class="form-note">Minimum 8 characters with letters and numbers</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </div>
                        
                        <div class="action-buttons">
                            <button type="button" class="btn-outline" id="cancelPasswordBtn">Cancel</button>
                            <button type="submit" class="btn-primary" id="submitPasswordBtn">
                                <span>Update Password</span>
                                <div class="loading-spinner" id="passwordSpinner"></div>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Danger Zone -->
                <div class="profile-card fade-in">
                    <div class="card-header">
                        <h3 style="color: var(--danger);">Danger Zone</h3>
                    </div>
                    
                    <div class="info-list">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-download me-1"></i>
                                Export Account Data
                            </div>
                            <div class="info-value">
                                <button class="btn-outline" id="exportDataBtn">
                                    <i class="bi bi-download"></i>
                                    Export
                                </button>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-trash me-1"></i>
                                Close Account
                            </div>
                            <div class="info-value">
                                <button class="btn-outline" id="closeAccountBtn" style="color: var(--danger); border-color: var(--danger);">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    Close Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Bottom Navigation -->
    <nav class="mobile-nav">
        <a href="{{ route('home') }}" class="mobile-nav-item">
            <i class="bi bi-house-door"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('transfers') }}" class="mobile-nav-item">
            <i class="bi bi-arrow-left-right"></i>
            <span>Transfer</span>
        </a>
        {{-- <a href="accounts.html" class="mobile-nav-item">
            <i class="bi bi-wallet"></i>
            <span>Accounts</span>
        </a> --}}
        <a href="{{ route('profile') }}" class="mobile-nav-item active">
            <i class="bi bi-person-circle"></i>
            <span>Profile</span>
        </a>
    </nav>

    <!-- Profile Page JavaScript -->
    <script>
        // Initialize profile page
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize sidebar toggle
            initSidebarToggle();
            
            // Initialize dropdown
            initDropdown();
            
            // Initialize mobile navigation
            initMobileNavigation();
            
            // Initialize profile functionality
            initProfileFunctionality();
            
            // Initialize other interactive elements
            initInteractiveElements();
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
                
                // Handle logout
                const logoutLink = document.getElementById('logoutLink');
                if (logoutLink) {
                    logoutLink.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (confirm('Are you sure you want to logout?')) {
                            showNotification('Logged out successfully');
                            // In real app, redirect to login page
                            // window.location.href = '/login';
                        }
                    });
                }
            }
        }

        // Mobile navigation functionality
        function initMobileNavigation() {
            const mobileNavItems = document.querySelectorAll('.mobile-nav-item');
            
            mobileNavItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    if (this.id === 'mobileLogout') {
                        e.preventDefault();
                        if (confirm('Are you sure you want to logout?')) {
                            showNotification('Logged out successfully');
                        }
                        return;
                    }
                    
                    // Remove active class from all items
                    mobileNavItems.forEach(i => i.classList.remove('active'));
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                });
            });
        }

        // Initialize profile functionality
        function initProfileFunctionality() {
            // Personal Information Edit
            const editPersonalInfoBtn = document.getElementById('editPersonalInfoBtn');
            const cancelPersonalEditBtn = document.getElementById('cancelPersonalEditBtn');
            const savePersonalInfoBtn = document.getElementById('savePersonalInfoBtn');
            const personalInfoList = document.getElementById('personalInfoList');
            
            if (editPersonalInfoBtn) {
                editPersonalInfoBtn.addEventListener('click', function() {
                    personalInfoList.parentElement.classList.add('edit-mode');
                });
            }
            
            if (cancelPersonalEditBtn) {
                cancelPersonalEditBtn.addEventListener('click', function() {
                    personalInfoList.parentElement.classList.remove('edit-mode');
                    resetPersonalInfoForm();
                });
            }
            
            if (savePersonalInfoBtn) {
                savePersonalInfoBtn.addEventListener('click', function() {
                    savePersonalInfo();
                });
            }
            
            // Preferences Edit
            const editPreferencesBtn = document.getElementById('editPreferencesBtn');
            const cancelPreferencesEditBtn = document.getElementById('cancelPreferencesEditBtn');
            const savePreferencesBtn = document.getElementById('savePreferencesBtn');
            const preferencesList = document.getElementById('preferencesList');
            
            if (editPreferencesBtn) {
                editPreferencesBtn.addEventListener('click', function() {
                    preferencesList.parentElement.classList.add('edit-mode');
                });
            }
            
            if (cancelPreferencesEditBtn) {
                cancelPreferencesEditBtn.addEventListener('click', function() {
                    preferencesList.parentElement.classList.remove('edit-mode');
                    resetPreferencesForm();
                });
            }
            
            if (savePreferencesBtn) {
                savePreferencesBtn.addEventListener('click', function() {
                    savePreferences();
                });
            }
            
            // Change Password
            const changePasswordBtn = document.getElementById('changePasswordBtn');
            const closePasswordBtn = document.getElementById('closePasswordBtn');
            const cancelPasswordBtn = document.getElementById('cancelPasswordBtn');
            const changePasswordCard = document.getElementById('changePasswordCard');
            const changePasswordForm = document.getElementById('changePasswordForm');
            
            if (changePasswordBtn) {
                changePasswordBtn.addEventListener('click', function() {
                    changePasswordCard.style.display = 'block';
                    changePasswordCard.scrollIntoView({ behavior: 'smooth' });
                });
            }
            
            if (closePasswordBtn) {
                closePasswordBtn.addEventListener('click', function() {
                    changePasswordCard.style.display = 'none';
                });
            }
            
            if (cancelPasswordBtn) {
                cancelPasswordBtn.addEventListener('click', function() {
                    changePasswordCard.style.display = 'none';
                    changePasswordForm.reset();
                });
            }
            
            if (changePasswordForm) {
                changePasswordForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    changePassword();
                });
            }
            
            // Other security buttons
            const manageDevicesBtn = document.getElementById('manageDevicesBtn');
            const viewLoginActivityBtn = document.getElementById('viewLoginActivityBtn');
            
            if (manageDevicesBtn) {
                manageDevicesBtn.addEventListener('click', function() {
                    showNotification('Device management feature would open here', 'info');
                });
            }
            
            if (viewLoginActivityBtn) {
                viewLoginActivityBtn.addEventListener('click', function() {
                    showNotification('Login activity feature would open here', 'info');
                });
            }
            
            // Danger zone buttons
            const exportDataBtn = document.getElementById('exportDataBtn');
            const closeAccountBtn = document.getElementById('closeAccountBtn');
            
            if (exportDataBtn) {
                exportDataBtn.addEventListener('click', function() {
                    if (confirm('Your account data will be exported as a PDF file. Continue?')) {
                        showNotification('Exporting account data...', 'info');
                        // Simulate export
                        setTimeout(() => {
                            showNotification('Account data exported successfully!', 'success');
                        }, 2000);
                    }
                });
            }
            
            if (closeAccountBtn) {
                closeAccountBtn.addEventListener('click', function() {
                    if (confirm('WARNING: This will permanently close your account. All data will be deleted. This action cannot be undone. Are you absolutely sure?')) {
                        showNotification('Account closure request submitted. A representative will contact you shortly.', 'warning');
                    }
                });
            }
            
            // Change avatar
            const changeAvatarBtn = document.getElementById('changeAvatarBtn');
            if (changeAvatarBtn) {
                changeAvatarBtn.addEventListener('click', function() {
                    showNotification('Avatar change feature would open here', 'info');
                });
            }
        }

        // Reset personal info form
        function resetPersonalInfoForm() {
            // Reset all inputs to their current displayed values
            const fullNameInput = document.getElementById('fullNameInput');
            const fullNameValue = document.getElementById('fullNameValue');
            if (fullNameInput && fullNameValue) {
                fullNameInput.value = fullNameValue.textContent;
            }
            
            const emailInput = document.getElementById('emailInput');
            const emailValue = document.getElementById('emailValue');
            if (emailInput && emailValue) {
                emailInput.value = emailValue.textContent;
            }
            
            const phoneInput = document.getElementById('phoneInput');
            const phoneValue = document.getElementById('phoneValue');
            if (phoneInput && phoneValue) {
                phoneInput.value = phoneValue.textContent;
            }
            
            // Note: In a real app, you would parse the date from the displayed value
        }

        // Reset preferences form
        function resetPreferencesForm() {
            // Reset all inputs to their current displayed values
            const languageInput = document.getElementById('languageInput');
            const languageValue = document.getElementById('languageValue');
            if (languageInput && languageValue) {
                languageInput.value = 'en-US'; // Default
            }
            
            const currencyInput = document.getElementById('currencyInput');
            const currencyValue = document.getElementById('currencyValue');
            if (currencyInput && currencyValue) {
                currencyInput.value = 'USD'; // Default
            }
        }

        // Save personal information
        function savePersonalInfo() {
            const fullNameInput = document.getElementById('fullNameInput');
            const emailInput = document.getElementById('emailInput');
            const phoneInput = document.getElementById('phoneInput');
            const dobInput = document.getElementById('dobInput');
            const addressInput = document.getElementById('addressInput');
            
            const fullNameValue = document.getElementById('fullNameValue');
            const emailValue = document.getElementById('emailValue');
            const phoneValue = document.getElementById('phoneValue');
            const dobValue = document.getElementById('dobValue');
            const addressValue = document.getElementById('addressValue');
            
            // Validate form
            if (!fullNameInput.value.trim()) {
                showNotification('Please enter your full name', 'warning');
                fullNameInput.focus();
                return;
            }
            
            if (!emailInput.value.trim() || !isValidEmail(emailInput.value)) {
                showNotification('Please enter a valid email address', 'warning');
                emailInput.focus();
                return;
            }
            
            // Show loading state
            const saveBtn = document.getElementById('savePersonalInfoBtn');
            const spinner = document.getElementById('personalInfoSpinner');
            const btnText = saveBtn.querySelector('span');
            const originalText = btnText.textContent;
            
            btnText.textContent = 'Saving...';
            spinner.style.display = 'block';
            saveBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Update displayed values
                fullNameValue.textContent = fullNameInput.value;
                emailValue.textContent = emailInput.value;
                phoneValue.textContent = phoneInput.value;
                
                // Format date for display
                if (dobInput.value) {
                    const dobDate = new Date(dobInput.value);
                    dobValue.textContent = dobDate.toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });
                }
                
                addressValue.innerHTML = addressInput.value.replace(/\n/g, '<br>');
                
                // Also update profile header
                document.getElementById('profileName').textContent = fullNameInput.value;
                document.getElementById('profileEmail').textContent = emailInput.value;
                document.getElementById('profileAvatar').textContent = getInitials(fullNameInput.value);
                document.querySelectorAll('.user-avatar').forEach(el => {
                    el.textContent = getInitials(fullNameInput.value);
                });
                document.querySelectorAll('.user-avatar-sm').forEach(el => {
                    el.textContent = getInitials(fullNameInput.value);
                });
                document.querySelector('.user-dropdown-btn span').textContent = fullNameInput.value;
                
                // Exit edit mode
                document.getElementById('personalInfoList').parentElement.classList.remove('edit-mode');
                
                // Reset button
                btnText.textContent = originalText;
                spinner.style.display = 'none';
                saveBtn.disabled = false;
                
                showNotification('Personal information updated successfully!', 'success');
            }, 1500);
        }

        // Save preferences
        function savePreferences() {
            const languageInput = document.getElementById('languageInput');
            const currencyInput = document.getElementById('currencyInput');
            const timezoneInput = document.getElementById('timezoneInput');
            
            const languageValue = document.getElementById('languageValue');
            const currencyValue = document.getElementById('currencyValue');
            const timezoneValue = document.getElementById('timezoneValue');
            const emailNotificationsValue = document.getElementById('emailNotificationsValue');
            
            // Show loading state
            const saveBtn = document.getElementById('savePreferencesBtn');
            const spinner = document.getElementById('preferencesSpinner');
            const btnText = saveBtn.querySelector('span');
            const originalText = btnText.textContent;
            
            btnText.textContent = 'Saving...';
            spinner.style.display = 'block';
            saveBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Update displayed values
                languageValue.textContent = languageInput.options[languageInput.selectedIndex].text;
                currencyValue.textContent = currencyInput.options[currencyInput.selectedIndex].text;
                timezoneValue.textContent = timezoneInput.options[timezoneInput.selectedIndex].text;
                
                // Build email notifications string
                const notifications = [];
                if (document.getElementById('notifyTransactions').checked) notifications.push('transactions');
                if (document.getElementById('notifySecurity').checked) notifications.push('security');
                if (document.getElementById('notifyMarketing').checked) notifications.push('marketing');
                
                if (notifications.length === 3) {
                    emailNotificationsValue.textContent = 'All';
                } else if (notifications.length === 0) {
                    emailNotificationsValue.textContent = 'None';
                } else if (notifications.length === 2 && !document.getElementById('notifyMarketing').checked) {
                    emailNotificationsValue.textContent = 'All except marketing';
                } else {
                    emailNotificationsValue.textContent = notifications.join(', ');
                }
                
                // Exit edit mode
                document.getElementById('preferencesList').parentElement.classList.remove('edit-mode');
                
                // Reset button
                btnText.textContent = originalText;
                spinner.style.display = 'none';
                saveBtn.disabled = false;
                
                showNotification('Preferences updated successfully!', 'success');
            }, 1500);
        }

        // Change password
        function changePassword() {
            const currentPassword = document.getElementById('currentPassword');
            const newPassword = document.getElementById('newPassword');
            const confirmPassword = document.getElementById('confirmPassword');
            
            // Validate form
            if (!currentPassword.value) {
                showNotification('Please enter your current password', 'warning');
                currentPassword.focus();
                return;
            }
            
            if (!newPassword.value || newPassword.value.length < 8) {
                showNotification('New password must be at least 8 characters', 'warning');
                newPassword.focus();
                return;
            }
            
            if (!hasLetterAndNumber(newPassword.value)) {
                showNotification('New password must contain both letters and numbers', 'warning');
                newPassword.focus();
                return;
            }
            
            if (newPassword.value !== confirmPassword.value) {
                showNotification('New passwords do not match', 'warning');
                confirmPassword.focus();
                return;
            }
            
            // Show loading state
            const submitBtn = document.getElementById('submitPasswordBtn');
            const spinner = document.getElementById('passwordSpinner');
            const btnText = submitBtn.querySelector('span');
            const originalText = btnText.textContent;
            
            btnText.textContent = 'Updating...';
            spinner.style.display = 'block';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset form
                document.getElementById('changePasswordForm').reset();
                document.getElementById('changePasswordCard').style.display = 'none';
                
                // Reset button
                btnText.textContent = originalText;
                spinner.style.display = 'none';
                submitBtn.disabled = false;
                
                showNotification('Password updated successfully!', 'success');
            }, 1500);
        }

        // Initialize other interactive elements
        function initInteractiveElements() {
            // Sidebar buttons
            const sidebarButtons = {
                newAccountBtn: 'New Account',
                helpCenterBtn: 'Help Center'
            };
            
            Object.keys(sidebarButtons).forEach(btnId => {
                const btn = document.getElementById(btnId);
                if (btn) {
                    btn.addEventListener('click', function() {
                        const action = sidebarButtons[btnId];
                        showNotification(`${action} feature would open here`, 'info');
                    });
                }
            });
            
            // Notification bell
            const notificationBtn = document.getElementById('notificationBtn');
            if (notificationBtn) {
                notificationBtn.addEventListener('click', function() {
                    const badge = this.querySelector('.notification-badge');
                    if (badge && badge.textContent !== '0') {
                        badge.textContent = '0';
                        badge.style.opacity = '0.5';
                        showNotification('Notifications cleared', 'success');
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
                            showNotification(`Searching for "${this.value}"...`, 'info');
                        }
                    }, 500);
                });
            }
        }

        // Utility functions
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function hasLetterAndNumber(str) {
            return /[a-zA-Z]/.test(str) && /[0-9]/.test(str);
        }

        function getInitials(name) {
            return name.split(' ').map(part => part[0]).join('').toUpperCase();
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
            
            // Set colors based on type
            if (type === 'success') {
                toast.style.background = '#10b981';
                toast.style.color = 'white';
                toast.style.border = '1px solid #059669';
            } else if (type === 'warning') {
                toast.style.background = '#f59e0b';
                toast.style.color = '#78350f';
                toast.style.border = '1px solid #d97706';
            } else if (type === 'info') {
                toast.style.background = '#3b82f6';
                toast.style.color = 'white';
                toast.style.border = '1px solid #1d4ed8';
            } else {
                toast.style.background = '#1e293b';
                toast.style.color = 'white';
                toast.style.border = '1px solid #334155';
            }
            
            const icon = type === 'success' ? 'check-circle' : 
                        type === 'warning' ? 'exclamation-triangle' : 
                        type === 'info' ? 'info-circle' : 'bell';
            
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-${icon} me-2"></i>
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

        // Make functions globally available
        window.showNotification = showNotification;
    </script>
</body>
</html>