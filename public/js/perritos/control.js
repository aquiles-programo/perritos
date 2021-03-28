$(() => {
    $("#perritos_table").DataTable();
    options_init(["#raza-perrito", "#new-raza-perrito"], "raza");
    table_init({ "#perritos_table": "perrito" });
    perritos = [];
});

$("#register_perrito_form").on("submit", async (e) => {
    e.preventDefault();
    await $.ajax({
        type: "POST",
        url: "api/perrito",
        data: $("#register_perrito_form").serialize(),
        success: (res) => {
            alertify.success(`${res.name} fue registrado correctamente`);
            append_to_perritos_table("#perritos_table", [res], false);
        },
        error: () => alertify.error("Ha ocurrido un error"),
    });
    $(".modal").modal("hide");
});

$("#update_perrito_form").on("submit", async (e) => {
    e.preventDefault();
    await $.ajax({
        type: "PATCH",
        url: `api/perrito/${$("#id").val()}`,
        data: $("#update_perrito_form").serialize(),
        success: (res) => {
            alertify.success(`${res.name} fue actualizado correctamente`);
            update_perritos_table(res, false);
        },
        error: () => alertify.error("Ha ocurrido un error"),
    });
});

$("#update_perrito_modal").on("show.bs.modal", (e) => {
    let perrito = perritos.find((p) => p.id == $(e.relatedTarget).data("id"));
    fill_update_form(
        {
            "#new-name-perrito": perrito.name,
            "#new-color-perrito": perrito.color,
            "#new-raza-perrito": perrito.raza_id,
            "#id": perrito.id,
        },
        "#new-raza-perrito"
    );
});

$("#delete_perrito_btn").on("click", () => {
    alertify.confirm(
        "Confirmar",
        "Esta seguro que desea eliminar el perrito?",
        async () => {
            await $.ajax({
                type: "DELETE",
                url: `api/perrito/${$("#id").val()}`,
                success: (res) => {
                    alertify.success("Perrito eliminado correctamente");
                    update_perritos_table($("#id").val(), true);
                },
                error: () => alertify.error("Ha ocurrido un error"),
            });
        },
        () => false
    );
});

const update_perritos_table = (newValue, deleting) => {
    const i = perritos.findIndex((perrito) => perrito.id == newValue.id);
    deleting ? perritos.splice(i, 1) : perritos.splice(i, 1, newValue)
    $("#perritos_table").DataTable().clear().draw();
    append_to_perritos_table("#perritos_table", perritos, true);
};

const fill_update_form = (values, select) => {
    for (const id in values) $(id).val(values[id]);
    if (select) $(select).selectpicker("refresh");
};

const table_init = async (tables) => {
    for (const table in tables) {
        let values = await $.get(`api/${tables[table]}`);
        append_to_perritos_table(table, values, false);
    }
};

const append_to_perritos_table = (table, values, update) => {
    if (!update) perritos = perritos.concat(values);

    values.forEach((value) => {
        $(table)
            .DataTable()
            .row.add([
                value.name,
                value.raza.name,
                `<button class="btn btn-outline-success btn-lg" style="background-color: ${value.color}"></button>`,
                `<button class="btn btn-outline-info ml-3" data-toggle="modal"
                    data-target="#update_perrito_modal" data-id=${value.id}>Modificar
                 </button>`,
            ])
            .draw(false);
    });
};

const options_init = async (options, resource) => {
    let values = await $.get(`api/${resource}`);
    options.forEach((opt) => append_options(opt, values));
};

const append_options = (id, values) => {
    values.forEach((val) => {
        $(id).append(`<option value="${val.id}">${val.name}</option>`);
    });
    $(id).selectpicker("refresh");
};
