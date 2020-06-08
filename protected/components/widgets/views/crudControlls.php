<div class="crudcontrolls">
    <ul>
        <?php 

            foreach($this->buttons as $button) {
                $needsId= in_array($button, $this->buttonsRequiringId);
                if($needsId) {
                    $hasId= isset($this->id);
                    if(!$hasId) {
                        Utility::notification(
                            "TitleWithControlls widget: Required parameter is missing", 
                            "'". $button."' button set on '".$this->title."' needs to have the id parameter", 
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
    </ul>
</div>