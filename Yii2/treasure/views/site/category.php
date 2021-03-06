<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>


<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?foreach($articles as $article) :?>


                <article class="post post-list">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-thumb">
                                <a href="blog.html"><img src="<?=$article->getImage(); ?>" alt="" class="pull-left"></a>

                                <a href="blog.html" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <header class="entry-header text-uppercase">
                                    <h6><a href="#"><?=$article->category->title?></a></h6>

                                    <h1 class="entry-title"><a href="blog.html"><?=$article->title?></a></h1>
                                </header>
                                <div class="entry-content">
                                    <p>
                                        <?= $article->content;?>
                                    </p>
                                </div>
                                <div class="social-share">
                                    <span class="social-share-title pull-left text-capitalize">By Rubel On <?= $article->getDate() ; ?></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>




            <?php
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
            ?>

            <?php endforeach; ?>

            </div>





            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">

                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
                        <?php foreach ($popular as $article):?>
                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src="<?= $article->getImage();?>" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase"><?=$article->title?></a>
                                    <span class="p-date"><?=$article->getDate();?></span>

                                </div>
                            </div>
                        <?php endforeach; ?>

                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                        <?php foreach ($recent as $article):?>

                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img src="<?= $article->getImage() ;?>" alt="">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase"><?= $article->title ;?></a>
                                        <span class="p-date"><?=$article->getDate()?></span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </aside>
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Categories</h3>
                        <ul>
                            <?php foreach ($categories as $category):?>
                            <li>
                                <a href="#"><?= $category->title ;?></a>
                                <span class="post-count pull-right">(<?= $category->getArticlesCount().'к-ство , статей';?>)</span>
                                <?php endforeach; ?>
                            </li>

                        </ul>
                    </aside>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- end main content-->