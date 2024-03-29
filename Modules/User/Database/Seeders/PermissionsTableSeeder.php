<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //User Mangement
            'edit_own_profile',
            'access_user_management',

            // Human Resources Management
            'access_human_resources_management',

            // Inventory

                'access_inventory',
                //Products
                'access_products',
                'create_products',
                'show_products',
                'edit_products',
                'delete_products',

                //Product Categories
                'access_product_categories',

                //Barcode Printing
                'print_barcodes',

                //Adjustments
                'access_adjustments',
                'create_adjustments',
                'show_adjustments',
                'edit_adjustments',
                'delete_adjustments',

            //Quotaions
            'access_quotations',
            'create_quotations',
            'show_quotations',
            'edit_quotations',
            'delete_quotations',

            //Create Sale From Quotation
            'create_quotation_sales',

            //Send Quotation On Email
            'send_quotation_mails',

            // CRM
                // GR
                'access_crm',
                //Customers
                'access_customers',
                'create_customers',
                'show_customers',
                'edit_customers',
                'delete_customers',

                //Suppliers
                'access_suppliers',
                'create_suppliers',
                'show_suppliers',
                'edit_suppliers',
                'delete_suppliers',

            //Sales
            'access_sales',
            'create_sales',
            'show_sales',
            'edit_sales',
            'delete_sales',

            //POS Sale
            'create_pos_sales',

            //Sale Payments
            'access_sale_payments',

            //Sale Returns
            'access_sale_returns',
            'create_sale_returns',
            'show_sale_returns',
            'edit_sale_returns',
            'delete_sale_returns',

            //Sale Return Payments
            'access_sale_return_payments',

            //Purchases
            'access_purchases',
            'create_purchases',
            'show_purchases',
            'edit_purchases',
            'delete_purchases',

            //Purchase Payments
            'access_purchase_payments',

            //Purchase Returns
            'access_purchase_returns',
            'create_purchase_returns',
            'show_purchase_returns',
            'edit_purchase_returns',
            'delete_purchase_returns',

            //Purchase Return Payments
            'access_purchase_return_payments',

            //Currencies
            'access_currencies',
            'create_currencies',
            'edit_currencies',
            'delete_currencies',

            //Settings
            'access_settings',

            //Company
            'access_companies',
            'edit_company',
            'delete_company',

            //POS Permissions
            'access_pos',
            'create_pos',
            'edit_pos',
            'delete_pos',
            'view_pos',

            //Dashboard
            'show_total_stats',
            'show_month_overview',
            'show_weekly_sales_purchases',
            'show_monthly_cashflow',
            'show_notifications',

            // Accounting
            'access_account_management',
            'create_account',
            'edit_account',
            'delete_account',
            'close_account',
            'account_withdrawal',
            'account_deposit',
            'access_account_book',
            'delete_account_book',

            //Reports
            'access_reports',

            //Expenses
            'access_expenses',
            'create_expenses',
            'edit_expenses',
            'delete_expenses',

            //Expense Categories
            'access_expense_categories',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $super = Role::create([
            'name' => 'Super Admin'
        ]);

        $super->givePermissionTo($permissions);

        $owner = Role::create([
            'name' => 'owner'
        ]);

        $owner->givePermissionTo($permissions);

        $role = Role::create([
            'name' => 'admin'
        ]);

        $role->givePermissionTo($permissions);
        $role->revokePermissionTo('access_user_management');
    }
}
