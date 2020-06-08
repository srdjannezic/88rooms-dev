<div class="base_info">
    <div>
        <?php if(isset($this->image) && $this->image!==false): ?>
        <div class="media-grid header" style="width:100px; height: 100px; position: relative">
        <?php 
        
            if((!isset($this->image['manual']) || $this->image['manual']!=true)) {
                $this->widget("Photo", array(
                    "model"=>$this->image['class'],
                    "field"=>$this->image['field'],
                    "id"=>$this->image['id'],
                    "lightBox"=>$this->image['lightBox'],
                    "w"=>"100",
                    "h"=>"100",
                    "path" => $this->image['path']
                ));
            }
            elseif(isset($this->image['manual'])) {
                echo '<div class="photo" style="background-image: url('.$this->image['url'].');width:100px;height:100px; background-position: center; margin: 0 auto;" data-image-id="manual"> </div>';
            }
            if(isset($this->image['label'])) {
                echo "<div style='position:absolute; top:0; left: 0; background-color:#FFFFFF; padding:5px'>{$this->image['label']}</div>";
            }
        ?>    
        </div>
        <?php endif; ?>
    </div>
    <table class="header">     
        <?php for($i=0; $i<count($this->_items); $i++) : ?>
            <?php if($i==0 || $i==3) { echo '<tr>'; $open=true; } ?>
        <td>

                <div class="block_info">
                    <div class="block_info_title">
                        <h6>
                        <?php echo $this->_items[$i]["label"]; ?>                  
                        </h6>
                    </div>
                    <div class="block_info_content">
                        <h4>
                            <?php echo Utility::excerpt($this->_items[$i]["value"], 160); ?> 
                        </h4>
                    </div>

                </div>

        </td>
            <?php if($open && ($i==2 || $i==5)) { echo '</tr>'; $open=false; } ?>
        <?php endfor; if($open) echo "</tr>"; ?>
    </table>
    <div style="clear: both"></div>
</div>