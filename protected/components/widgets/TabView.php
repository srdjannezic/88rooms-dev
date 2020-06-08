<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TabView
 *
 * @author master
 */
class TabView extends CTabView {

    public $type = "tabs"; // tabs or pills
    public $disabled = false;

    public function init() {
        foreach ($this->tabs as $id => $tab) {
            $content = "";

            if (isset($tab['content'])) {
                $content = $tab['content'];
            } elseif (isset($tab['view'])) {
                if (isset($tab['data'])) {
                    if (is_array($this->viewData)) {
                        $data = array_merge($this->viewData, $tab['data']);
                    } else {
                        $data = $tab['data'];
                    }
                } else {
                    $data = $this->viewData;
                }
            }
            /*
              $content= $this->getController()->renderPartial($tab['view'], $data, true);

              if (Utility::startsWith($content, "Access denied")) {
              unset($this->tabs[$id]);
              }
             * 
             */
        }
        if ($this->type == "tabs") {
            $this->htmlOptions['class'] = "bootstrap-tab-view";
        } elseif ($this->type == "pills") {
            $this->htmlOptions['class'] = "nav-pills";
        }

        parent::init();
    }

    /**
     * Renders the header part.
     */
    protected function renderHeader() {
        echo "<ul class=\"nav nav-{$this->type}\">\n";
        foreach ($this->tabs as $id => $tab) {
            $title = isset($tab['title']) ? $tab['title'] : 'undefined';
            $active = $id === $this->activeTab ? ' class="active"' : ($this->disabled === true ? "class='disabled'" : '');
            $url = isset($tab['url']) ? $tab['url'] : "#{$id}";
            echo "<li><a href=\"{$url}\"{$active}>{$title}</a></li>\n";
        }
        echo "</ul>\n";
    }

    /**
     * Registers the needed CSS and JavaScript.
     */
    public function registerClientScript() {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile(param("baseUrl") . 'js/jquery.yiitab.js');
        $id = $this->getId();
        $cs->registerScript('Yii.CTabView#' . $id, "jQuery(\"#{$id}\").yiitab();");

        if ($this->cssFile !== false)
            parent::registerCssFile($this->cssFile);
    }

    /*
      protected function checkAccess($tab) {
      return true;
      $controller = $this->getController()->getId();
      $action = $this->getController()->getAction()->getId();
      $viewSplit = explode("/", $tab['view']);
      if ($this->type == "tabs") {
      $tab = $viewSplit[count($viewSplit) - 1];
      $idSplit = explode("_", $tab);
      foreach ($idSplit as &$elem) {
      $elem = ucfirst($elem);
      }
      $tab = implode("", $idSplit);
      $operation = ucfirst($controller) . ":" . ucfirst($action) . ":Tabs:" . $tab;
      } else {
      $pill = $viewSplit[count($viewSplit) - 1];
      $idSplit = explode("_", $pill);
      foreach ($idSplit as &$elem) {
      $elem = ucfirst($elem);
      }
      $pill = implode("", $idSplit);
      $tab = $viewSplit[count($viewSplit) - 2];
      $idSplit = explode("_", $tab);
      foreach ($idSplit as &$elem) {
      $elem = ucfirst($elem);
      }
      $tab = implode("", $idSplit);
      $operation = ucfirst($controller) . ":" . ucfirst($action) . ":Tabs:" . ucfirst($tab) . ":Pills:" . ucfirst($pill);
      }
      Utility::checkAccess($operation);
      }
     */

    /**
     * Renders the body part.
     */
    protected function renderBody() {
        foreach ($this->tabs as $id => $tab) {
            $inactive = $id !== $this->activeTab ? ' style="display:none"' : '';
            echo "<div class=\"view\" id=\"{$id}\"{$inactive}>\n";
            if (isset($tab['content']))
                echo $tab['content'];
            else if (isset($tab['view'])) {
                if (isset($tab['data'])) {
                    if (is_array($this->viewData))
                        $data = array_merge($this->viewData, $tab['data']);
                    else
                        $data = $tab['data'];
                }
                else
                    $data = $this->viewData;
                $this->getController()->renderPartial($tab['view'], $data);
            }
            echo "</div><!-- {$id} -->\n";
        }
    }

}

?>
