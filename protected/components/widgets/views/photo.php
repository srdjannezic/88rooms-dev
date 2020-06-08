
<?php
    if($this->lightBox){

        echo '<a href="'.$this->lightBoxUrl.'" rel="'.(($this->gallery) ? 'prettyPhoto[gallery]' : 'prettyPhoto').'">';
    }

    //$cache= !$this->cache ? (rand(1,9999)) : "";

    echo "<div data-image-id='{$this->id}' class='photo' style=\"background-image: url({$this->url});width:{$this->w}px;height:{$this->h}px; background-position: center; margin: 0 auto;\">
</div>";
    if($this->lightBox){

        echo '</a>';
    }
?>


