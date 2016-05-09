<?php
/**
 *
 *
 * Date: 3/31/16
 * Time: 10:51 AM
 */

namespace App\AppSettings;
use Illuminate\Support\Facades\Facade;
use App\Setting;

class AppSetting extends Facade
{

    /** return specified setting value */
    public static function getByKey($settingKey)
    {
        $setting = Setting::where('key', '=', $settingKey)->first()->toArray();
        return $setting['value'];
    }

    /** is registration currently open? */
    public static function regOpen()
    {
        $today = new \DateTime();
        $openDate = new \DateTime(AppSetting::getByKey('open_date'));
        $closeDate = new \DateTime(AppSetting::getByKey('close_date'));

        if (
            $today->getTimestamp() > $openDate->getTimestamp() &&
            $today->getTimestamp() < $closeDate->getTimestamp()
        ) {
            return true;
        } else {
            return false;
        }
    }

    /** return welcome text message according to open/closed state */
    public static function welcomeText () {
        if (AppSetting::regOpen()) {
            return AppSetting::getByKey('welcome_page_open');
        } else {
            return AppSetting::getByKey('welcome_page_closed');
        }
    }
}