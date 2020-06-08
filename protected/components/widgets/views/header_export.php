<table class="table">
    <?php for ($i = 0; $i < count($this->_items); $i++) : ?>
        <?php
        if ($i == 0 || $i == 3) {
            echo '<tr>';
            $open = true;
        }
        ?>

        <?php if (isset($this->image) && $i == 0): ?>
            <td rowspan="2">
                <div class="span">
                    <div class="media-grid">
                        <?php
                        echo '<img src="' . $this->image . '"/>';
                        ?>    
                    </div>
                </div>
            </td>
        <?php endif; ?>
        <?php
        if ($i == 4 && count($this->_items) == 5) {

            $colspan = 'colspan="2"';
            ?>

        <?php } ?>
        <?php
        if ($i == 3 && count($this->_items) == 4) {

            $colspan = 'colspan="3"';
            ?>

        <?php } ?>
        <td <?php echo $colspan; ?>>          
                <h6>
                    <?php echo $this->_items[$i]["label"]; ?>                  
                </h6>
                <h4>
                    <?php echo $this->_items[$i]["value"]; ?> 
                </h4>
        </td>






        <?php
        if ($open && ($i == 2 || $i == 5 || ($i == 4 && count($this->_items) == 5))) {
            echo '</tr>';
            $open = false;
        }
        ?>


    <?php endfor; ?>

</table>
<div style="clear:both"></div>