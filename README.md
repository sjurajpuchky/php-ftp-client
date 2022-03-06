# php-fto-client
Simple FTP Client wrapper

# Install

```
composer require baba/php-ftp-client
```

# Example
```
 use BABA\FTP\FtpClient;
 $client = new FtpClient($hostname, $username, $password, $rootFolder);
 $client->login();
 $files = $client->listFiles('/');
 foreach ($files as $file) {
    $client->downloadFile($file, './file.txt');
 }
 $client->disconnect();
```

# License
GPL-2.0-only

# Authors
Juraj Puchký - BABA Tumise s.r.o. <info@baba.bj>

https://www.seoihned.cz - SEO optilamizace

https://www.baba.bj - Tvorba webových stránek

https://www.webtrace.cz - Tvorba portálů a ecommerce b2b/b2c (eshopů) na zakázku

# Log
1.0.0 - first release
1.0.1 - added support passive mode

# Copyright
&copy; 2021 BABA Tumise s.r.o.
