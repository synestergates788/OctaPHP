@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../zendframework/zend-servicemanager/bin/generate-deps-for-config-factory
php "%BIN_TARGET%" %*
