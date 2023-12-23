@echo off
echo Please make sure you have imported the SQL file into the database. Press Enter to continue...
pause>nul
cd /d "%~dp0\frontend"
powershell -ExecutionPolicy Bypass -File deploy_frontend.ps1
cd /d "%~dp0\backend"
powershell -ExecutionPolicy Bypass -File deploy_backend.ps1
