<?php
/**
 * Create a directory.
 *
 * @param string $name The name of the directory to create
 * @param string $parent The parent directory
 * @param boolean $prependPath (optional) If true, will prepend rb_base_dir to
 * the final path
 *
 * @package modx
 * @subpackage processors.browser.directory
 */
if (!$modx->hasPermission('file_manager')) return $modx->error->failure($modx->lexicon('permission_denied'));
$modx->lexicon->load('file');

if (empty($_POST['name'])) return $modx->error->failure($modx->lexicon('file_folder_err_ns'));
if (empty($_POST['parent'])) $_POST['parent'] = '';


$d = isset($_POST['prependPath']) && $_POST['prependPath'] != 'null' && $_POST['prependPath'] != null
    ? $_POST['prependPath']
    : $modx->getOption('base_path').$modx->getOption('rb_base_dir');
$parentdir = $d.$_POST['parent'].'/';

if (!is_dir($parentdir)) return $modx->error->failure($modx->lexicon('file_folder_err_parent_invalid'));
if (!is_readable($parentdir) || !is_writable($parentdir)) {
	return $modx->error->failure($modx->lexicon('file_folder_err_perms_parent'));
}

$newdir = $parentdir.'/'.$_POST['name'];

if (file_exists($newdir)) return $modx->error->failure($modx->lexicon('file_folder_err_ae'));

if (!@mkdir($newdir,0755)) {
	return $modx->error->failure($modx->lexicon('file_folder_err_create'));
}

return $modx->error->success();