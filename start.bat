@echo off
echo Please make sure you have imported the SQL file into the database. Press Enter to continue...
pause>nul
cd /d "%~dp0\frontend"
start powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0\frontend\deploy_frontend.ps1"
cd /d "%~dp0\backend"
start powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0\backend\deploy_backend.ps1"
