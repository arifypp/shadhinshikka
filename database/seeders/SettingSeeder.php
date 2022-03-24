<?php

namespace Database\Seeders;
use App\Models\Backend\Admin\Settings;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    protected $settings_data = [
        ['name'=>'title', 'value'=>'Shadhin Shikka'],
        ['name'=>'address', 'value'=>''],

        ['name'=>'logo', 'value'=>''],
        ['name'=>'adminlogo', 'value'=>''],
        ['name'=>'favicon', 'value'=>''],
        ['name'=>'adminfavicon', 'value'=>''],

        ['name'=>'currency_code', 'value'=>'BDT'],
        ['name'=>'currency_symbol', 'value'=>'TK'],
        ['name'=>'currency_direction', 'value'=>'right'],

        ['name'=>'invoice_prefix', 'value'=>'INV-'],
        ['name'=>'invoice_number', 'value'=>'0001'],

        ['name'=>'timezone', 'value'=>'Asia/Dhaka'],
        ['name'=>'date_format', 'value'=>'d-m-Y'],


        ['name'=>'footer_credit', 'value'=>'2022 © Skote'],
        ['name'=>'footer_dev', 'value'=>'Design & Develop by Themesbrand'],


        ['name'=>'mail_mailer','value'=>'smtp'],
        ['name'=>'mail_host','value'=>''],
        ['name'=>'mail_port','value'=>''],
        ['name'=>'mail_username','value'=>''],
        ['name'=>'mail_password','value'=>''],
        ['name'=>'mail_encryption','value'=>''],
        ['name'=>'mail_from_name','value'=>''],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Settings::insert($this->settings_data);
    }
}
