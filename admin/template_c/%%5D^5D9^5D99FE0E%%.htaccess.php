<?php /* Smarty version 2.6.26, created on 2013-08-10 19:42:58
         compiled from ../../.htaccess */ ?>
# For security reasons, Option followsymlinks cannot be overridden.
#Options +FollowSymLinks
Options +SymLinksIfOwnerMatch

RewriteEngine on
RewriteBase   /admin/



RewriteCond % !\.(htm|html|js|ico|gif|jpg|png|css|jpeg|swf|flv|php|zip|gzip|htc)$

RewriteRule (.*) index2.php