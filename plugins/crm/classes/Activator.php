<?php
namespace Crm;
use Crm\Init;

class Activator {
  function crm_init() {
    new Init();
    flush_rewrite_rules();
  }
}