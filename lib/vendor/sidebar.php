<?php

class Sidebar {
  private $conditionals;
  private $templates;

  public $display = true;

  function __construct($conditionals = array(), $templates = array()) {
    $this->conditionals = $conditionals;
    $this->templates    = $templates;

    $conditionals = array_map(array($this, 'check_conditional_tag'), $this->conditionals);
    $templates    = array_map(array($this, 'check_page_template'), $this->templates);

    if (in_array(true, $conditionals) || in_array(true, $templates)) {
      $this->display = false;
    }
  }

  private function check_conditional_tag($conditional_tag) {
    $conditional_arg = is_array($conditional_tag) ? $conditional_tag[1] : false;
    $conditional_tag = $conditional_arg ? $conditional_tag[0] : $conditional_tag;

    if (function_exists($conditional_tag)) {
      return $conditional_arg ? $conditional_tag($conditional_arg) : $conditional_tag();
    } else {
      return false;
    }
  }

  private function check_page_template($page_template) {
    return is_page_template($page_template);
  }
}
