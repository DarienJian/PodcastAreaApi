<?php


namespace App\Helpers;


class Constant
{
    /**
     * 0000 回傳成功
     * 9998 API錯誤回傳
     * 9999 驗證失敗
     */
    const CODE_SUCCESS = '0000';
    const CODE_API_FAIL = '9998';
    const CODE_VALIDATOR = '9999';

    /**
     * 執行成功
     */
    const MESSAGE_SUCCESS = 'OK';
    const MESSAGE_API_EXCEPTION = 'API EXCEPTION';

    /**
     * 回傳代碼
     * 200 成功回傳
     * 417 catch 錯誤
     */
    const WEB_STATUS_200 = '200';
    const WEB_STATUS_417 = '417';


    /**
     * 討論版需要更新 0
     * 討論版不需要更新 1
     */
    const FORUM_NEED_RENEW = 0;
    const FORUM_NOT_NEED_RENEW = 1;

    /**
     * 首頁物件顯示數量
     */

    const HOME_PAGE_ITEMS = 4;
}
