<?php
if(!defined('THEMENAME')) { define('THEMENAME', 'zot'); }

/*
Plugin Name: Zot
Description: My Zot personal plugin
*/

/**
 * Configs
 */

include 'zotConfig.php';

/**
 * Widgets
 */

include 'zotWidget.php';

/**
 * Functions 
 */
include "includes/zotFunctions.php";
include "includes/zotLogo.php";
include "includes/zotMenu.php";
include "includes/zotBanner.php";
include "includes/zotWidget.php";
include "includes/zotProducts.php"; 
include "includes/zotPosts.php"; 
include "includes/zotCases.php"; 
include "includes/zotPagination.php"; 
include "includes/zotPartners.php"; 

/**
 * Create Type Posts
 */
include "createposts/banner.php";
include "createposts/cases.php";
include "createposts/partners.php";
// include "createposts/product.php";

/**
 * Customizer
 */
include "zotCustomizer.php";
include "customizer/zotAbout.php";