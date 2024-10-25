<!-- Modal -->
<div class="modal fade" id="video" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header estilomodal">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Análisis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <fieldset>
                        <legend>
                            <div class="form-header">
                                <h4 class="form-title" style="text-align: left; border-radius: 10px; background-color: rgb(97, 162, 184); color: aliceblue; font-size: 15px; text-align: center;">Capturar Fotos</h4>
                            </div>

                            <!-- Captura de fotos -->
            
                            <video id="videoCapture" class="unique-video" style="display:none;" autoplay muted></video>
                            <button id="startButton" class="unique-button">Iniciar Captura</button>
                            <button id="stopButton" class="unique-button" disabled>Detener Captura</button>

                        </legend>
                    </fieldset>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>


