<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);

$user = mysql_query("SELECT * FROM user");
$transaksi = mysql_query("SELECT * FROM history");
$totaluser = mysql_num_rows($user);
$totaltransaksi = mysql_num_rows($transaksi);

$nama = $get['nama'];
$email = $get['email'];
$username = $get['username'];
$password = $get['password'];
$level = $get['level'];
$saldo = "Rp " . number_format($get['saldo'],2,',','.');
$uplink = $get['uplink'];
?>

<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>2Coin Panel - Dashboard</title>

    <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">
    
    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="assets/css/style_switcher.min.css" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="assets/css/ie.css" media="all">
    <![endif]-->

</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">xl</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Nobis temporibus.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Doloribus magnam vitae et eius doloribus.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Ab nulla quidem.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Molestias omnis et aut consequatur excepturi harum quas consequatur.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">om</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Sed rerum.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Maxime a itaque voluptatem dolore modi nobis suscipit aliquam voluptatem neque.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Quidem quae optio.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Quia animi at ut aut consequuntur.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Explicabo dolorum nemo.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Repellat aut illum consequatur et atque consequuntur placeat.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Reprehenderit voluptas.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Sit cumque eaque odit.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Quidem et.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Exercitationem assumenda mollitia ut et excepturi.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Sunt velit corrupti.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Praesentium nam qui voluptas et aliquid.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Nesciunt eaque qui.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Laudantium a et non nam quos accusantium.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="javascript:;" onclick="buka('user/pengaturan');">My Profile</a></li>
                                    <li><a href="javascript:;">Username : <?php echo $username; ?></a></li>
                                    <li><a href="javascript:;">Password : <?php echo $username; ?></a></li>
                                    <li><a href="javascript:;">Saldo : <?php echo $saldo; ?></a></li>
                                    <li><a href="javascript:;">Level : <?php echo $level; ?></a></li>
                                    <li><a href="javascript:;">Uplink : <?php echo $uplink; ?></a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        {{~items}}
                        <li data-value="{{ $item.value }}">
                            <a href="{{ $item.url }}">
                                {{ $item.value }}<br>
                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                            </a>
                        </li>
                        {{/items}}
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">
        
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="/" class="sSidebar_hide sidebar_logo_large">
                    <span class="logo_regular">2Coin-Panel</span>
                    <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/>
                </a>
            </div>
        </div>
        
        <div class="menu_section">
            <ul>
                                    <li class="current_section" title="Dashboard">
                        <a href="/">
                            <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                            <span class="menu_title">Dashboard</span>
                        </a>
                                            </li>
                                    <li title="Mailbox">
                        <a href="page_mailbox.html">
                            <span class="menu_icon"><i class="material-icons">&#xE158;</i></span>
                            <span class="menu_title">Mailbox</span>
                        </a>
                                            </li>
                                    <li title="Invoices">
                        <a href="page_invoices.html">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Invoices</span>
                        </a>
                                            </li>
                                    <li title="Chat">
                        <a href="page_chat.html">
                            <span class="menu_icon"><i class="material-icons">&#xE0B9;</i></span>
                            <span class="menu_title">Chat</span>
                        </a>
                                            </li>
                                    <li title="Scrum Board">
                        <a href="page_scrum_board.html">
                            <span class="menu_icon"><i class="material-icons">&#xE85C;</i></span>
                            <span class="menu_title">Scrum Board</span>
                        </a>
                                            </li>
                                    <li title="Snippets">
                        <a href="page_snippets.html">
                            <span class="menu_icon"><i class="material-icons">&#xE86F;</i></span>
                            <span class="menu_title">Snippets</span>
                        </a>
                                            </li>
                                    <li title="User Profile">
                        <a href="page_user_profile.html">
                            <span class="menu_icon"><i class="material-icons">&#xE87C;</i></span>
                            <span class="menu_title">User Profile</span>
                        </a>
                                            </li>
                                    <li title="Forms">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE8D2;</i></span>
                            <span class="menu_title">Forms</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="forms_regular.html">Regular Elements</a></li>
                                                                                                                                                <li><a href="forms_advanced.html">Advanced Elements</a></li>
                                                                                                                                                <li><a href="forms_dynamic.html">Dynamic</a></li>
                                                                                                                                                <li><a href="forms_file_input.html">File Input</a></li>
                                                                                                                                                <li><a href="forms_file_upload.html">File Upload</a></li>
                                                                                                                                                <li><a href="forms_validation.html">Validation</a></li>
                                                                                                                                                <li><a href="forms_wizard.html">Wizard</a></li>
                                                                                                                                                <li class="menu_subtitle">WYSIWYG Editors</li>
                                                                                    <li><a href="forms_wysiwyg_ckeditor.html">CKeditor</a></li>
                                                                                    <li><a href="forms_wysiwyg_inline.html">Ckeditor Inline</a></li>
                                                                                    <li><a href="forms_wysiwyg_tinymce.html">TinyMCE</a></li>
                                                                                                                                        </ul>
                                            </li>
                                    <li title="Layout">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE8F1;</i></span>
                            <span class="menu_title">Layout</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="layout_top_menu.html">Top Menu</a></li>
                                                                                                                                                <li><a href="layout_header_full.html">Full Header</a></li>
                                                                                                </ul>
                                            </li>
                                    <li title="Kendo UI Widgets">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE1BD;</i></span>
                            <span class="menu_title">Kendo UI Widgets</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="kendoui_autocomplete.html">Autocomplete</a></li>
                                                                                                                                                <li><a href="kendoui_calendar.html">Calendar</a></li>
                                                                                                                                                <li><a href="kendoui_colorpicker.html">ColorPicker</a></li>
                                                                                                                                                <li><a href="kendoui_combobox.html">ComboBox</a></li>
                                                                                                                                                <li><a href="kendoui_datepicker.html">DatePicker</a></li>
                                                                                                                                                <li><a href="kendoui_datetimepicker.html">DateTimePicker</a></li>
                                                                                                                                                <li><a href="kendoui_dropdown_list.html">DropDownList</a></li>
                                                                                                                                                <li><a href="kendoui_masked_input.html">Masked Input</a></li>
                                                                                                                                                <li><a href="kendoui_menu.html">Menu</a></li>
                                                                                                                                                <li><a href="kendoui_multiselect.html">MultiSelect</a></li>
                                                                                                                                                <li><a href="kendoui_numeric_textbox.html">Numeric TextBox</a></li>
                                                                                                                                                <li><a href="kendoui_panelbar.html">PanelBar</a></li>
                                                                                                                                                <li><a href="kendoui_timepicker.html">TimePicker</a></li>
                                                                                                                                                <li><a href="kendoui_toolbar.html">Toolbar</a></li>
                                                                                                                                                <li><a href="kendoui_window.html">Window</a></li>
                                                                                                </ul>
                                            </li>
                                    <li title="Components">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE87B;</i></span>
                            <span class="menu_title">Components</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="components_accordion.html">Accordions</a></li>
                                                                                                                                                <li><a href="components_autocomplete.html">Autocomplete</a></li>
                                                                                                                                                <li><a href="components_breadcrumbs.html">Breadcrumbs</a></li>
                                                                                                                                                <li><a href="components_buttons.html">Buttons</a></li>
                                                                                                                                                <li><a href="components_fab.html">Buttons: FAB</a></li>
                                                                                                                                                <li><a href="components_cards.html">Cards</a></li>
                                                                                                                                                <li><a href="components_colors.html">Colors</a></li>
                                                                                                                                                <li><a href="components_common.html">Common</a></li>
                                                                                                                                                <li><a href="components_dropdowns.html">Dropdowns</a></li>
                                                                                                                                                <li><a href="components_dynamic_grid.html">Dynamic Grid</a></li>
                                                                                                                                                <li><a href="components_footer.html">Footer</a></li>
                                                                                                                                                <li><a href="components_grid.html">Grid</a></li>
                                                                                                                                                <li><a href="components_icons.html">Icons</a></li>
                                                                                                                                                <li><a href="components_modal.html">Lightbox/Modal</a></li>
                                                                                                                                                <li><a href="components_lists.html">Lists</a></li>
                                                                                                                                                <li><a href="components_nestable.html">Nestable</a></li>
                                                                                                                                                <li><a href="components_notifications.html">Notifications</a></li>
                                                                                                                                                <li><a href="components_panels.html">Panels</a></li>
                                                                                                                                                <li><a href="components_preloaders.html">Preloaders</a></li>
                                                                                                                                                <li><a href="components_slider.html">Slider</a></li>
                                                                                                                                                <li><a href="components_slideshow.html">Slideshow</a></li>
                                                                                                                                                <li><a href="components_sortable.html">Sortable</a></li>
                                                                                                                                                <li><a href="components_switcher.html">Switcher</a></li>
                                                                                                                                                <li><a href="components_tables.html">Tables</a></li>
                                                                                                                                                <li><a href="components_tables_examples.html">Tables Examples</a></li>
                                                                                                                                                <li><a href="components_tabs.html">Tabs</a></li>
                                                                                                                                                <li><a href="components_tooltips.html">Tooltips</a></li>
                                                                                                                                                <li><a href="components_typography.html">Typography</a></li>
                                                                                                </ul>
                                            </li>
                                    <li title="E-commerce">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE8CB;</i></span>
                            <span class="menu_title">E-commerce</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="ecommerce_product_details.html">Product Details</a></li>
                                                                                                                                                <li><a href="ecommerce_product_edit.html">Product Edit</a></li>
                                                                                                                                                <li><a href="ecommerce_products_grid.html">Products Grid</a></li>
                                                                                                                                                <li><a href="ecommerce_products_list.html">Products List</a></li>
                                                                                                </ul>
                                            </li>
                                    <li title="Plugins">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE8C0;</i></span>
                            <span class="menu_title">Plugins</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="plugins_calendar.html">Calendar</a></li>
                                                                                                                                                <li><a href="plugins_charts.html">Charts</a></li>
                                                                                                                                                <li><a href="plugins_code_editor.html">Code Editor</a></li>
                                                                                                                                                <li><a href="plugins_crud_table.html">CRUD Table</a></li>
                                                                                                                                                <li><a href="plugins_datatables.html">Datatables</a></li>
                                                                                                                                                <li><a href="plugins_diff.html">Diff View</a></li>
                                                                                                                                                <li><a href="plugins_filemanager.html">File Manager</a></li>
                                                                                                                                                <li><a href="plugins_gantt_chart.html">Gantt Chart</a></li>
                                                                                                                                                <li><a href="plugins_google_maps.html">Google Maps</a></li>
                                                                                                                                                <li><a href="plugins_idle_timeout.html">Idle Timeout</a></li>
                                                                                                                                                <li><a href="plugins_tour.html">Tour</a></li>
                                                                                                                                                <li><a href="plugins_tablesorter.html">Tablesorter</a></li>
                                                                                                                                                <li><a href="plugins_tree.html">Tree</a></li>
                                                                                                                                                <li><a href="plugins_vector_maps.html">Vector Maps</a></li>
                                                                                                </ul>
                                            </li>
                                    <li title="Pages">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE24D;</i></span>
                            <span class="menu_title">Pages</span>
                        </a>
                                                    <ul>
                                                                                                            <li><a href="page_blank.html">Blank</a></li>
                                                                                                                                                <li><a href="page_contact_list.html">Contact List</a></li>
                                                                                                                                                <li><a href="page_gallery.html">Gallery</a></li>
                                                                                                                                                <li><a href="page_help.html">Help/Faq</a></li>
                                                                                                                                                <li><a href="login.html">Login Page</a></li>
                                                                                                                                                <li><a href="page_notes.html">Notes</a></li>
                                                                                                                                                <li><a href="page_pricing_tables.html">Pricing Tables</a></li>
                                                                                                                                                <li><a href="page_search_results.html">Search Results</a></li>
                                                                                                                                                <li><a href="page_settings.html">Settings</a></li>
                                                                                                                                                <li><a href="page_todo.html">Todo</a></li>
                                                                                                                                                <li><a href="page_user_edit.html">User edit</a></li>
                                                                                                                                                <li class="menu_subtitle">Issue Tracker</li>
                                                                                    <li><a href="page_issues_list.html">List View</a></li>
                                                                                    <li><a href="page_issue_details.html">Issue Details</a></li>
                                                                                                                                                                                        <li class="menu_subtitle">Blog</li>
                                                                                    <li><a href="page_blog_list.html">Blog List</a></li>
                                                                                    <li><a href="page_blog_article.html">Blog Article</a></li>
                                                                                                                                                                                        <li class="menu_subtitle">Errors</li>
                                                                                    <li><a href="error_404.html">Error 404</a></li>
                                                                                    <li><a href="error_500.html">Error 500</a></li>
                                                                                                                                        </ul>
                                            </li>
                                <li>
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE241;</i></span>
                        <span class="menu_title">Multi level</span>
                    </a>
                    <ul>
                        <li>
                            <a href="#">First level</a>
                            <ul>
                                <li>
                                    <a href="#">Second Level</a>
                                    <ul>
                                        <li>
                                            <a href="#">Third level</a>
                                        </li>
                                        <li>
                                            <a href="#">Third level</a>
                                        </li>
                                        <li>
                                            <a href="#">Third level</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Long title to test</a>
                                    <ul>
                                        <li>
                                            <a href="#">Third level</a>
                                        </li>
                                        <li>
                                            <a href="#">Third level</a>
                                        </li>
                                        <li>
                                            <a href="#">Third level</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Even longer title multi line</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside><!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                                <span class="epc_chart_text"><span class="countUpMe"><?php echo $totaluser; ?></span></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Total User
                                </h3>
                            </div>
