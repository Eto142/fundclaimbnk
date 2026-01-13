  <nav class="mobile-nav mobile-nav-enhanced">
            <a href="#" class="mobile-nav-item active" id="mobileDashboard">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            {{-- <a href="#" class="mobile-nav-item" id="mobileDeposit">
                <i class="bi bi-cash-stack"></i>
                <span>Deposit</span>
            </a> --}}
            <a href="{{ route('transfers') }}" class="mobile-nav-item" id="mobileTransfer">
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