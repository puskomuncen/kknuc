<?php

namespace PHPMaker2025\kkndanpkl;

/**
 * User levels
 *
 * @var array<int, string, string>
 * [0] int User level ID
 * [1] string User level name
 * [2] string User level hierarchy
 */
$USER_LEVELS = [["-2","Anonymous",""],
    ["0","Default",""]];

/**
 * User roles
 *
 * @var array<int, string>
 * [0] int User level ID
 * [1] string User role name
 */
$USER_ROLES = [["-1","ROLE_ADMIN"],
    ["0","ROLE_DEFAULT"]];

/**
 * User level permissions
 *
 * @var array<string, int, int>
 * [0] string Project ID + Table name
 * [1] int User level ID
 * [2] int Permissions
 */
// Begin of modification by Masino Sinaga, September 17, 2023
$USER_LEVEL_PRIVS_1 = [["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}announcement","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}announcement","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}help","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}help","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}help_categories","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}help_categories","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}home.php","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}home.php","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}languages","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}languages","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}settings","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}settings","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}stats_month","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}stats_month","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}theuserprofile","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}theuserprofile","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}userlevelpermissions","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}userlevelpermissions","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}userlevels","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}userlevels","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}users","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}users","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}instansi","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}instansi","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}kegiatan","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}kegiatan","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}laporan_akhir","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}laporan_akhir","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}logbook","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}logbook","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}mahasiswa","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}mahasiswa","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}pendaftaran","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}pendaftaran","0","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}penempatan","-2","0"],
    ["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}penempatan","0","0"]];
$USER_LEVEL_PRIVS_2 = [["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}breadcrumblinksaddsp","-1","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}breadcrumblinkschecksp","-1","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}breadcrumblinksdeletesp","-1","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}breadcrumblinksmovesp","-1","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}loadhelponline","-2","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}loadaboutus","-2","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}loadtermsconditions","-2","8"],
					["{95B5497A-FAD8-4FE4-8828-FE6790BE3412}printtermsconditions","-2","8"]];
$USER_LEVEL_PRIVS = array_merge($USER_LEVEL_PRIVS_1, $USER_LEVEL_PRIVS_2);
// End of modification by Masino Sinaga, September 17, 2023

/**
 * Tables
 *
 * @var array<string, string, string, bool, string>
 * [0] string Table name
 * [1] string Table variable name
 * [2] string Table caption
 * [3] bool Allowed for update (for userpriv.php)
 * [4] string Project ID
 * [5] string URL (for OthersController::index)
 */
// Begin of modification by Masino Sinaga, September 17, 2023
$USER_LEVEL_TABLES_1 = [["announcement","announcement","Announcement",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","announcementlist"],
    ["help","help","Help (Details)",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","helplist"],
    ["help_categories","help_categories","Help (Categories)",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","helpcategorieslist"],
    ["home.php","home","Home",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","home"],
    ["languages","languages","Languages",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","languageslist"],
    ["settings","settings","Application Settings",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","settingslist"],
    ["stats_month","stats_month","stats month",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}",""],
    ["theuserprofile","theuserprofile","User Profile",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","theuserprofilelist"],
    ["userlevelpermissions","userlevelpermissions","User Level Permissions",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","userlevelpermissionslist"],
    ["userlevels","userlevels","User Levels",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","userlevelslist"],
    ["users","users","Users",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","userslist"],
    ["instansi","instansi","instansi",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","instansilist"],
    ["kegiatan","kegiatan","kegiatan",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","kegiatanlist"],
    ["laporan_akhir","laporan_akhir","laporan akhir",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","laporanakhirlist"],
    ["logbook","logbook","logbook",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","logbooklist"],
    ["mahasiswa","mahasiswa","mahasiswa",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","mahasiswalist"],
    ["pendaftaran","pendaftaran","pendaftaran",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","pendaftaranlist"],
    ["penempatan","penempatan","penempatan",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","penempatanlist"]];
$USER_LEVEL_TABLES_2 = [["breadcrumblinksaddsp","breadcrumblinksaddsp","System - Breadcrumb Links - Add",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","breadcrumblinksaddsp"],
						["breadcrumblinkschecksp","breadcrumblinkschecksp","System - Breadcrumb Links - Check",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","breadcrumblinkschecksp"],
						["breadcrumblinksdeletesp","breadcrumblinksdeletesp","System - Breadcrumb Links - Delete",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","breadcrumblinksdeletesp"],
						["breadcrumblinksmovesp","breadcrumblinksmovesp","System - Breadcrumb Links - Move",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","breadcrumblinksmovesp"],
						["loadhelponline","loadhelponline","System - Load Help Online",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","loadhelponline"],
						["loadaboutus","loadaboutus","System - Load About Us",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","loadaboutus"],
						["loadtermsconditions","loadtermsconditions","System - Load Terms and Conditions",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","loadtermsconditions"],
						["printtermsconditions","printtermsconditions","System - Print Terms and Conditions",true,"{95B5497A-FAD8-4FE4-8828-FE6790BE3412}","printtermsconditions"]];
$USER_LEVEL_TABLES = array_merge($USER_LEVEL_TABLES_1, $USER_LEVEL_TABLES_2);
// End of modification by Masino Sinaga, September 17, 2023
