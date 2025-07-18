<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$KegiatanAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { kegiatan: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fkegiatanadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fkegiatanadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["nama_kegiatan", [fields.nama_kegiatan.visible && fields.nama_kegiatan.required ? ew.Validators.required(fields.nama_kegiatan.caption) : null], fields.nama_kegiatan.isInvalid],
            ["tahun", [fields.tahun.visible && fields.tahun.required ? ew.Validators.required(fields.tahun.caption) : null, ew.Validators.integer], fields.tahun.isInvalid],
            ["semester", [fields.semester.visible && fields.semester.required ? ew.Validators.required(fields.semester.caption) : null], fields.semester.isInvalid],
            ["tanggal_mulai", [fields.tanggal_mulai.visible && fields.tanggal_mulai.required ? ew.Validators.required(fields.tanggal_mulai.caption) : null, ew.Validators.datetime(fields.tanggal_mulai.clientFormatPattern)], fields.tanggal_mulai.isInvalid],
            ["tanggal_selesai", [fields.tanggal_selesai.visible && fields.tanggal_selesai.required ? ew.Validators.required(fields.tanggal_selesai.caption) : null, ew.Validators.datetime(fields.tanggal_selesai.clientFormatPattern)], fields.tanggal_selesai.isInvalid]
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
            "nama_kegiatan": <?= $Page->nama_kegiatan->toClientList($Page) ?>,
            "semester": <?= $Page->semester->toClientList($Page) ?>,
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
<form name="fkegiatanadd" id="fkegiatanadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="kegiatan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
    <div id="r_nama_kegiatan"<?= $Page->nama_kegiatan->rowAttributes() ?>>
        <label id="elh_kegiatan_nama_kegiatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama_kegiatan->caption() ?><?= $Page->nama_kegiatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="el_kegiatan_nama_kegiatan">
<template id="tp_x_nama_kegiatan">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="kegiatan" data-field="x_nama_kegiatan" name="x_nama_kegiatan" id="x_nama_kegiatan"<?= $Page->nama_kegiatan->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_nama_kegiatan" class="ew-item-list"></div>
<selection-list hidden
    id="x_nama_kegiatan"
    name="x_nama_kegiatan"
    value="<?= HtmlEncode($Page->nama_kegiatan->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_nama_kegiatan"
    data-target="dsl_x_nama_kegiatan"
    data-repeatcolumn="5"
    class="form-control<?= $Page->nama_kegiatan->isInvalidClass() ?>"
    data-table="kegiatan"
    data-field="x_nama_kegiatan"
    data-value-separator="<?= $Page->nama_kegiatan->displayValueSeparatorAttribute() ?>"
    <?= $Page->nama_kegiatan->editAttributes() ?>></selection-list>
<?= $Page->nama_kegiatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama_kegiatan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
    <div id="r_tahun"<?= $Page->tahun->rowAttributes() ?>>
        <label id="elh_kegiatan_tahun" for="x_tahun" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tahun->caption() ?><?= $Page->tahun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tahun->cellAttributes() ?>>
<span id="el_kegiatan_tahun">
<input type="<?= $Page->tahun->getInputTextType() ?>" name="x_tahun" id="x_tahun" data-table="kegiatan" data-field="x_tahun" value="<?= $Page->tahun->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->tahun->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tahun->formatPattern()) ?>"<?= $Page->tahun->editAttributes() ?> aria-describedby="x_tahun_help">
<?= $Page->tahun->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tahun->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
    <div id="r_semester"<?= $Page->semester->rowAttributes() ?>>
        <label id="elh_kegiatan_semester" class="<?= $Page->LeftColumnClass ?>"><?= $Page->semester->caption() ?><?= $Page->semester->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->semester->cellAttributes() ?>>
<span id="el_kegiatan_semester">
<template id="tp_x_semester">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="kegiatan" data-field="x_semester" name="x_semester" id="x_semester"<?= $Page->semester->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_semester" class="ew-item-list"></div>
<selection-list hidden
    id="x_semester"
    name="x_semester"
    value="<?= HtmlEncode($Page->semester->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_semester"
    data-target="dsl_x_semester"
    data-repeatcolumn="5"
    class="form-control<?= $Page->semester->isInvalidClass() ?>"
    data-table="kegiatan"
    data-field="x_semester"
    data-value-separator="<?= $Page->semester->displayValueSeparatorAttribute() ?>"
    <?= $Page->semester->editAttributes() ?>></selection-list>
<?= $Page->semester->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->semester->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
    <div id="r_tanggal_mulai"<?= $Page->tanggal_mulai->rowAttributes() ?>>
        <label id="elh_kegiatan_tanggal_mulai" for="x_tanggal_mulai" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal_mulai->caption() ?><?= $Page->tanggal_mulai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="el_kegiatan_tanggal_mulai">
<input type="<?= $Page->tanggal_mulai->getInputTextType() ?>" name="x_tanggal_mulai" id="x_tanggal_mulai" data-table="kegiatan" data-field="x_tanggal_mulai" value="<?= $Page->tanggal_mulai->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal_mulai->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal_mulai->formatPattern()) ?>"<?= $Page->tanggal_mulai->editAttributes() ?> aria-describedby="x_tanggal_mulai_help">
<?= $Page->tanggal_mulai->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal_mulai->getErrorMessage() ?></div>
<?php if (!$Page->tanggal_mulai->ReadOnly && !$Page->tanggal_mulai->Disabled && !isset($Page->tanggal_mulai->EditAttrs["readonly"]) && !isset($Page->tanggal_mulai->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fkegiatanadd", "datetimepicker"], function () {
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
        "fkegiatanadd",
        "x_tanggal_mulai",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fkegiatanadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fkegiatanadd", "x_tanggal_mulai", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
    <div id="r_tanggal_selesai"<?= $Page->tanggal_selesai->rowAttributes() ?>>
        <label id="elh_kegiatan_tanggal_selesai" for="x_tanggal_selesai" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal_selesai->caption() ?><?= $Page->tanggal_selesai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="el_kegiatan_tanggal_selesai">
<input type="<?= $Page->tanggal_selesai->getInputTextType() ?>" name="x_tanggal_selesai" id="x_tanggal_selesai" data-table="kegiatan" data-field="x_tanggal_selesai" value="<?= $Page->tanggal_selesai->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal_selesai->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal_selesai->formatPattern()) ?>"<?= $Page->tanggal_selesai->editAttributes() ?> aria-describedby="x_tanggal_selesai_help">
<?= $Page->tanggal_selesai->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal_selesai->getErrorMessage() ?></div>
<?php if (!$Page->tanggal_selesai->ReadOnly && !$Page->tanggal_selesai->Disabled && !isset($Page->tanggal_selesai->EditAttrs["readonly"]) && !isset($Page->tanggal_selesai->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fkegiatanadd", "datetimepicker"], function () {
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
        "fkegiatanadd",
        "x_tanggal_selesai",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fkegiatanadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fkegiatanadd", "x_tanggal_selesai", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fkegiatanadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fkegiatanadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatanadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fkegiatanadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("kegiatan");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fkegiatanadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
