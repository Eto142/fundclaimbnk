@include('admin.header')

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Enhanced Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <div class="mb-3 mb-md-0">
            <h1 class="h3 mb-1">User Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                </ol>
            </nav>
        </div>
        <div class="d-flex flex-wrap gap-2">
            {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Tax Code
            </button> --}}

             <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateConversionModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Crypto Deposit Amount
            </button>

            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateWithdrawalStatusModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Conversion Payment Button
            </button>

              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateConvertStatusModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Convert Button
            </button>

               <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateSuspendStatusModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Suspend/unsuspend Button
            </button>

            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateFiatBalanceModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Fiat Balance
            </button>
        </div>
    </div>

    <!-- Alert Container -->
    <div class="alert-container">
        @if(session('success') || session('error'))
            <div class="alert alert-dismissible fade show custom-alert 
                {{ session('success') ? 'alert-success' : 'alert-danger' }}" 
                role="alert" id="flashAlert">
                
                @if(session('success'))
                    <strong>✅ Success!</strong> {{ session('success') }}
                @else
                    <strong>❌ Error!</strong> {{ session('error') }}
                @endif
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <style>
                .custom-alert {
                    border-radius: 10px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    font-size: 0.95rem;
                    font-weight: 500;
                    padding: 12px 16px;
                }
                .custom-alert.fade-out {
                    opacity: 0;
                    transition: opacity 0.6s ease;
                }
            </style>

            <script>
                setTimeout(function () {
                    let alertEl = document.getElementById('flashAlert');
                    if (alertEl) {
                        alertEl.classList.add('fade-out');
                        setTimeout(() => {
                            let alert = new bootstrap.Alert(alertEl);
                            alert.close();
                        }, 600);
                    }
                }, 3500);
            </script>
        @endif
    </div>

    <div class="row">
        <!-- Left Column - Enhanced Profile Card -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <!-- Profile Photo -->
                    <div class="position-relative mb-3 mx-auto" style="width: 150px; height: 150px;">
                        <div class="rounded-circle shadow w-100 h-100 d-flex align-items-center justify-content-center bg-primary text-white fw-bold fs-4">
                            {{ strtoupper(substr($userProfile->name, 0, 1) . substr($userProfile->name, 0, 1)) }}
                        </div>
                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-3 border-white">
                            <i class="fas fa-check text-white"></i>
                        </span>
                    </div>
                    
                    <h3 class="mb-1">{{ $userProfile->name }}</h3>
                    <p class="text-muted mb-3">{{ $userProfile->email }}</p>
                    
                    <!-- Contact Buttons -->
                    <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                        <a href="mailto:{{ $userProfile->email }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-envelope me-1"></i> Email
                        </a>
                        <a href="tel:+{{ $userProfile->phone }}" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-phone me-1"></i> Call
                        </a>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Tax Code
                        </button>
                    </div>
                    
                    <hr>

        <!-- Verification Status Cards -->
