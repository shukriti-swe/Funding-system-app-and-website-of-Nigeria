<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $this->insertSettings();
    }
    private function insertSettings() {
        $builder_chk = $this->db->table('rspm_tbl_settings');
        $builder_chk->where('settings_key', 'general_setting');
        $query = $builder_chk->get();
        $chartValue = $query->getResultArray();
        if(count($chartValue)==0)
        {
            $builder = $this->db->table('rspm_tbl_settings');
            $builder->insertBatch([
                [
                    'settings_id' => 60,
                    'settings_code' => 'general_setting',
                    'settings_key'    => 'general_setting',
                    'settings_value'    => '{"site_name":"Thrift2Win","site_email":"support@thrift2win.com","c_symbol":"u20a6","c_text":"Naira","site_banner":"1647321782_95c1ec4486ba360dd95c.jpg"}',
                ],
                [
                    'settings_id' => 61,
                    'settings_code' => 'payment_setting',
                    'settings_key'    => 'payment_setting',
                    'settings_value'    => '{"paystack_test_mode":"Off","paystack_test_secret_key":"sk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhihsk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhihsk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhihsk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhihsk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhihsk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhihsk_testsk1111hjgg yguiu iu iuhuigiug io iu iohoii u oihi uhiuhiuhih","paystack_test_public_key":"pk_test_e502","paystack_live_secret_key":"sk_li8ve","paystack_live_public_key":"pk_live pl"}',
                ],
            
            ]);
        }
    }
}
 