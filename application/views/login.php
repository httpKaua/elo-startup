
<body data-path-to-root="./" class="u-body u-stick-footer u-xl-mode" data-lang="pt">
  <section class="u-clearfix u-container-align-center u-section-1" id="sec-407e">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="u-container-align-center-lg u-container-align-center-md u-container-align-center-sm u-container-align-center-xl u-container-style u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
          <span class="text-center mt-1 mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
            </svg>
          </span>
          <h1 class="u-align-center u-custom-font u-text u-text-default u-text-1">Bem-vindo(a) de volta!</h1>
          <span class="text-center text-muted">Você pode acessar sua conta agora mesmo, ou quem sabe abrir uma</span>
          <div class="u-align-center u-form u-login-control u-form-1">

            <div class="container login-form">
              <form>
                <!-- email -->
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="email" class="form-label" style="font-weight: bold;">Usuário</label>
                      <input type="email" class="form-control shadow-none" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                  </div>
                </div>
                <!-- senha -->
                <div class="row">
                  <div class="col">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" style="font-weight: bold;">Senha</label>
                    <input type="password" class="form-control shadow-none" id="senha" name="senha" placeholder="Digite sua senha" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <!-- lembrar de mim-->
                  <div class="col">
                    <div class=" form-check">
                      <input type="checkbox" class="form-check-input shadow-none" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Lembrar de mim</label>
                    </div>

                  </div>

                  <!-- recuperar senha -->
                  <div class="col">
                    <div class="form-check form-check-reverse">
                      <label id="esqueceu_senha" style="cursor:pointer" class="form-check-label text-primary" for="reverseCheck1">
                        <a href="<?php echo base_url("/recuperar-senha") ?>" class="text-decoration-none"></a>Recuperar senha</a>
                      </label>
                    </div>

                  </div>
                </div>
                <!-- logar -->
                <div class="d-grid gap-2 col-12 mx-auto" style="padding-left: 32%;">
                  <button id="btn_logar" class="btn btn-primary rounded-pill" type="button" style="background-color:#f1c50e;border:none;color:black;font-weight:bold; width: 50%;">Logar</button>
                </div>

                <div class="row">
                  <label id="criar_conta" style="cursor:pointer" class="form-check-label text-primary text-center mt-2" for="reverseCheck1">
                    <a href="<?php echo base_url("/cadastro") ?>" class="text-decoration-none">Criar Conta</a>
                  </label>
                </div>


              </form>
            </div>
          </div>
        </div>

      </div>


    </div>
  </section>



</body>

<script src="<?php echo base_url('assets/js/login.js') ?>"></script>