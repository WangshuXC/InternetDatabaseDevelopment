# 提示用户输入密码
$password = Read-Host "Please enter the mysql password" -AsSecureString

# 读取数据库配置文件内容
$configFile = ".\config\db.php"
$configContent = Get-Content $configFile -Raw

# 替换密码
$newConfigContent = $configContent -replace "'password' => 'root'", "'password' => '$password'"

# 写入更新后的配置内容
Set-Content -Path $configFile -Value $newConfigContent

Write-Host "Password updated successfully!"

Write-Host "正在安装后端服务器依赖..."
composer install --silent 2>&1 | Out-Null

Write-Host "正在安装后端服务器依赖..."
php yii serve