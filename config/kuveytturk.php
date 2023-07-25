<?php

/**
 * Description of kuveytturk.php
 *
 * @author Faruk Çam <mail@farukix.com>
 * Copyright (c) 2018 | farukix.com
 */

return [
    "Type"                => "Sale",
    "APIVersion"          => "1.0.0",
    "ApiUrl"              => "https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelPayGate", // Test API url : https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelPayGate
    "CustomerId"          => "400235", // Test Müşteri Numarası : 400235
    "CurrencyCode"        => "0949", // Para birimi TL 0949
    "MerchantId"          => "496", // Test Magaza Kodu : 496
    "OkUrl"               => "http://localhost/KuveytTurk_Ornek_PHP/onaycevap.php",
    "FailUrl"             => "http://localhost/KuveytTurk_Ornek_PHP/HataSayfasi.php",
    "UserName"            => "apiuser1", // Test API Kullanıcısı : apiuser1
    "Password"            => "Api123",  // Test API Kullanıcı Şifresi : Api123
    "TransactionSecurity" => "1" // 3d Secure = 3 , 3d'siz = 1
];
