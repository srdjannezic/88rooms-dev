
<?php if($this->action!="view") { 
    echo "<div id=\"contactImage_{$this->id}\" class='contactImage' style=\"background-image: url('{$this->url}'); background-position: center;\"></div>";
}
else { ?>

<script type="text/javascript">
    var image= "<?php echo "<div class='photoWrapper'><div id=\\\"contactImage_{$this->id}\\\" class='contactImage' style=\\\"background-image: url('$this->url'); background-position: center;\\\"></div></div>"; ?>";
    var action= "<?php echo $this->action; ?>";
      
    var $table= $("table.detail-view:first");
    $table.wrap("<div style='position:relative' />");
    var $wrapper= $table.parent();
    $wrapper.prepend(image);   
</script>

<?php } ?>

