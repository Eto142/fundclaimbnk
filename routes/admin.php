<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\ConversionController;
use App\Http\Controllers\Admin\CreditDebitController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\FiatBalanceController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ManageEscrowController;
use App\Http\Controllers\Admin\ManageLoanController;
use App\Http\Controllers\Admin\ManagePaymentController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\WithdrawalController;
use Illuminate\Support\Facades\Route;










     Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    });
    
  Route::get('/users', [ManageUserController::class, 'ManageUsers'])->name('users'); // becomes 'admin.user'
  Route::get('/show', [ManageUserController::class, 'ShowUsers'])->name('show'); // becomes 'admin.user'
  Route::get('/profile/{id}/', [ManageUserController::class, 'userProfile'])->name('profile');
  Route::delete('/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('delete');


  
  Route::post('/add-deposit', [DepositController::class, 'AddUserDeposit'])->name('add.deposit');

    Route::post('/add-conversion', [DepositController::class, 'AddUserConversion'])->name('add.conversion');

// Approve a withdrawal
Route::post('/admin/withdrawal/{id}/approve', [WithdrawalController::class, 'approve'])
    ->name('withdrawal.approve');
   

// Decline a withdrawal
Route::post('/admin/withdrawal/{id}/decline', [WithdrawalController::class, 'decline'])
    ->name('withdrawal.decline');



 Route::post('add-fiat-balance{user}', [FiatBalanceController::class, 'AddFiatBalance'])->name('add.fiat.balance');
// Route::match(['get', 'post'], 'add-fiat-balance', [CreditDebitController::class, 'creditUser'])->name('credit.user');


 
    // Approve a withdrawal
Route::post('add.conversion.balance/{user}', [ConversionController::class, 'AddConversionBalance'])
    ->name('add.conversion.balance');
   

    // Approve a withdrawal
Route::post('/admin/conversion/{id}/approve', [ConversionController::class, 'approve'])
    ->name('conversion.approve');
   

// Decline a withdrawal
Route::post('/admin/conversion/{id}/decline', [ConversionController::class, 'decline'])
    ->name('conversion.decline');





      //loan controller
    Route::get('user_loans', [ManageLoanController::class, 'UsersLoans'])->name('loans');
    Route::post('add.loans', [ManageLoanController::class, 'AddUserLoan'])->name('add.loans');
    Route::post('add.outstandingloan', [ManageLoanController::class, 'AddUserOutstandingBalance'])->name('add.outstandingloan');
    Route::post('add.interestrate', [ManageLoanController::class, 'AddInterestRate'])->name('add.interestrate');
    Route::post('add-monthlypay', [ManageLoanController::class, 'AddMonthlyPay'])->name('add.monthlypay');
  
  Route::prefix('admin/mail')->group(function() {
    Route::get('/compose/{user}', [MailController::class, 'compose'])->name('mail.compose');
    Route::post('/send', [MailController::class, 'send'])->name('users.send-mail');
    Route::get('/history', [MailController::class, 'history'])->name('admin.mail.history');

    Route::match(['get', 'post'], 'credit-user', [CreditDebitController::class, 'creditUser'])->name('credit.user');
 Route::match(['get', 'post'], 'debit-user', [CreditDebitController::class, 'debitUser'])->name('debit.user');


//DepositController 
   Route::post('/approve-deposit/{id}', [DepositController::class, 'ApproveDeposit'])->name('approve-deposit');
  Route::post('/decline-deposit/{id}', [DepositController::class, 'DeclineDeposit'])->name('decline-deposit');

  //transaction controller
   Route::get('user_transactions', [TransactionController::class, 'usersTransaction'])->name('transactions');
    Route::post('add-transaction/{id}', [ManageUserController::class, 'addTransaction'])
    ->name('add.transaction');

     Route::post('withdrawal_tax_code/{id}', [ManageUserController::class, 'WithdrawalTaxCode'])
    ->name('withdrawal.tax.code');

        Route::post('withdrawal_status/{id}', [ManageUserController::class, 'WithdrawalStatus'])
    ->name('withdrawal.status');

            Route::post('convert_status/{id}', [ManageUserController::class, 'ConvertStatus'])
    ->name('convert.status');

              Route::post('suspend-user/{id}', [ManageUserController::class, 'SuspendUser'])
    ->name('suspend.user');

    



    //manage escrow ;
// Approve escrow verification
Route::post('/escrow/{id}/approve', [ManageEscrowController::class, 'approve'])->name('escrow.approve');

// Decline escrow verification
Route::post('/escrow/{id}/decline', [ManageEscrowController::class, 'decline'])->name('escrow.decline');

//Manage Payment
   Route::get('manage-payment', [ManagePaymentController::class, 'ManagePayment'])->name('manage.payment');

   // Send Mail

Route::get('/send-email', [SendEmailController::class, 'index'])->name('send.email');
Route::post('/send-email', [SendEmailController::class, 'send'])->name('send.email.post');


//wallet update

    Route::post('/choose-wallet', [WalletController::class, 'chooseWallet'])->name('choose.wallet');


});
});


