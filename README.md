# YearEndBot
LINE BOT For Year End Party

This document is a quick start guide to build QR Game bot for the year end party.
This Project is a QR Code searching game build with LINE Chatbot.
Due to this Game is developed in a short time, there are many ad-hoc code in it.
You can modify it as you want.

1. Import the aoem.sql to you Mysql server.
2. Modify the include/mysql.php with your mysql credential.
3. Modify the config.php with your LINE Channel information.
4. The vendor/ directory is the LINE Message SDK fetched with composer.
5. hash.txt is the QR code hash list. callback.php will check when recieve the picture.
6. barcode_scanner_image.py is the QR code scanner script.
7. User uploaded picture will be store in download. You should set write permission for your web server.

