<?php

// Módulo traduzido para o Português do Brasil (portuguese) por
// Leco (m_ohse@hotmail.com) URL: http://xoopersBR.com


$root = XCube_Root::getSingleton();
if (is_object($root->mContext->mUser) && $root->mContext->mUser->isInRole('Site.GuestUser')) {
  define('_MI_MYFRIEND_NAME', 'Sobre o registro inicial');
} else {
  define('_MI_MYFRIEND_NAME', 'Meus Amigos');
}

define('_MI_MYFRIEND_GROUP', 'Grupo de usuários');
define('_MI_MYFRIEND_GROUP_DESC', 'Grupo de usuários que usam a Rede de Serviço Social');
define('_MI_MYFRIEND_DELDAYS', 'Dias para a exclusão');
define('_MI_MYFRIEND_DELDAYS_DESC', 'Número de dias para que o convite pessoal é excluido.');
define('_MI_MYFRIEND_GESTPROF', 'userinfo.php público');
define('_MI_MYFRIEND_GESTPROF_DESC', 'userinfo.php publico');

define('_MI_MYFRIEND_CONF_OP1', 'Userinfo.php não é acessado pelo convidado.');
define('_MI_MYFRIEND_CONF_OP2', 'Acesso do convidado é padrão userinfo.php.');
define('_MI_MYFRIEND_CONF_OP3', 'Userinfo.php é acessado pelo convidado.');

define('_MI_MYFRIEND_BLOCK_NAME', 'Bloco Novos amigos');
define('_MI_MYFRIEND_SUB_SEARCH', 'Busca de usuários');
define('_MI_MYFRIEND_SUB_FAVORITES', 'Usuários favoritos');
define('_MI_MYFRIEND_INSTALL_ERROR', 'Este módulo funciona com PHP5.0 ou mais recente.');
?>
