# 获取用户输入的mysql密码
$mysql_password = Read-Host "Please input the mysql password"

# 替换db.php中的mysql密码
$config_file_path = "./config/db.php"
(Get-Content $config_file_path) | ForEach-Object { $_ -replace "'password' => 'root'", "'password' => '$mysql_password'" } | Set-Content $config_file_path

# 返回脚本文件所在目录
cd ..

# 运行composer install
composer install

# 运行php yii serve
php yii serve
