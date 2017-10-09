<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = ['name' => 'HC5960', 'category_id' => 1];
        $data[] = ['name' => 'HC6550', 'category_id' => 1];
        $data[] = ['name' => 'HC5880', 'category_id' => 1];
        $data[] = ['name' => 'HC5810', 'category_id' => 1];
        $data[] = ['name' => 'HC5800', 'category_id' => 1];
        $data[] = ['name' => 'HC5900', 'category_id' => 1];
        $data[] = ['name' => 'HC4250', 'category_id' => 1];
        $data[] = ['name' => 'HC363C', 'category_id' => 1];
        $data[] = ['name' => 'HC5700', 'category_id' => 1];
        $data[] = ['name' => 'HC5705GP', 'category_id' => 1];
        $data[] = ['name' => 'HC5600', 'category_id' => 1];
        $data[] = ['name' => 'HC5356', 'category_id' => 1];
        $data[] = ['name' => 'HC5302', 'category_id' => 1];
        $data[] = ['name' => 'HC5500', 'category_id' => 1];
        $data[] = ['name' => 'HC5400', 'category_id' => 1];
        $data[] = ['name' => 'HC5300', 'category_id' => 1];
        $data[] = ['name' => 'HC335', 'category_id' => 1];
        $data[] = ['name' => 'HC5200', 'category_id' => 1];
        $data[] = ['name' => 'HC5150', 'category_id' => 1];
        $data[] = ['name' => 'HC5035', 'category_id' => 1];
        $data[] = ['name' => 'HC5018', 'category_id' => 1];

        $data[] = ['name' => 'SF4880', 'category_id' => 2];
        $data[] = ['name' => 'XR1470', 'category_id' => 2];
        $data[] = ['name' => 'XR1450', 'category_id' => 2];
        $data[] = ['name' => 'XR1430', 'category_id' => 2];
        $data[] = ['name' => 'XR1410', 'category_id' => 2];
        $data[] = ['name' => 'XR1400', 'category_id' => 2];
        $data[] = ['name' => 'XR1390', 'category_id' => 2];
        $data[] = ['name' => 'XR1370', 'category_id' => 2];
        $data[] = ['name' => 'XR1330', 'category_id' => 2];
        $data[] = ['name' => 'PR1370', 'category_id' => 2];
        $data[] = ['name' => 'PR1350', 'category_id' => 2];
        $data[] = ['name' => 'PR1330', 'category_id' => 2];
        $data[] = ['name' => 'PR1250', 'category_id' => 2];
        $data[] = ['name' => 'PR1230', 'category_id' => 2];
        $data[] = ['name' => 'AQ7', 'category_id' => 2];
        $data[] = ['name' => 'R95', 'category_id' => 2];
        $data[] = ['name' => 'XF8705', 'category_id' => 2];
        $data[] = ['name' => 'XF8505', 'category_id' => 2];
        $data[] = ['name' => 'PF7500', 'category_id' => 2];
        $data[] = ['name' => 'PF7400', 'category_id' => 2];
        $data[] = ['name' => 'PF7200', 'category_id' => 2];
        $data[] = ['name' => 'TF70', 'category_id' => 2];
        $data[] = ['name' => 'XR1350', 'category_id' => 2];
        $data[] = ['name' => 'PR1270', 'category_id' => 2];
        $data[] = ['name' => 'XF8700', 'category_id' => 2];
        $data[] = ['name' => 'XF8500', 'category_id' => 2];
        $data[] = ['name' => 'XR1340F', 'category_id' => 2];
        $data[] = ['name' => 'XR1340G', 'category_id' => 2];
        $data[] = ['name' => 'F7800', 'category_id' => 2];

        $data[] = ['name' => 'MB4200', 'category_id' => 3];
        $data[] = ['name' => 'MB050', 'category_id' => 3];
        $data[] = ['name' => 'MB4850', 'category_id' => 3];
        $data[] = ['name' => 'MB4560', 'category_id' => 3];
        $data[] = ['name' => 'MB6550', 'category_id' => 3];
        $data[] = ['name' => 'MB4045', 'category_id' => 3];
        $data[] = ['name' => 'MB4110', 'category_id' => 3];
        $data[] = ['name' => 'MB4030', 'category_id' => 3];
        $data[] = ['name' => 'MB4130', 'category_id' => 3];
        $data[] = ['name' => 'MB4125', 'category_id' => 3];
        $data[] = ['name' => 'MB4122', 'category_id' => 3];
        $data[] = ['name' => 'MB4120', 'category_id' => 3];
        $data[] = ['name' => 'MB4010', 'category_id' => 3];
        $data[] = ['name' => 'MB320C', 'category_id' => 3];

        $data[] = ['name' => 'PG6070', 'category_id' => 4];
        $data[] = ['name' => 'PG6160', 'category_id' => 4];
        $data[] = ['name' => 'PG6150', 'category_id' => 4];
        $data[] = ['name' => 'PG6045', 'category_id' => 4];
        $data[] = ['name' => 'PG6030', 'category_id' => 4];
        $data[] = ['name' => 'PG6130', 'category_id' => 4];
        $data[] = ['name' => 'PG180', 'category_id' => 4];

        $data[] = ['name' => 'BHT6255', 'category_id' => 5];
        $data[] = ['name' => 'BHT6250', 'category_id' => 5];
        $data[] = ['name' => 'BHT2000A', 'category_id' => 5];
        $data[] = ['name' => 'BHT250', 'category_id' => 5];
        $data[] = ['name' => 'BHT300', 'category_id' => 5];
        $data[] = ['name' => 'BHT100', 'category_id' => 5];

        $data[] = ['name' => 'NE3455', 'category_id' => 6];
        $data[] = ['name' => 'NE3870', 'category_id' => 6];
        $data[] = ['name' => 'NE3750', 'category_id' => 6];
        $data[] = ['name' => 'NE3850', 'category_id' => 6];
        $data[] = ['name' => 'NE3450', 'category_id' => 6];
        $data[] = ['name' => 'NE3150', 'category_id' => 6];

        $data[] = ['name' => 'IPL6780', 'category_id' => 7];
        $data[] = ['name' => 'IPL6750', 'category_id' => 7];
        $data[] = ['name' => 'IPL6500', 'category_id' => 7];
        $data[] = ['name' => 'IPL6250', 'category_id' => 7];
        $data[] = ['name' => 'IPL2000', 'category_id' => 7];

        $data[] = ['name' => 'FC2000', 'category_id' => 8];
        $data[] = ['name' => 'FC1000GP', 'category_id' => 8];
        $data[] = ['name' => 'FC1500', 'category_id' => 8];

        $data[] = ['name' => 'SFT-150', 'category_id' => 9];
        $data[] = ['name' => 'SFT-100', 'category_id' => 9];

        Product::insert($data);
    }
}
