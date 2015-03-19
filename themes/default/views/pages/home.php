<?php defined('SYSPATH') or die('No direct script access.');?>
<?if(core::config('advertisement.ads_in_home') != 3):?>
<div class="well row">
    <?if(core::config('advertisement.ads_in_home') == 0):?>
    <h3><?=__('Latest Ads')?></h3>
    <?elseif(core::config('advertisement.ads_in_home') == 1 OR core::config('advertisement.ads_in_home') == 4):?>
    <h3><?=__('Featured Ads')?></h3>
    <?elseif(core::config('advertisement.ads_in_home') == 2):?>
    <h3><?=__('Popular Ads last month')?></h3>
    <?endif?>
    <div class="col-md-12">
        <?$i=0;
        foreach($ads as $ad):?>
        <div class="col-md-3">
            <div class="thumbnail latest_ads">
                <a href="<?=Route::url('ad', array('category'=>$ad->category->seoname,'seotitle'=>$ad->seotitle))?>"  class="min-h">
                <?if($ad->get_first_image()!== NULL):?>
                    <img src="<?=Core::S3_domain().$ad->get_first_image()?>" alt="<?=HTML::chars($ad->title)?>">
                <?else:?>
                    <?if(( $icon_src = $ad->category->get_icon() )!==FALSE ):?>
                                <img src="<?=$icon_src?>" alt="<?=HTML::chars($ad->title)?>" >
                    <?elseif(( $icon_src = $ad->location->get_icon() )!==FALSE ):?>
                                <img src="<?=$icon_src?>" alt="<?=HTML::chars($ad->title)?>" >
                            <?else:?>
                                <img src="//www.placehold.it/200x200&text=<?=$ad->category->name?>" alt="<?=HTML::chars($ad->title)?>"> 
                            <?endif?> 
                <?endif?>
                </a>
                <div class="caption">
                    <h5><a href="<?=Route::url('ad', array('controller'=>'ad','category'=>$ad->category->seoname,'seotitle'=>$ad->seotitle))?>"><?=$ad->title?></a></h5>

                    <p ><?=Text::limit_chars(Text::removebbcode($ad->description), 30, NULL, TRUE)?></p>

                </div>
            </div>
        </div>     
        <?endforeach?>
    </div>
</div>
<?endif?>
<div class='well row'>
    <h3><?=__("Categories")?></h3>
    <div class="col-md-12">
    <?$i=0;?>
        <?foreach($categs as $c):?>
        <?if($c['id_category_parent'] == 1 && $c['id_category'] != 1):?>
        <div class="col-md-4">
            <div class="category_box_title">
                <p><a title="<?=HTML::chars($c['name'])?>" href="<?=Route::url('list', array('category'=>$c['seoname']))?>"><?=mb_strtoupper($c['name']);?></a></p>
            </div>  
            <div class="well custom_box_content" style="padding: 8px 0;">
                <ul class="nav nav-list">
                    <?foreach($categs as $chi):?>
                        <?if($chi['id_category_parent'] == $c['id_category']):?>
                        <li><a title="<?=HTML::chars($chi['name'])?>" href="<?=Route::url('list', array('category'=>$chi['seoname']))?>"><?=$chi['name'];?> <span class="count_ads"><span class="badge badge-success"><?=$chi['count']?></span></span></a></li>
                        <?endif?>
                     <?endforeach?>
                </ul>
            </div>
        </div>
        <?
        $i++;
            if ($i%3 == 0) echo '<div class="clear"></div>';
            ?>
        <?endif?>
        <?endforeach?>
    </div>
</div>
<?if(core::config('general.auto_locate')):?>
    <input type="hidden" name="auto_locate" value="<?=core::config('general.auto_locate')?>">
    <?if(count($auto_locats) > 0):?>
        <div class="modal fade" id="auto-locations" tabindex="-1" role="dialog" aria-labelledby="autoLocations" aria-hidden="true">
            <div class="modal-dialog	modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="autoLocations" class="modal-title text-center"><?=__('Please choose your closest location')?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                            <?foreach($auto_locats as $loc):?>
                                <a href="<?=Route::url('list', array('location'=>$loc->seoname))?>" class="list-group-item"><span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span> <?=$loc->name?> (<?=i18n::format_measurement($loc->distance)?>)</a>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endif?>
<?endif?>