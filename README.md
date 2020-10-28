## Mini Aspire

* As a user, I can login on the system - DONE
* As a business owner, I can submit a loan application - DONE
* As a business owner, I can submit repayments - DONE
* As an approver, I can view all loan applications - DONE
* As an approver, I can approve/reject loan applications - DONE
* As a business owner, I can view a loan application and my repayments for it - DONE
* As a business owner, I can view all my loan applications - DONE

## Installation

- Checkout application
- Setup own .env file - updating database credentials as necessary (may use .env.dev as guide)
- Run php artisan migrate
- Go to root folder and run php artisan serve
- Run php artisan tinker and run these factories to get test users and repayments (date not validated)
- App\Models\Loan::factory()->count(20)->create();
- App\Models\Repayment::factory()->count(4)->create();

Note: For test users, each account have "password" as default password

## Assumptions

You have a running database server
You have Composer, PHP >= 7.3, node.js/NPM installed on your system
storage and vendor folders is writable by server
Weekly repayments is calculated as Amount Required/Loan Terms