# 进入项目目录
Write-Host "Entering project directory..."
cd ./

# 安装依赖库
Write-Host "Installing dependencies..."
npm install --silent 2>&1 | Out-Null

# 运行格式化命令
Write-Host "Running formatting command..."
npm run format 2>&1 | Out-Null

# 安装其他依赖库
Write-Host "Installing other dependencies..."

$packages = @("element-plus", "plyr", "comment-core-library", "gsap", "axios", "ip")
$totalPackages = $packages.Count
for ($i = 0; $i -lt $totalPackages; $i++) {
    $package = $packages[$i]
    Write-Progress -Activity "Installing package '$package'" -Status "Package $($i + 1) of $totalPackages" -PercentComplete (($i + 1) / $totalPackages * 100)
    npm install $package --silent --progress=false 2>&1 | Out-Null
}

# 构建前端项目
Write-Host "Starting frontend project..."
npm run dev

Write-Host "Script execution completed!"