<div class="row g-3 mb-3">
    <div class="col-12 col-md-6">
        <div class="card bg-success bg-opacity-10 border-success h-100">
            <div class="card-body p-2 text-center">
                <h6 class="card-title text-success mb-1">Fiat Amount</h6>
                <p class="card-text fw-bold fs-5 mb-0">${{ $fiat_amount }}</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card bg-success bg-opacity-10 border-success h-100">
            <div class="card-body p-2 text-center">
                <h6 class="card-title text-success mb-1">Crypto Deposit Amount</h6>
                <p class="card-text fw-bold fs-5 mb-0">${{ $deposit_amount }}</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card bg-success bg-opacity-10 border-success h-100">
            <div class="card-body p-2 text-center">
                <h6 class="card-title text-success mb-1">Total Conversion Amount</h6>
                <p class="card-text fw-bold fs-5 mb-0">${{ $conversion_amount }}</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card bg-success bg-opacity-10 border-success h-100">
            <div class="card-body p-2 text-center">
                <h6 class="card-title text-success mb-1">Conversion Payment Button Status</h6>
                <p class="card-text fw-bold fs-5 mb-0">
                    @if($userProfile->withdrawal_status == 1)
                        Activated <i class="fas fa-check-circle text-success"></i>
                    @else
                        Deactivated <i class="fas fa-times-circle text-danger"></i>
                    @endif
                </p>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6">
        <div class="card bg-warning bg-opacity-10 border-success h-100">
            <div class="card-body p-2 text-center">
                <h6 class="card-title text-success mb-1">User Suspension Status</h6>
                <p class="card-text fw-bold fs-5 mb-0">
                    @if($userProfile->suspended == 1)
                        Suspension Activated <i class="fas fa-check-circle text-success"></i>
                    @else
                        Deactivated <i class="fas fa-times-circle text-danger"></i>
                    @endif
                </p>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6">
        <div class="card bg-primary bg-opacity-10 border-success h-100">
            <div class="card-body p-2 text-center">
                <h6 class="card-title text-success mb-1">Convert Button Status</h6>
                <p class="card-text fw-bold fs-5 mb-0">
                    @if($userProfile->conversion_status == 1)
                        Activated <i class="fas fa-check-circle text-success"></i>
                    @else
                        Deactivated <i class="fas fa-times-circle text-danger"></i>
                    @endif
                </p>
            </div>
        </div>
    </div>






                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column - Enhanced User Details -->
        <div class="col-lg-8">
            <!-- Personal Information Card -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>Personal Information</h5>
                    <span class="badge bg-success">Verified</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Full Name</label>
                            <div class="fw-semibold">{{ $userProfile->name }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Email Address</label>
                            <div class="fw-semibold d-flex align-items-center">
                                {{ $userProfile->email }}
                                <span class="badge bg-success ms-2">Verified</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Phone Number</label>
                            <div class="fw-semibold">{{ $userProfile->phone }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">SSN</label>
                            <div class="fw-semibold">{{ $userProfile->ssn }}</div>
                        </div>

                         <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Access Code</label>
                            <div class="fw-semibold">{{ $userProfile->access_code }}</div>
                        </div>

<div class="col-md-6 mb-3">
    <label class="form-label text-muted small">Front ID</label>
    @if($userProfile->front_id)
        <img src="{{ asset('storage/' . $userProfile->front_id) }}" alt="Front ID" class="img-fluid rounded">
    @else
        <div class="text-muted">No front ID uploaded</div>
    @endif
</div>

<div class="col-md-6 mb-3">
    <label class="form-label text-muted small">Back ID</label>
    @if($userProfile->back_id)
        <img src="{{ asset('storage/' . $userProfile->back_id) }}" alt="Back ID" class="img-fluid rounded">
    @else
        <div class="text-muted">No back ID uploaded</div>
    @endif
</div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Address</label>
                            <div class="fw-semibold">{{ $userProfile->address }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Employment</label>
                            <div class="fw-semibold">{{ $userProfile->employment }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Account Activity Section -->
            <div class="card">
                <div class="card-header bg-white p-0">
                    <ul class="nav nav-tabs card-header-tabs flex-nowrap overflow-auto" id="activityTabs" role="tablist">
                        <!-- Verification Tab First -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-4 py-3 fw-bold" id="verification-tab" data-bs-toggle="tab" data-bs-target="#conversions" type="button" role="tab">
                                <i class="fas fa-shield-alt me-2"></i> Conversion
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-3 fw-bold" id="withdrawals-tab" data-bs-toggle="tab" data-bs-target="#withdrawals" type="button" role="tab">
                                <i class="fas fa-money-bill-wave me-2"></i> Withdrawals
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-0">
                    <div class="tab-content p-3" id="activityTabsContent">
                        <!-- Conversions Tab (first and active) -->
                        <div class="tab-pane fade show active" id="conversions" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>From Currency</th>
                                            <th>To Currency</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($user_conversion as $conversion)
                                            <tr>
                                                <td>{{ $conversion->created_at->format('M d, Y') }}</td>
                                                <td>{{ strtoupper($conversion->from_crypto ?? 'N/A') }}</td>
                                                <td>{{ strtoupper($conversion->to_currency ?? 'N/A') }}</td>
                                                <td>${{ number_format($conversion->amount, 2) }}</td>
                                                 <td> @if(isset($conversion->status))
        {{ $conversion->status == 1 ? 'Approved' : 'Pending' }}
    @else
        N/A
    @endif</td>
                                                <td>
                
                        <form action="{{ route('admin.conversion.approve', $conversion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>

                        <form action="{{ route('admin.conversion.decline', $conversion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                        </form>
                   
                </td>
            
        
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No conversions found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Withdrawals Tab -->
                        <div class="tab-pane fade" id="withdrawals" role="tabpanel">
                            <div class="table-responsive">
                              <table class="table table-hover table-sm">
    <thead class="table-light">
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Bank Name</th>
            <th>Account Name</th>
            <th>Account Number</th>
            <th>SWIFT Code</th>
            <th>Narration</th>
            <th>Crypto Network</th>
            <th>Wallet Address</th>
            <th>Status</th>
            <th>Actions</th> <!-- Added Actions column -->
        </tr>
    </thead>
    <tbody>
        @forelse($user_withdrawal as $withdrawal)
            <tr>
                <td>{{ $withdrawal->created_at->format('M d, Y') }}</td>
                <td>${{ number_format($withdrawal->amount, 2) }}</td>
                <td>{{ $withdrawal->bank_name ?? '—' }}</td>
                <td>{{ $withdrawal->account_name ?? '—' }}</td>
                <td>{{ $withdrawal->account_number ?? '—' }}</td>
                <td>{{ $withdrawal->swift_code ?? '—' }}</td>
                <td>{{ $withdrawal->narration ?? '—' }}</td>
                <td>{{ $withdrawal->crypto_network ?? '—' }}</td>
                <td>{{ $withdrawal->wallet_address ?? '—'}}</td>
                
                <td>
                    @if($withdrawal->status == 1)
                        <span class="badge bg-success">Completed</span>
                    @elseif($withdrawal->status == 0)
                        <span class="badge bg-warning">Pending</span>
                    @else
                        <span class="badge bg-danger">Failed</span>
                    @endif
                </td>
                <td>
                   
                        <form action="{{ route('admin.withdrawal.approve', $withdrawal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>

                        <form action="{{ route('admin.withdrawal.decline', $withdrawal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                        </form>
                
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center text-muted">No withdrawals found</td>
            </tr>
        @endforelse
    </tbody>
</table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="updateFiatBalanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.add.fiat.balance',$userProfile->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                   
                    <div class="mb-3">
                        <label class="form-label fw-bold">Amount</label>
                        <input type="text" class="form-control" name="fiat_amount" value="Enter Fiat Amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Fiat Balance</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateWithdrawalStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update Withdrawal Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.withdrawal.status', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Withdrawal Status</label>
                        <select class="form-select" name="withdrawal_status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="updateConvertStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update convert Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.convert.status', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Convert Status</label>
                        <select class="form-select" name="conversion_status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="modal fade" id="updateSuspendStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update suspend user Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.suspend.user', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Suspension Status</label>
                        <select class="form-select" name="suspended" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="modal fade" id="updateConversionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Crypto Deposit Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.add.deposit')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$userProfile->id}}"/>
                	
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Deposit Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter Conversion Amount" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Deposit Amount</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>

<style>
    /* Alert Styles */
    .alert-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        width: 100%;
        max-width: 400px;
        padding: 0 15px;
    }

    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .alert-content {
        display: flex;
        align-items: center;
        padding: 15px;
        position: relative;
    }

    .alert-icon {
        margin-right: 12px;
        display: flex;
        align-items: center;
    }

    .alert-icon svg {
        width: 20px;
        height: 20px;
    }

    .alert-text {
        flex: 1;
        font-size: 14px;
        line-height: 1.4;
    }

    .btn-close {
        background: none;
        border: none;
        padding: 0;
        margin-left: 12px;
        opacity: 0.7;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .btn-close:hover {
        opacity: 1;
    }

    .btn-close svg {
        width: 16px;
        height: 16px;
    }

    .alert-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.3);
        animation: progressBar 5s linear forwards;
    }

    @keyframes progressBar {
        0% { width: 100%; }
        100% { width: 0%; }
    }

    /* Enhanced Styles */
    .nav-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #6c757d;
    }
    
    .nav-tabs .nav-link.active {
        color: #4e73df;
        border-bottom-color: #4e73df;
        background: transparent;
    }
    
    .card-header {
        padding: 1rem 1.25rem;
    }
    
    .table-sm td, .table-sm th {
        padding: 0.75rem;
    }
</style>

@include('admin.footer')