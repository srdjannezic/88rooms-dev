<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActionBar
 *
 * @author nikola.ristivojevic
 */
class ActionBar extends CWidget {

    public $routeBase;
    public $buttons;
    public $id;
    public $model;
    public $exportUrl;
    public $advancedSearch = false;
    public $searchBar = false;
    public $extraButtons;
    public $exportButtons;
    public $exportColumns;
    public $title = "";
    protected $allowedButtons;
    protected $buttonsRequiringId;
    protected $defaultButtons;
    protected $defaultExportButtons;
    protected $action;
    protected $controllerName;

    public function init() {
        if (!isset($this->id)) {
            $this->id = (!empty($_GET['id'])) ? $_GET['id'] : null;
        }

        $this->defaultExportButtons = array(
            "create" => array(
            ),
            "view" => array(
                ExportButtons::pdf,
            ),
            "update" => array(
            ),
            "index" => array(// index (list entries) page
                ExportButtons::pdf,
                ExportButtons::csv,
            ),
            "admin" => array(
                ExportButtons::pdf,
                ExportButtons::csv,
            ),
        );

        $this->allowedButtons = array(
            CrudButtons::create,
            CrudButtons::view,
            CrudButtons::update,
            CrudButtons::delete,
            CrudButtons::listEntries,
            CrudButtons::admin,
            CrudButtons::exportPdf,
            CrudButtons::exportDocumentPdf
        );

        $this->buttonsRequiringId = array(
            CrudButtons::view,
            CrudButtons::update,
            CrudButtons::delete,
            CrudButtons::exportPdf,
            CrudButtons::exportDocumentPdf
        );

        $this->defaultButtons = array(
            "create" => array(
                CrudButtons::listEntries,
                CrudButtons::admin
            ),
            "view" => array(
                CrudButtons::update,
                CrudButtons::delete,
                CrudButtons::admin,
            //CrudButtons::listEntries
            ),
            "update" => array(
                CrudButtons::view,
                CrudButtons::delete
            ),
            "index" => array(// index (list entries) page
                CrudButtons::create,
                CrudButtons::admin,
            ),
            "admin" => array(
                CrudButtons::create,
            //CrudButtons::listEntries
            ),
        );

        // current running action
        $this->controllerName = $this->getController()->getId();
        $this->action = $this->getController()->getAction()->getId();
        if (!in_array($this->action, array("index", "update", "view", "admin", "create"))) {
            $this->action = "view";
        }

        if (!isset($this->routeBase)) {
            $this->routeBase = $this->getController()->getId();
        }

        if (!isset($this->buttons)) {
            $this->buttons = $this->defaultButtons[$this->action];
        }

        if (!isset($this->exportButtons)) {
            $this->exportButtons = $this->defaultExportButtons[$this->action];
        }
    }

    protected function renderButton($type) {
        if (!$this->checkAccess($type))
            return;

        $base = Yii::app()->baseUrl;
        $tooltip = ucfirst($type);
        if ($type == CrudButtons::create) {
            $tooltip = __("Create");
        } elseif ($type == CrudButtons::admin) {
            $tooltip = __("List view");
        } elseif ($type == CrudButtons::listEntries) {
            $tooltip = __("Browse");
        } elseif ($type == CrudButtons::exportPdf) {
            $tooltip = __("Export PDF");
        } elseif ($type == CrudButtons::exportDocumentPdf) {
            $tooltip = __("Export document");
        } elseif ($type == CrudButtons::update) {
            $tooltip = __("Change");
        } elseif ($type == CrudButtons::delete) {
            $tooltip = __("Delete");
        }
        $urlType = $type;
        $params = $this->getController()->getActionParams();
        $params = (!empty($params)) ? $this->getController()->getActionParams() : array();
        if ($type == "list") {
            $urlType = "";
        } elseif ($type == CrudButtons::exportPdf) {
            $urlType = $this->getController()->getAction()->getId() . "&amp;export=pdf";
        }

        $params = isset($this->id) ? array_push($params, array("id" => $this->id)) : $params;
        if ($type == CrudButtons::listEntries || $type == CrudButtons::admin) {
            $params = array();
        }
        $url = Yii::app()->createUrl($this->routeBase . "/$urlType", $params);

        $href = "#";
        if ($type != "delete") {
            $href = $url;
        }

        echo "<a href='$href' class='btn' ";
        if ($type == "delete") {
            echo "onclick=\"confirmDelete('$url');\"";
        }
        echo ">";
        if ($this->getButtonIcon($type) != null) {
            echo "<i class='" . $this->getButtonIcon($type) . "'></i> ";
        }
        echo "{$tooltip}</a>";
    }

