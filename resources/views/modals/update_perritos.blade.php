<div class="modal fade" id="update_perrito_modal" tabindex="-1" role="dialog"
    aria-labelledby="update_perritos_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_perritos_label">Modificar Perrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_perrito_form">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="new-name-perrito" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="new-name-perrito" name="name">
                            </div>
                            <div class="col">
                                <label for="new-raza-perrito" class="col-form-label">Raza:</label>
                                <select required name="raza_id" id="new-raza-perrito" class="selectpicker form-control"
                                    data-live-search="true" title="Seleccione una raza">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="color-perrito" class="col-form-label">Color:</label>
                                <input required type="color" class="form-control" id="new-color-perrito" name="color">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete_perrito_btn" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-success" value="Modificar Perrito" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
