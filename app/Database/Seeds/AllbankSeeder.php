<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllbankSeeder extends Seeder
{
    public function run()
    {
        $this->insertBank();
    }

    private function insertBank() {
        $builder_chk = $this->db->table('thrift_two_win_bank');
        $query = $builder_chk->get();
        $chartValue = $query->getResult();
        if(count($chartValue)==0)
        {
        
            $builder = $this->db->table('thrift_two_win_bank');
            $builder->insertBatch([
             
                ['bank_id' => '1','bank_name' => 'Access Bank','bank_code' => '036','bank_active_status' => '0','bank_deletion_status' => '0' ],
                ['bank_id' => '2','bank_name' => 'ALAT by WEMA','bank_code' => '035','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '3','bank_name' => 'Citibank Nigeria','bank_code' => '023','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '4','bank_name' => 'Diamond Bank','bank_code' => '063','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '5','bank_name' => 'Ecobank Nigeria','bank_code' => '050','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '6','bank_name' => 'Enterprise Bank','bank_code' => '084','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '7','bank_name' => 'Fidelity Bank','bank_code' => '070','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '8','bank_name' => 'First Bank of Nigeria','bank_code' => '011','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '9','bank_name' => 'First City Monument Bank','bank_code' => '214','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '10','bank_name' => 'Guaranty Trust Bank','bank_code' => '058','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '11','bank_name' => 'Heritage Bank','bank_code' => '030','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '12','bank_name' => 'Jaiz Bank','bank_code' => '301','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '13','bank_name' => 'Keystone Bank','bank_code' => '082','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '14','bank_name' => 'MainStreet Bank','bank_code' => '014','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '15','bank_name' => 'Parallex Bank','bank_code' => '526','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '16','bank_name' => 'Providus Bank','bank_code' => '101','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '17','bank_name' => 'Skye Bank','bank_code' => '076','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '18','bank_name' => 'Stanbic IBTC Bank','bank_code' => '221','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '19','bank_name' => 'Standard Chartered Bank','bank_code' => '068','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '20','bank_name' => 'Sterling Bank','bank_code' => '232','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '21','bank_name' => 'Suntrust Bank','bank_code' => '100','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '22','bank_name' => 'Union Bank of Nigeria','bank_code' => '032','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '23','bank_name' => 'United Bank For Africa','bank_code' => '033','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '24','bank_name' => 'Unity Bank','bank_code' => '215','bank_active_status' => '1','bank_deletion_status' => '0' ],
                ['bank_id' => '26','bank_name' => 'Zenith Bank','bank_code' => '057','bank_active_status' => '1','bank_deletion_status' => '0' ],

            ]);

        }
       
    }
}
