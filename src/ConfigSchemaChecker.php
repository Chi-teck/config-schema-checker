<?php

namespace Drupal\config_schema_checker;

use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\Schema\SchemaIncompleteException;
use Drupal\Core\Config\Development\ConfigSchemaChecker as BaseChecker;

final class ConfigSchemaChecker extends BaseChecker {

  public function onConfigSave(ConfigCrudEvent $event): void {
    try {
      parent::onConfigSave($event);
    }
    catch (SchemaIncompleteException $exception) {
      \trigger_error($exception->getMessage(), \E_USER_WARNING);
    }
  }

}
