<?php

namespace PHPMaker2025\kkndanpkl;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(4, "mi_home", $Language->menuPhrase("4", "MenuText"), "home", -1, substr("mi_home", strpos("mi_home", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}home.php'), false, false, "fa-home", "", false, true);
$sideMenu->addMenuItem(40, "mci_Master", $Language->menuPhrase("40", "MenuText"), "", -1, substr("mci_Master", strpos("mci_Master", "mi_") + 3), true, false, true, "fa-file", "", false, true);
$sideMenu->addMenuItem(46, "mi_instansi", $Language->menuPhrase("46", "MenuText"), "instansilist", 40, substr("mi_instansi", strpos("mi_instansi", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}instansi'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(50, "mi_mahasiswa", $Language->menuPhrase("50", "MenuText"), "mahasiswalist", 40, substr("mi_mahasiswa", strpos("mi_mahasiswa", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}mahasiswa'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(47, "mi_kegiatan", $Language->menuPhrase("47", "MenuText"), "kegiatanlist", 40, substr("mi_kegiatan", strpos("mi_kegiatan", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}kegiatan'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(39, "mci_Data", $Language->menuPhrase("39", "MenuText"), "", -1, substr("mci_Data", strpos("mci_Data", "mi_") + 3), true, false, true, "fa-file", "", false, true);
$sideMenu->addMenuItem(51, "mi_pendaftaran", $Language->menuPhrase("51", "MenuText"), "pendaftaranlist", 39, substr("mi_pendaftaran", strpos("mi_pendaftaran", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}pendaftaran'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(52, "mi_penempatan", $Language->menuPhrase("52", "MenuText"), "penempatanlist", 39, substr("mi_penempatan", strpos("mi_penempatan", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}penempatan'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(49, "mi_logbook", $Language->menuPhrase("49", "MenuText"), "logbooklist", 39, substr("mi_logbook", strpos("mi_logbook", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}logbook'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(48, "mi_laporan_akhir", $Language->menuPhrase("48", "MenuText"), "laporanakhirlist", 39, substr("mi_laporan_akhir", strpos("mi_laporan_akhir", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}laporan_akhir'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(16, "mi_theuserprofile", $Language->menuPhrase("16", "MenuText"), "theuserprofilelist", -1, substr("mi_theuserprofile", strpos("mi_theuserprofile", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}theuserprofile'), false, false, "fa-user", "", false, true);
$sideMenu->addMenuItem(5, "mi_help_categories", $Language->menuPhrase("5", "MenuText"), "helpcategorieslist", -1, substr("mi_help_categories", strpos("mi_help_categories", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}help_categories'), false, false, "fa-book", "", false, true);
$sideMenu->addMenuItem(6, "mi_help", $Language->menuPhrase("6", "MenuText"), "helplist?cmd=resetall", 5, substr("mi_help", strpos("mi_help", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}help'), false, false, "fa-book", "", false, true);
$sideMenu->addMenuItem(13, "mci_Terms_and_Condition", $Language->menuPhrase("13", "MenuText"), "javascript:void(0);|||getTermsConditions();return false;", 5, substr("mci_Terms_and_Condition", strpos("mci_Terms_and_Condition", "mi_") + 3), true, false, true, "fas fa-cannabis", "", false, true);
$sideMenu->addMenuItem(14, "mci_About_Us", $Language->menuPhrase("14", "MenuText"), "javascript:void(0);|||getAboutUs();return false;", 5, substr("mci_About_Us", strpos("mci_About_Us", "mi_") + 3), true, false, true, "fa-question", "", false, true);
$sideMenu->addMenuItem(12, "mci_ADMIN", $Language->menuPhrase("12", "MenuText"), "", -1, substr("mci_ADMIN", strpos("mci_ADMIN", "mi_") + 3), true, false, true, "fa-key", "", false, true);
$sideMenu->addMenuItem(1, "mi_users", $Language->menuPhrase("1", "MenuText"), "userslist?cmd=resetall", 12, substr("mi_users", strpos("mi_users", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}users'), false, false, "fa-user", "", false, true);
$sideMenu->addMenuItem(3, "mi_userlevels", $Language->menuPhrase("3", "MenuText"), "userlevelslist", 12, substr("mi_userlevels", strpos("mi_userlevels", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}userlevels'), false, false, "fa-tags", "", false, true);
$sideMenu->addMenuItem(2, "mi_userlevelpermissions", $Language->menuPhrase("2", "MenuText"), "userlevelpermissionslist", 12, substr("mi_userlevelpermissions", strpos("mi_userlevelpermissions", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}userlevelpermissions'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(8, "mi_settings", $Language->menuPhrase("8", "MenuText"), "settingslist", 12, substr("mi_settings", strpos("mi_settings", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}settings'), false, false, "fa-tools", "", false, true);
$sideMenu->addMenuItem(7, "mi_languages", $Language->menuPhrase("7", "MenuText"), "languageslist", 12, substr("mi_languages", strpos("mi_languages", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}languages'), false, false, "fa-flag", "", false, true);
$sideMenu->addMenuItem(15, "mi_announcement", $Language->menuPhrase("15", "MenuText"), "announcementlist", 12, substr("mi_announcement", strpos("mi_announcement", "mi_") + 3), AllowListMenu('{95B5497A-FAD8-4FE4-8828-FE6790BE3412}announcement'), false, false, "fas fa-bullhorn", "", false, true);
echo $sideMenu->toScript();