    protected static function getButtonIcon($button) {
        $i;

        switch ($button) {
            case CrudButtons::update: $i = "icon-pencil";
                break;
            case CrudButtons::delete: $i = "icon-trash";
                break;
            case CrudButtons::create: $i = "icon-plus";
                break;
            case CrudButtons::listEntries: $i = "icon-list";
                break;
            case CrudButtons::admin: $i = "icon-list-alt";
                break;
            default: $i = null;
        }
        return $i;
    }

    public function renderExportButton($button) {
        if ($button == "csv") {
            echo "
                <li>
                    <form method='POST' class='export_csv hide' action='" . Utility::createUrl($this->controllerName . "/find&export=csv") . "'>
                        <input type='hidden' name='columns' value='" . urlencode(CJSON::encode($this->exportColumns)) . "' />
                    </form>
                    <a onclick=\"$('form.export_csv').submit(); return false;\" href='#'>CSV</a>
                </li>";
        } else {
            echo "<li><a class='export_{$button}' href='{$this->exportUrl}&export={$button}'>" . strtoupper($button) . "</a></li>";
        }
    }

    public function renderExtraButton($button) {
        //Utility::dump($button);
        if (!$this->checkExtraButtonAccess($button)) {
            return false;
        }
        $url = $button['url'];
        $text = $button['text'];
        $icon = $button['icon'];
        $type = isset($button['type']) ? "btn-{$button['type']}" : "";
        $id = isset($button['id']) ? "id='{$button['id']}'" : "";
        $onclick = isset($button['onclick']) ? "onclick='" . $button['onclick'] . "'" : "";
        $htmlOptionsArray = isset($button['htmlOptions']) ? $button['htmlOptions'] : "";
        $htmlOptions = "";
        //Utility::dump($htmlOptionsArray);
        if (!empty($htmlOptionsArray) && is_array($htmlOptionsArray)) {
            foreach ($htmlOptionsArray as $key => $option) {
                if ($key != "class" && $key != "id" && $key != "href") {
                    $htmlOptions.= " {$key}=\"{$option}\" ";
                }
            }
        }
        $whiteIcon = ($type != "") ? "icon-white" : "";


        echo "<a {$id}{$htmlOptions}{$onclick} class='btn {$type}' href='{$url}'><i class='icon-{$icon} {$whiteIcon}'></i> {$text}</a>";
    }

    public function run() {
        $this->render("actionBar");
    }

    protected function checkAccess($type) {
        $action = null;
        switch ($type) {
            case "create": $action = "Create";
                break;
            case "update": $action = "Update";
                break;
            case "admin": $action = "Read";
                break;
            case "list": $action = "Read";
                break;
            case "delete": $action = "Delete";
                break;
        }

        Utility::log($type, "actionbarCheck");
        return Utility::checkAccess($action, $this->getController());
    }

    protected function checkExtraButtonAccess($button) {
        if (isset($button['permission'])) {
            if (strpos($button['permission'], ":") !== false) {
                return Utility::checkAccess($button['permission']);
            } else {
                return Utility::checkAccess($button['permission'], $this->getController());
            }
        } else {
            return true;
        }
    }

}

?>