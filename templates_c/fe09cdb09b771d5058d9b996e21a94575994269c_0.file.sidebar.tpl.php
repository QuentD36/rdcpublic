<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-26 13:38:59
  from 'C:\wamp64\www\BSMAT-RDC\Version-5\public\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6267f5f3df0663_50838240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe09cdb09b771d5058d9b996e21a94575994269c' => 
    array (
      0 => 'C:\\wamp64\\www\\BSMAT-RDC\\Version-5\\public\\sidebar.tpl',
      1 => 1650980338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6267f5f3df0663_50838240 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- SIDEBAR -->

<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <div class="logo_name">12ème BSMAT</div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav_list">
        <li>
            <a href="index.php?gestion=admin">
                <i class='bx bx-line-chart' ></i>
                <span class="link_name">Statistiques</span>
            </a>
            <span class="tooltip">Statistiques</span>
        </li>
        <li>
            <a href="index.php?gestion=employe">
                <i class='bx bx-user'></i>
                <span class="link_name">Gestion des utilisateurs</span>
            </a>
            <span class="tooltip">Gestion des utilisateurs</span>
        </li>
        <li>
            <a href="index.php?gestion=fiche">
                <i class='bx bx-spreadsheet'></i>
                <span class="link_name">Gestion des fiches</span>
            </a>
            <span class="tooltip">Gestion des fiches</span>
        </li>
    </ul>

</div>
<?php }
}
