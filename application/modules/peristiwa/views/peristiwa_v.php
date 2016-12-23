<div class="page-header">
  <h1><?= $p_title; ?> </h1>
</div>
 <div class="row ">
   <div class="col-md-11 col-sm-11">
     <div class="row">
       <?php foreach ($berita as $key => $value): ?>
         <div class="sec-topic col-sm-16 col-md-8">
           <a href="<?= base_url($value->news_url) ?>">
             <img width="1000" height="606" alt="<?= $value->news_title ?>" src="<?= base_url($value->news_thumb) ?>" class="img-thumbnail">
             <div class="sec-info">
               <h4><?= $value->news_title ?></h4>
               <div class="text-danger sub-info-bordered">
                 <div class="time"><span class="ion-android-data icon"></span><?= $this->format->date_indonesia($value->news_timestamp) ?></div>
                 <div class="comments"><span class="ion-eye icon"></span><?= $value->news_views ?></div>
               </div>
             </div>
           </a>
           <p><?= $this->format->text_only($value->news_desc, 0 , 100) ?></p>
         </div>
       <?php endforeach; ?>
     </div>
   </div>
   <!-- left sec end -->

   <!-- right sec start -->
   <div class="col-sm-5 hidden-xs right-sec">
     <div class="bordered">
       <div class="row ">

         <div class="col-sm-16 bt-space">
           <div class="main-title-outer pull-left">
             <div class="main-title full">Popular news</div>
             <ul class="list-unstyled">
               <?php modules::run('berita/get_popular') ?>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
