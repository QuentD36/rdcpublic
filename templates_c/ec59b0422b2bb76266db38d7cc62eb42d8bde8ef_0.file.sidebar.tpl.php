<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-09 12:46:50
  from 'C:\wamp64\www\BSMAT-RDC\Version-4\public\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_618a6dba473759_78423471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec59b0422b2bb76266db38d7cc62eb42d8bde8ef' => 
    array (
      0 => 'C:\\wamp64\\www\\BSMAT-RDC\\Version-4\\public\\sidebar.tpl',
      1 => 1636462009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618a6dba473759_78423471 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- SIDEBAR -->

<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <div class="logo_name">12ème BSMAT</div>
        </div>
        <img src="public/images/menu-regular-24.png" id="btn">
    </div>
    <ul class="nav_list">
        <li>
            <a href="#">
                <img src="public/images/home.png">
                <span class="link_name">Accueil</span>
            </a>
            <span class="tooltip">Accueil</span>
        </li>
        <li>
            <a href="#">
                <img src="public/images/list.png">
                <span class="link_name">Gestion des fiches</span>
            </a>
            <span class="tooltip">Gestion des fiches</span>
        </li>
        <li>
            <a href="">
                <img src="public/images/user.png">
                <span class="link_name">Utilisateurs</span>
            </a>
            <span class="tooltip">Utilisateurs</span>
        </li>
        <li>
            <a href="index.php?gestion=accompagnateur">
                <i class='bx bx-user-check'></i>
                <span class="link_name">Accompagnateurs</span>
            </a>
            <span class="tooltip">Accompagnateurs</span>
        </li>
        <li>
            <a href="index.php?gestion=lieu">
                <i class='bx bx-current-location' ></i>
                <span class="link_name">Lieux</span>
            </a>
            <span class="tooltip">Lieux</span>
        </li>
        <li>
            <a href="">
                <i class='bx bx-cog'></i>
                <span class="link_name">Paramètres</span>
            </a>
            <span class="tooltip">Paramètres</span>
        </li>
    </ul>

</div>
<?php }
}
