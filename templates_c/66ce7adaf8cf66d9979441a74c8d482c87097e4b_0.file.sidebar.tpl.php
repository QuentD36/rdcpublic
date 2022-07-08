<?php
/* Smarty version 3.1.34-dev-7, created on 2022-07-08 07:11:44
  from 'C:\wamp64\www\rdcpublic\public\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62c7d8b045d674_08351474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66ce7adaf8cf66d9979441a74c8d482c87097e4b' => 
    array (
      0 => 'C:\\wamp64\\www\\rdcpublic\\public\\sidebar.tpl',
      1 => 1650980338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c7d8b045d674_08351474 (Smarty_Internal_Template $_smarty_tpl) {
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
