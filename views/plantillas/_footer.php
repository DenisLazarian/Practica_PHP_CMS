<footer class="footer mb-0">

        <div class="first_block_footer">
            <div class="about_footer p-3   " style="background-color: #4a4a4a;">
                <div class="container justify-content-center">
                    <div class="row">
                        <div class="copy_right col-sm-12 ">
                            <p class="text-center text-light "> Copyright © 2000 -
                                <!-- <script
                                    type="text/javascript">var year = new Date(); document.write(year.getFullYear());</script> -->

                                    <?php 
                                        $anyActual = getdate();
                                        print $anyActual['year'];
                                    ?>
                                    
                                , <a class="text-decoration-none " href="#">Lazarian S.L.</a> All rights reserved.
                            </p>
                        </div>
                        <div class="brand_ftr_logo col-sm-6">
                            <h2 class="text-center"><a href=""><img src="views/img/imgSuport.png"></a></h2>
                        </div>
                        <div class="ftr_social_links col-sm-6">
                            <ul class="social-links mb-0 list-unstyled d-flex gap-3 justify-content-center ">
                                <li><a href="#" class="facebook"><img style="width: 20px;"
                                            src="views/img/imgSocialMedia/facebook.svg"
                                            alt="icono red social facebook"></i></a></li>
                                <li><a href="#" class="twitter"> <img style="width: 20px;"
                                            src="views/img/imgSocialMedia/instagram.svg"
                                            alt="icono red social instagram"></i></a></li>
                                <li><a href="#" class="instagram"><img style="width: 20px;"
                                            src="views/img/imgSocialMedia/twitter.svg" alt="icono red social twitter"></i></a>
                                </li>
                                <li><a href="#" class="youtube"> <img style="width: 20px;"
                                            src="views/img/imgSocialMedia/youtube.svg" alt="icono red social youtube"></i></a>
                                </li>
                            </ul>
                        </div>


                    </div>

                </div>

            </div>
        </div><!--first_block_footer-->
        <div class="second_block_footer  bg-dark  w-100">
            <div class="menulinks  ">
                <ul class=" d-flex justify-content-center list-unstyled  gap-3 p-3 mb-0 pl-0 mt-0">
                    <li><a class="text-light text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-light text-decoration-none" href="#">About</a></li>
                    <li><a class="text-light text-decoration-none" href="#">Services</a></li>
                    <li><a class="text-light text-decoration-none" href="#">Team</a></li>
                    <li><a class="text-light text-decoration-none" href="#">Contact</a></li>
                    <!-- <div class="clear"></div> -->
                </ul>
            </div>
        </div><!--second_block_footer-->

    </footer>
