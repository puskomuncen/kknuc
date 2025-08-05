<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$PendaftaranAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pendaftaran: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fpendaftaranadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpendaftaranadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["nim", [fields.nim.visible && fields.nim.required ? ew.Validators.required(fields.nim.caption) : null], fields.nim.isInvalid],
            ["id_kegiatan", [fields.id_kegiatan.visible && fields.id_kegiatan.required ? ew.Validators.required(fields.id_kegiatan.caption) : null], fields.id_kegiatan.isInvalid],
            ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
            ["tanggal_daftar", [fields.tanggal_daftar.visible && fields.tanggal_daftar.required ? ew.Validators.required(fields.tanggal_daftar.caption) : null, ew.Validators.datetime(fields.tanggal_daftar.clientFormatPattern)], fields.tanggal_daftar.isInvalid]
        ])

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)
                    // Your custom validation code in JAVASCRIPT here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "nim": <?= $Page->nim->toClientList($Page) ?>,
            "id_kegiatan": <?= $Page->id_kegiatan->toClientList($Page) ?>,
            "status": <?= $Page->status->toClientList($Page) ?>,
        })
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("AddCaption"); ?></h4>
	  <div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
	  </button>
	  </div>
	  <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<form name="fpendaftaranadd" id="fpendaftaranadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pendaftaran">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nim->Visible) { // nim ?>
    <div id="r_nim"<?= $Page->nim->rowAttributes() ?>>
        <label id="elh_pendaftaran_nim" for="x_nim" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nim->caption() ?><?= $Page->nim->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nim->cellAttributes() ?>>
<span id="el_pendaftaran_nim">
    <select
        id="x_nim"
        name="x_nim"
        class="form-select ew-select<?= $Page->nim->isInvalidClass() ?>"
        <?php if (!$Page->nim->IsNativeSelect) { ?>
        data-select2-id="fpendaftaranadd_x_nim"
        <?php } ?>
        data-table="pendaftaran"
        data-field="x_nim"
        data-value-separator="<?= $Page->nim->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->nim->getPlaceHolder()) ?>"
        <?= $Page->nim->editAttributes() ?>>
        <?= $Page->nim->selectOptionListHtml("x_nim") ?>
    </select>
    <?= $Page->nim->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->nim->getErrorMessage() ?></div>
<?= $Page->nim->Lookup->getParamTag($Page, "p_x_nim") ?>
<?php if (!$Page->nim->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fpendaftaranadd", function() {
    var options = { name: "x_nim", selectId: "fpendaftaranadd_x_nim" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fpendaftaranadd.lists.nim?.lookupOptions.length) {
        options.data = { id: "x_nim", form: "fpendaftaranadd" };
    } else {
        options.ajax = { id: "x_nim", form: "fpendaftaranadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.pendaftaran.fields.nim.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
    <div id="r_id_kegiatan"<?= $Page->id_kegiatan->rowAttributes() ?>>
        <label id="elh_pendaftaran_id_kegiatan" for="x_id_kegiatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_kegiatan->caption() ?><?= $Page->id_kegiatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="el_pendaftaran_id_kegiatan">
    <select
        id="x_id_kegiatan"
        name="x_id_kegiatan"
        class="form-select ew-select<?= $Page->id_kegiatan->isInvalidClass() ?>"
        <?php if (!$Page->id_kegiatan->IsNativeSelect) { ?>
        data-select2-id="fpendaftaranadd_x_id_kegiatan"
        <?php } ?>
        data-table="pendaftaran"
        data-field="x_id_kegiatan"
        data-value-separator="<?= $Page->id_kegiatan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_kegiatan->getPlaceHolder()) ?>"
        <?= $Page->id_kegiatan->editAttributes() ?>>
        <?= $Page->id_kegiatan->selectOptionListHtml("x_id_kegiatan") ?>
    </select>
    <?= $Page->id_kegiatan->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_kegiatan->getErrorMessage() ?></div>
<?= $Page->id_kegiatan->Lookup->getParamTag($Page, "p_x_id_kegiatan") ?>
<?php if (!$Page->id_kegiatan->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fpendaftaranadd", function() {
    var options = { name: "x_id_kegiatan", selectId: "fpendaftaranadd_x_id_kegiatan" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fpendaftaranadd.lists.id_kegiatan?.lookupOptions.length) {
        options.data = { id: "x_id_kegiatan", form: "fpendaftaranadd" };
    } else {
        options.ajax = { id: "x_id_kegiatan", form: "fpendaftaranadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.pendaftaran.fields.id_kegiatan.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status"<?= $Page->status->rowAttributes() ?>>
        <label id="elh_pendaftaran_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status->cellAttributes() ?>>
<span id="el_pendaftaran_status">
<template id="tp_x_status">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="pendaftaran" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<selection-list hidden
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="pendaftaran"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>></selection-list>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal_daftar->Visible) { // tanggal_daftar ?>
    <div id="r_tanggal_daftar"<?= $Page->tanggal_daftar->rowAttributes() ?>>
        <label id="elh_pendaftaran_tanggal_daftar" for="x_tanggal_daftar" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal_daftar->caption() ?><?= $Page->tanggal_daftar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal_daftar->cellAttributes() ?>>
<span id="el_pendaftaran_tanggal_daftar">
<input type="<?= $Page->tanggal_daftar->getInputTextType() ?>" name="x_tanggal_daftar" id="x_tanggal_daftar" data-table="pendaftaran" data-field="x_tanggal_daftar" value="<?= $Page->tanggal_daftar->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal_daftar->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal_daftar->formatPattern()) ?>"<?= $Page->tanggal_daftar->editAttributes() ?> aria-describedby="x_tanggal_daftar_help">
<?= $Page->tanggal_daftar->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal_daftar->getErrorMessage() ?></div>
<?php if (!$Page->tanggal_daftar->ReadOnly && !$Page->tanggal_daftar->Disabled && !isset($Page->tanggal_daftar->EditAttrs["readonly"]) && !isset($Page->tanggal_daftar->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fpendaftaranadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fpendaftaranadd",
        "x_tanggal_daftar",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fpendaftaranadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fpendaftaranadd", "x_tanggal_daftar", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpendaftaranadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpendaftaranadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
		</div>
     <!-- /.card-body -->
     </div>
  <!-- /.card -->
</div>
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fpendaftaranadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fpendaftaranadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("pendaftaran");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fpendaftaranadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