Total User
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="53" data-bar-color="#03a9f4">
                                <span class="epc_chart_text"><span class="countUpMe"><?php echo $totalorder; ?></span></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Total Order
                                </h3>
                            </div>
<?php echo $totaltransaksi; ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="53" data-bar-color="#009688">
                                <span class="epc_chart_text"><span><?php echo $username; ?></span></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Username
                                </h3>
                            </div>
<?php echo $username; ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="53" data-bar-color="#009688">
                                <span class="epc_chart_text"><span><?php echo $saldo; ?></span></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Saldo
                                </h3>
                            </div>
<?php echo $saldo; ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="53" data-bar-color="#009688">
                                <span class="epc_chart_text"><span><?php echo $level; ?></span></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Level
                                </h3>
                            </div>
<?php echo $level; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tasks -->
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
                <div class="uk-width-medium-2-3">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons md-card-toggle">&#xE316;</i>
                                <i class="md-icon material-icons md-card-close">&#xE14C;</i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                Content Order
                            </h3>
                        </div>
                        <div class="md-card-content">
Welcome To 2Coin-Panel
</div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons md-card-toggle">&#xE316;</i>
                                <i class="md-icon material-icons md-card-close">&#xE14C;</i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                Result Order
                            </h3>
                        </div>
                        <div class="md-card-content">
