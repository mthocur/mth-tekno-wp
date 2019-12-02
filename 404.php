    <?php get_header(); ?>
    
    <!-- Ads -->
    <?php get_template_part('inc/reklam-buyuk'); ?>
    <!-- Ads -->
    
    <!-- Content -->


    <section id="content">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3 page404">
                <h1>Hay aksi! Aradığınız şeyi bulamadık.</h1>
                    <img src="<?php echo bloginfo("template_url"); ?>/img/404.gif" alt="Hata! - 404 Bulunamadı" class="img-responsive">


                <div class="benzer-yazilar col-md-12">
                        <h1>Belki şunlar ilginizi çekebilir;</h1>
                        <div class="widget-hr">
                            <div class="sari-cizgi-2"></div><div class="siyah-cizgi-2"></div>
                        </div>
                        <?php rastgele_yazi('3'); ?>

                        

                </div>
            </div>

            
        </div>
    </section>

    <!-- Content -->


    <!-- Footer -->
    <?php get_footer(); ?>
    <!-- Footer -->