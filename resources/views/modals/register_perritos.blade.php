<div class="modal fade" id="register_perrito_modal" tabindex="-1" role="dialog"
    aria-labelledby="register_perritos_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="register_perritos_label">Registrar Perrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="register_perrito_form">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="name-perrito" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="name-perrito" name="name-perrito">
                            </div>
                            <div class="col">
                                <label for="raza-perrito" class="col-form-label">Raza:</label>
                                <select required name="raza-perrito" id="raza-perrito" class="selectpicker form-control"
                                    data-live-search="true" title="Seleccione una raza">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="color-perrito" class="col-form-label">Color:</label>
                                <input required type="color" class="form-control" id="color-perrito" name="color-perrito">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-primary" value="Registrar Perrito" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
