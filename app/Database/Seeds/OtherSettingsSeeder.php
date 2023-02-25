<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OtherSettingsSeeder extends Seeder
{
    public function run()
    {
        $this->insertSettings();
    }
    private function insertSettings() {
        $builder_chk = $this->db->table('rspm_tbl_settings');
        $builder_chk->where('settings_key', 'referral_setting');
        $query = $builder_chk->get();
        $chartValue = $query->getResultArray();
        if(count($chartValue)==0)
        {
            $builder = $this->db->table('rspm_tbl_settings');
            $builder->insertBatch([
                [
                    'settings_id' => 63,
                    'settings_code' => 'referral_setting',
                    'settings_key'    => 'referral_setting',
                    'settings_value'    => '{"referral_enabled":"yes","referral_percentage":"15","potential_winning":"17","thrift_start_days":"5","thrift_start_not_later":"60","thrift_duration_in_month":"3,6"}',
                ],
                [
                    'settings_id' => 64,
                    'settings_code' => 'terms_and_conditions',
                    'settings_key'    => 'terms_and_conditions',
                    'settings_value'    => '{"terms_and_conditions":"<p>Find Australia Sms Gateway! Results &amp; Answers. Privacy Friendly. The Best Resources. Always Facts. Unlimited Access. Types: Best Results, Explore Now, New Sources, Best in Search.<\/p>"}',
                ],
            
            ]);
        }
    }
}
 