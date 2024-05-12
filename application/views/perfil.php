<body data-path-to-root="./" class="u-body u-xl-mode" data-lang="pt">

  <section class="u-align-center u-clearfix u-container-align-center-xs u-image u-section-1" id="carousel_9604" data-image-width="1980" data-image-height="1320">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="custom-expanded data-layout-selected u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-col">

            <!-- Seja Bem vindo... -->
            <div class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-container-style u-custom-color-4 u-layout-cell u-size-17 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h2 class="u-align-center u-custom-font u-text u-text-1">Seja bem-vind​o(​a) <?php echo $_SESSION["usuario"]["nome"] ?></h2><span class="u-align-left u-file-icon u-icon u-icon-rectangle u-text-white u-icon-1"><img src="<?php echo base_url("/assets/images/667327-e607e584.png") ?>" alt=""></span>
                <p class="u-align-center u-text u-text-default-lg u-text-default-xl u-text-2"> <?php echo $_SESSION["usuario"]["estado"] ?> - <?php echo $_SESSION["usuario"]["cidade"] ?></p>
                <p class="u-align-center u-text u-text-default u-text-3"><?php echo $_SESSION["usuario"]["email"] ?><span style="font-weight: 400;"></span>
                </p>
              </div>
            </div>

            <!-- Div pai dos outros elementos -->
            <div class="u-align-center u-container-align-center-lg u-container-style u-layout-cell u-size-43 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <h4 class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-custom-font u-text u-text-custom-color-4 u-text-4">INFORMAÇÕES ESTUDANTIS</h4>

                <?php
                foreach ($_SESSION["dados"]["conhecimentos"] as $key => $value) { ?>
                  <div class="u-container-style u-group u-shape-rectangle u-group-2">
                    <div class="u-container-layout u-container-layout-3">
                      <h4 class="u-align-center-md u-align-center-sm u-align-left-xs u-text u-text-default u-text-5"><?php echo $value->instituicao_ensino ?></h4>
                      <h6 class="u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-default u-text-6">
                        <?php
                        echo date('Y', strtotime(str_replace('/', '-', $value->dt_inicio))) . "-" . date('Y', strtotime(str_replace('/', '-', $value->dt_conclusao)));
                        ?>
                      </h6>
                      <br>
                      <blockquote class="u-align-justify u-text u-text-default u-text-7">
                        <?php 
                          echo str_replace("\n", "<br>", $value->experiencia);
                        ?>
                      </blockquote>
                    </div>
                  </div>
                <?php }  ?>

                <h4 class="u-align-center u-custom-font u-text u-text-custom-color-4 u-text-default u-text-11">PRINCIPAIS TECNOLOGIAS</h4>
                <!-- Div pai das tecnologias (lista de items) -->
                <div class="custom-expanded u-layout-horizontal u-list u-list-1">

                  <!-- Elementos das tecnologias -->
                  <div class="u-repeater u-repeater-1">
                    <!-- Linguagem -->
                    <div class="u-container-align-center-md u-container-align-center-sm u-container-style u-list-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-container-layout-5"><span class="u-align-center-md u-align-center-sm u-align-center-xs u-file-icon u-icon u-icon-2"><img src="<?php echo base_url("/assets/images/3206042.png") ?>" alt=""></span>
                        <h3 class="u-align-center u-text u-text-default u-text-12">
                          <?php echo ucfirst($_SESSION["dados"]["tecnologias"][0]->linguagem); ?>

                        </h3>
                        <span class="mt-3">
              
                          <center>
                            <?php echo ucfirst($_SESSION["dados"]["tecnologias"][0]->nivel_linguagem); ?>
                          </center>

                        </span>
                      </div>
                    </div>

                    <!-- Gestão -->
                    <div class="u-align-center u-container-align-center-md u-container-align-center-sm u-container-style u-list-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-container-layout-6"><span class="u-align-center-md u-align-center-sm u-align-center-xs u-file-icon u-icon u-icon-3"><img src="<?php echo base_url("/assets/images/4661318.png") ?>" alt=""></span>
                        <h3 class="u-align-center u-text u-text-default u-text-13">
                          <?php echo ucfirst($_SESSION["dados"]["tecnologias"][0]->gestao); ?>

                        </h3>
                        <span class="mt-3">
                          <center>
                            <?php echo ucfirst($_SESSION["dados"]["tecnologias"][0]->nivel_gestao); ?>
                          </center>

                        </span>
                      </div>
                    </div>

                    <!-- Banco de Dados -->

                    <div class="u-container-align-center-md u-container-align-center-sm u-container-style u-list-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-container-layout-7"><span class="u-align-center-md u-align-center-sm u-align-center-xs u-file-icon u-icon u-icon-4"><img src="<?php echo base_url("/assets/images/1925161.png") ?>" alt=""></span>
                        <h3 class="u-align-center u-text u-text-default u-text-14">
                          <?php echo ucfirst($_SESSION["dados"]["tecnologias"][0]->bancodados); ?>

                        </h3>
                        <span class="mt-3">
                          <center>
                            <?php echo ucfirst($_SESSION["dados"]["tecnologias"][0]->nivel_bancodados); ?>
                          </center>

                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Botão de navegação (carrosel) apenas em dispositivos menores -->
                  <a class="u-absolute-vcenter-lg u-absolute-vcenter-xl u-custom-color-5 u-gallery-nav u-gallery-nav-prev u-hidden-lg u-hidden-xl u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-custom-color-4 u-gallery-nav-1" href="#" role="button">
                    <span aria-hidden="true">
                      <svg viewBox="0 0 477.175 477.175">
                        <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
		c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
                      </svg>
                    </span>
                    <span class="sr-only">
                      <svg viewBox="0 0 477.175 477.175">
                        <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
		c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
                      </svg>
                    </span>
                  </a>
                  <a class="u-absolute-vcenter-lg u-absolute-vcenter-md u-absolute-vcenter-sm u-absolute-vcenter-xl u-custom-color-5 u-gallery-nav u-gallery-nav-next u-hidden-lg u-hidden-xl u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-custom-color-4 u-gallery-nav-2" href="#" role="button">
                    <span aria-hidden="true">
                      <svg viewBox="0 0 477.175 477.175">
                        <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
		c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path>
                      </svg>
                    </span>
                    <span class="sr-only">
                      <svg viewBox="0 0 477.175 477.175">
                        <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
		c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path>
                      </svg>
                    </span>
                  </a>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>

</body>