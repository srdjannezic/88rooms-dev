<div id="actionBar" class="well">
    <div class="btn-group item">
        <?php        
            foreach($this->buttons as $button) {
                $needsId= in_array($button, $this->buttonsRequiringId);
                if($needsId) {
                    $hasId= isset($this->id);
                    if(!$hasId) {
                        Utility::notification(
                            "TitleWithControlls widget: Required parameter is missing", 
                            "'". $button."' button set on '".addslashes($this->title)."' needs to have the id parameter", 
                            "Dev"
                        );
                        continue;
                    }
                }
                
                if(in_array($button, $this->allowedButtons)) {
                    $this->renderButton($button);
                }
            }
        ?>
    </div>
    
    <?php if(isset($this->extraButtons) && is_array($this->extraButtons) && count($this->extraButtons)>0): 
        $groups= array();
        $dropdownButtons= array();
            
        foreach($this->extraButtons as $button) {
            //Utility::dump($button);
            if(isset($button['items'])) {
                $dropdownButtons[]= $button;
            }
            elseif(is_array($button)) {
                $groups[]= $button;  
            }
        }
        /*
        if(count($groups)>0) {
            foreach($groups as $group) {
                echo '<div class="btn-group item">';
                foreach($group as $subButton) {
                    
                    $this->renderExtraButton($subButton);
                }
                echo "</div>";
            }
        }*/
        if(count($dropdownButtons)>0) {
            foreach($dropdownButtons as $dropdownButton) {
                
                if(!isset($dropdownButton['text'])) {
                    throw new Exception("ActionBar widget: one of your drop-down buttons is missing \$text");
                }
                echo '<div class="btn-group item">';
                $icon= isset($dropdownButton['icon']) ? "<i class='icon-{$dropdownButton['icon']}'></i> " : "";
                echo "<a class='btn dropdown-toggle' data-toggle='dropdown' href='#'>{$icon}{$dropdownButton['text']}<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                
                foreach($dropdownButton['items'] as $item) {
                    echo "<li><a href='{$item['url']}'>{$item['text']}</a></li>";  
                }
                echo "</ul></div>";
            }
        }
        else {
            echo '<div class="btn-group item">';
            
            foreach($this->extraButtons as $button) {                
                
                $this->renderExtraButton($button);   
                
            }
            echo "</div>";
        }
        ?>
    <?php endif; ?>
    
    <?php if($this->advancedSearch==true): ?>
        <a class="search-button btn item" href="#"><i class="icon-search"></i> <?php echo __('Napredna pretraga');?></a>
    <?php endif; ?>
        
    <?php if(isset($this->exportUrl)): ?>
        <div id="exportBar" class="btn-group item">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-share"></i> <?php echo __("Export"); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php 
                foreach($this->exportButtons as $button) {
                    $this->renderExportButton($button);
                }
            ?>
          </ul>
        </div>
    <?php endif; ?>
</div>
<div style="clear:both"></div>

