<?php
/**
 * @package modx
 * @subpackage mysql
 */
$xpdo_meta_map['modContext']= array (
  'package' => 'modx',
  'table' => 'context',
  'fields' => 
  array (
    'key' => NULL,
    'description' => NULL,
  ),
  'fieldMeta' => 
  array (
    'key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'index' => 'pk',
    ),
    'description' => 
    array (
      'dbtype' => 'tinytext',
      'phptype' => 'string',
    ),
  ),
  'composites' => 
  array (
    'ContextResources' => 
    array (
      'class' => 'modContextResource',
      'local' => 'key',
      'foreign' => 'context_key',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
    'ContextSettings' => 
    array (
      'class' => 'modContextSetting',
      'local' => 'key',
      'foreign' => 'context_key',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
    'Acls' => 
    array (
      'class' => 'modAccessContext',
      'local' => 'key',
      'foreign' => 'target',
      'owner' => 'local',
      'cardinality' => 'many',
    ),
  ),
);
