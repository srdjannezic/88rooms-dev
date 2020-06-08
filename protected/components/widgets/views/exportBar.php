<div id="exportBar">
    <a class="nounderline" href="<?php echo $this->url ."&export=pdf"; ?>" title="Export PDF">
        <img src="<?php echo Yii::app()->baseUrl."/images/icons/pdf_32.png" ?>" alt="Export PDF" title="Export PDF"/>
    </a>
    <a class="nounderline" href="<?php echo $this->url ."&export=csv"; ?>" title="Export CSV">
        <img src="<?php echo Yii::app()->baseUrl."/images/icons/csv_32.png" ?>" alt="Export CSV" title="Export CSV"/>
    </a>
    <?php /*
    <a class="nounderline" href="<?php echo $this->url ."&export=email"; ?>" title="Email">
        <img src="<?php echo Yii::app()->baseUrl."/images/icons/email_32.png" ?>" alt="Email" title="Email"/>
    </a>
     * 
     */ ?>
</div>