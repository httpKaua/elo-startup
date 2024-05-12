<div id="pai" class="experience-container c0" >
  <hr style="margin-top: 5%;">
  <div class="row">
      <div class="col col-sm-12" style="text-align: right;">

        <!-- botão remover mais informação -->
        <button id="filho" onclick="removeExperience(this)" class="btn btn-danger rounded-circle" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" fill="currentColor" class="bi bi-trash3-fill"
            viewBox="0 0 16 16">
            <path
              d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
          </svg>
        </button>

      </div>
  </div>

  <div class="row mb-3" style="margin-top: 3%;">

    <div class="col">
      <!-- instuicao de ensino -->
      <label for="nome" class="form-label text-start">Instituição de ensino</label>
      <input type="text" class="meusInputs form-control shadow-none rounded-pill capture"
        placeholder="Digite o nome da sua instituição de ensino" name="instituicao_ensino" id="instituicao_ensino" required>
    </div>

  </div>
  <div class="row mb-3">
    <div class="col">
      <!-- dt_inicio inicio -->
      <label for="nome" class="form-label text-start">Data de início</label>
      <input type="text" class="meusInputs dt form-control shadow-none rounded-pill capture" placeholder="00/00/0000" name="dt_inicio"
        id="dt_inicio" required>
    </div>
    <div class="col">
      <!-- dt_inicio inicio -->
      <label for="nome" class="form-label text-start">Data de conclusão</label>
      <input type="text" class="meusInputs dt form-control shadow-none rounded-pill capture" placeholder="00/00/0000" name="dt_conclusao"
        id="dt_conclusao" required>
    </div>
  </div>
  <!-- experiência -->
  <div class="row">
    <div class="col">
      <label for="exampleFormControlTextarea1" class="inputTextarea form-label">Experiencia</label>
      <textarea class="meusInputs inputTextarea form-control resize-none capture" placeholder="..." name="experiencia" id="experiencia" rows="5"
        style="resize: none;" maxlength="500" required></textarea>
    </div>
  </div>
</div>