Your Order Result Here...
</div>
                    </div>
                </div>
            <!-- info cards -->

    </aside>
    <!-- secondary sidebar end -->

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="bower_components/chartist/dist/chartist.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="bower_components/maplace-js/dist/maplace.min.js"></script>
        <!-- peity (small charts) -->
        <script src="bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="bower_components/handlebars/handlebars.min.js"></script>
        <script src="assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="bower_components/clndr/clndr.min.js"></script>
        <!-- fitvids -->
        <script src="bower_components/fitvids/jquery.fitvids.js"></script>

        <!--  dashbord functions -->
        <script src="assets/js/pages/dashboard.min.js"></script>
    
    <script>
        $(function() {
            if(isHighDensity) {
                // enable hires images
                altair_helpers.retina_images();
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

    <div id="style_switcher">
        <div id="style_switcher_toggle"><i class="material-icons">&#xE8B8;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom">Colors</h4>
            <ul class="switcher_app_themes" id="theme_switcher">
                <li class="app_style_default active_theme" data-app-theme="">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_a" data-app-theme="app_theme_a">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_b" data-app-theme="app_theme_b">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_c" data-app-theme="app_theme_c">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_d" data-app-theme="app_theme_d">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_e" data-app-theme="app_theme_e">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_f" data-app-theme="app_theme_f">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_g" data-app-theme="app_theme_g">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_h" data-app-theme="app_theme_h">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_i" data-app-theme="app_theme_i">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_dark" data-app-theme="app_theme_dark">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
            </ul>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Sidebar</h4>
            <p>
                <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
                <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
            </p>
            <p>
                <input type="checkbox" name="style_sidebar_slim" id="style_sidebar_slim" data-md-icheck />
                <label for="style_sidebar_slim" class="inline-label">Slim Sidebar</label>
            </p>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Layout</h4>
            <p>
                <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
                <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
            </p>
        </div>
        <div class="uk-visible-large">
            <h4 class="heading_c">Main menu accordion</h4>
            <p>
                <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
                <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
            </p>
        </div>
    </div>

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $html
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                    if(this_theme == 'app_theme_dark') {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                    }
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });

        // toggle slim sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
                $slim_sidebar_toggle.iCheck('check');
            }

            $slim_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                });

        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
</body>
</html>