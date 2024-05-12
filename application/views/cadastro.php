<body data-path-to-root="./" class="u-body u-xl-mode" data-lang="pt">
  <section class="u-clearfix u-section-1" id="sec-68f5">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-container-align-center-lg u-container-align-center-md u-container-align-center-xl u-container-style u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">

          <span class="text-center mt-1 mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
            </svg>
          </span>
          <h1 class="u-align-center u-custom-font u-text u-text-default u-text-1">Crie sua conta conosco, é gratuito<span style="font-size: 1.875rem;"></span>
          </h1>
          <p class="u-align-center mt-0 text-muted">Com a EloStartup as suas chances decolam, não fique de fora!</p>
          <div class="u-align-center u-form u-form-1 d-form-cadastro">
            <!-- Formulário -->
            <form id="form_cadastro">
              <div class="container form-cadastro">
                <div class="mt-3 mb-3 ">

                  <div class="row mt-3">
                    <div class="col">
                      <label for="nome" class="form-label">Nome</label>
                      <input type="text" class="form-control shadow-none rounded-pill required" placeholder="Primeiro Nome" name="nome" min="1" max="30" id="nome">
                      <!-- <span class="span-required">O campo nome deve ter no mínimo 3 caracteres</span> -->
                    </div>

                    <div class="col">
                      <label for="sobre" class="form-label">Sobrenome</label>
                      <input type="text" class="form-control shadow-none rounded-pill required" placeholder="Sobrenome" nome="sobrenome" id="sobrenome">
                      <!-- <span class="span-required">Necessário ter no mínimo 3 caracteres</span> -->
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col">
                      <label for="formGroupExampleInput" class="form-label">E-mail</label>
                      <input type="email" class="form-control shadow-none rounded-pill required" placeholder="example@gmail.com" id="email" name="email">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col">
                      <label for="formGroupExampleInput" class="form-label">Senha</label>
                      <input type="password" class="form-control shadow-none rounded-pill required" placeholder="Digite a sua senha" id="senha" name="senha">
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col">
                      <div class=" form-check">
                        <input type="checkbox" class="form-check-input" id="termos" checked>
                        <label class="form-check-label termos" for="exampleCheck1">Eu aceito os <a href="#" class="text-decoration-none termos">Termos de Serviço</a></label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- Botão Submit -->
              <div class="d-grid gap-2 col-12 mx-auto" style="padding-left: 27%;">
                <button class="btn btn-primary rounded-pill" id="btn_cadastrar" type="button" style="background-color:#f1c50e;border:none;color:black;font-weight:bold; width: 60%;">Cadastrar</button>
              </div>

              <div class="row">
                <label id="criar_conta" style="cursor:pointer" class="form-check-label text-primary text-center mt-2" for="reverseCheck1">
                  <a href="<?php echo base_url("/login") ?>" class="text-decoration-none">Já tem uma conta?</a>
                </label>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal de Avisos -->
  <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg>
            <strong>
              Atenção
            </strong>
          </h5>
          <button type="button" class="btn-close" id="close"></button>
        </div>
        <div class="modal-body">

          <p id="texto-modal" style="font-size: 16px;">
          </p>

        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-outline-success rounded-pill">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <strong>Confirmar</strong>

          </button>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="<?php echo base_url('assets/js/cadastro.js') ?>"></script>
<script src="<?php echo base_url('assets/js/mask.js') ?>"></script>