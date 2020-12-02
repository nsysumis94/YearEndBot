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

# 2020 東吳大學科法所　智慧財產權(一)　期中作業　版權宣告
本程式為尾牙小活動LINE CHATBOT，由Liu Wei-Cheng開發，JS與CSS版本使用Jquery與Bootstrap，SDK採用LINE官方Bot SDK，除此三套件使用各自授權外，其餘遊戲主程式採MIT授權，相關授權條款請參考LICENSE檔案或下方版權宣告

本程式也為本人之著作權期中作業，主程式著作權由Liu Wei-Cheng所擁有  

License
----
MIT License

Copyright (c) 2020 Liu Wei-Cheng nsysumis94[at]gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

