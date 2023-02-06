<footer>
    <div class="container">
        <div class="row pt-4">
            <div class="col-lg-4" id="appsMobile">
                <div>
                    <nav id="listen_li">
                        <div class="title"><?= $lang['mobileApp']; ?></div>
                        <span><?= $lang['lnk_download_simpleRadio']; ?></span>
                        <div style="margin-top:10px;">
                            <a style="margin-right:10px;" href="https://itunes.apple.com/us/app/simple-radio-by-streema-tunein/id891132290?mt=8" target="_blank"><img src="../images/app_store.svg" width="143" height="45"></a>
                            <a href="https://play.google.com/store/apps/details?id=com.streema.simpleradio" target="_blank"> <img src="../images/google-play.png" width="143" height="45"></a>
                        </div>
                        <div style="margin-top: 10px;"><small><?php echo ($lang['lnk_req_simpleRadio']); ?></small></div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3">
                <nav>
                    <ul>
                        <li class="title"><?php echo SITE_NAME; ?></li>
                        <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#aboutModal"><?= $lang['about']; ?></a></li>
                        <li class='nav-item'><a href="https://www.bonfire.com" target="_blank"><?= $lang['merch']; ?></a></li>
                        <li class='nav-item' id="teams"><a href="<?= $router->generate('team');?>"><?= $lang['team']; ?></a></li>
                        <li class='nav-item' id="join_us"><a href="<?= $router->generate('benevolat');?>"><?= $lang['volunteering']; ?></a></li>
                        <li class='nav-item' id="privacy_policy"><a href='<?= $router->generate('privacy-policy');?>'><?= $lang['privacyPolicy']; ?></a></li>
                    </ul>
                </nav>
            </div>
            <?php if (FOOTER3) { ?>
                <div class="col-2">
                    <nav>
                        <ul>
                            <li class="title"><?= $lang['tt_footer_03'] ?></li>
                            <li class='nav-item'><a href="<?= F3_LINK1_LINK ?>" target="_blank"><?= F3_LINK1_TXT ?></a></li>
                            <li class='nav-item'><a href="<?= F3_LINK2_LINK ?>" target="_blank"><?= F3_LINK2_TXT ?></a></li>
                            <li class='nav-item'><a href="<?= F3_LINK3_LINK ?>" target="_blank"><?= F3_LINK3_TXT ?></a></li>
                            <li class='nav-item'><a href="<?= F3_LINK4_LINK ?>" target="_blank"><?= F3_LINK4_TXT ?></a></li>
                        </ul>
                    </nav>
                </div>
            <?php } ?>
            <div class="col-lg-3" id="social">
            <ul class="list-unstyled d-flex me-5 ms-5">
                <?php use RewindRadio\Layout; 
                    Layout::socialIcons('twitter', 'https://twitter.com/noordotda');
                    Layout::socialIcons('instagram', 'https://instagram.com/noordotda');
                    Layout::socialIcons('github', 'https://github.com/noordotda');
                    Layout::socialIcons('discord', DISCORD_INVITE);
                ?>
                </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>

</footer>
<div class="player"> 
<div class="comingSoon"> artist- songs goes here </div>   
<audio class="js-player">
                <source src="'. RADIO_URL .'" />
            </audio>
</div>
<?php

include(VIEW_PATH."layout/modals.php");

StaticContent::get_scriptfiles();
?>