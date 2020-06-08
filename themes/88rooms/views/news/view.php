<div class="title">
    <h1><?php echo $this->config->newsArchive->title; ?></h1>
</div>
<article class="single-view single-post">
    <div class="bg-left-black">
    </div>
    <div class="container_12 pos-rel">
        <span class="overlay-top"></span>
        <div class="grid_4 first thumb">            
            <img src="<?php echo $model->cmsMedia->_thumb_url; ?>" />            
            <span class="overlay"></span>
        </div>
        <div class="grid_8 last">
            <span class="rect-bg"></span>
            <h2><?php echo $model->title; ?></h2>
            <time><?php echo Utility::dateFormat($model->date_created); ?></time>
            <p><?php echo $model->text; ?></p>
            <div class="divider grid_4"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>
<?php if ($this->config->news_archive): ?>
    <div class="container_12 cf">
        <div class="archive-back prefix_4 grid_2 first">
            <a class="prev" href="<?php echo Utility::createUrl("page/index", array("slug" => $this->config->newsArchive->slug)); ?>" title="<?php echo sprintf(__("All %s"), $this->config->newsArchive->title); ?>">
                <?php echo Translation::model()->getByKey('all')." ".$this->config->newsArchive->title; ?>
            </a>
        </div>
        <div class="social-media grid_5">
            <div class="fb-like" data-href="<?php echo Utility::createUrl("news/view", array("slug" => $model->slug)); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
            <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
    </div>
<?php endif; ?>
<?php echo $this->renderPartial('//page/partials/blocks', array("model" => $model)); ?>
