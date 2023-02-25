<?php
if (!function_exists("currency")) {
    
    function currency($value)
    {
        $setting = new App\Models\Settings();
        $gsettings = $setting->where('settings_key','general_setting')->first();

        $generalSetting = $setting->where('settings_id', $gsettings['settings_id'])->first();
        
        if($generalSetting){
            $general = json_decode($generalSetting['settings_value'],true);
        }

        $fatchingVal = number_format((float)$value, 2, '.', '');

        $string = $general['c_symbol'].' '.$fatchingVal;
        return $string;
    }

}
