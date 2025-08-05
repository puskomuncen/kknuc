<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$LogbookAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { logbook: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var flogbookadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("flogbookadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["id_penempatan", [fields.id_penempatan.visible && fields.id_penempatan.required ? ew.Validators.required(fields.id_penempatan.caption) : null, ew.Validators.integer], fields.id_penempatan.isInvalid],
            ["tanggal", [fields.tanggal.visible && fields.tanggal.required ? ew.Validators.required(fields.tanggal.caption) : null, ew.Validators.datetime(fields.tanggal.clientFormatPattern)], fields.tanggal.isInvalid],
            ["kegiatan", [fields.kegiatan.visible && fields.kegiatan.required ? ew.Validators.required(fields.kegiatan.caption) : null], fields.kegiatan.isInvalid],
            ["validasi_dosen", [fields.validasi_dosen.visible && fields.validasi_dosen.required ? ew.Validators.required(fields.validasi_dosen.caption) : null], fields.validasi_dosen.isInvalid]
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
            "validasi_dosen": <?= $Page->validasi_dosen->toClientList($Page) ?>,
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
<form name="flogbookadd" id="flogbookadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="logbook">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
    <div id="r_id_penempatan"<?= $Page->id_penempatan->rowAttributes() ?>>
        <label id="elh_logbook_id_penempatan" for="x_id_penempatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_penempatan->caption() ?><?= $Page->id_penempatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_penempatan->cellAttributes() ?>>
<span id="el_logbook_id_penempatan">
<input type="<?= $Page->id_penempatan->getInputTextType() ?>" name="x_id_penempatan" id="x_id_penempatan" data-table="logbook" data-field="x_id_penempatan" value="<?= $Page->id_penempatan->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->id_penempatan->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->id_penempatan->formatPattern()) ?>"<?= $Page->id_penempatan->editAttributes() ?> aria-describedby="x_id_penempatan_help">
<?= $Page->id_penempatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_penempatan->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['flogbookadd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("flogbookadd", "x_id_penempatan", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <div id="r_tanggal"<?= $Page->tanggal->rowAttributes() ?>>
        <label id="elh_logbook_tanggal" for="x_tanggal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal->caption() ?><?= $Page->tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal->cellAttributes() ?>>
<span id="el_logbook_tanggal">
<input type="<?= $Page->tanggal->getInputTextType() ?>" name="x_tanggal" id="x_tanggal" data-table="logbook" data-field="x_tanggal" value="<?= $Page->tanggal->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal->formatPattern()) ?>"<?= $Page->tanggal->editAttributes() ?> aria-describedby="x_tanggal_help">
<?= $Page->tanggal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal->getErrorMessage() ?></div>
<?php if (!$Page->tanggal->ReadOnly && !$Page->tanggal->Disabled && !isset($Page->tanggal->EditAttrs["readonly"]) && !isset($Page->tanggal->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["flogbookadd", "datetimepicker"], function () {
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
        "flogbookadd",
        "x_tanggal",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['flogbookadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("flogbookadd", "x_tanggal", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->kegiatan->Visible) { // kegiatan ?>
    <div id="r_kegiatan"<?= $Page->kegiatan->rowAttributes() ?>>
        <label id="elh_logbook_kegiatan" for="x_kegiatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kegiatan->caption() ?><?= $Page->kegiatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->kegiatan->cellAttributes() ?>>
<span id="el_logbook_kegiatan">
<input type="<?= $Page->kegiatan->getInputTextType() ?>" name="x_kegiatan" id="x_kegiatan" data-table="logbook" data-field="x_kegiatan" value="<?= $Page->kegiatan->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->kegiatan->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->kegiatan->formatPattern()) ?>"<?= $Page->kegiatan->editAttributes() ?> aria-describedby="x_kegiatan_help">
<?= $Page->kegiatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->kegiatan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->validasi_dosen->Visible) { // validasi_dosen ?>
    <div id="r_validasi_dosen"<?= $Page->validasi_dosen->rowAttributes() ?>>
        <label id="elh_logbook_validasi_dosen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->validasi_dosen->caption() ?><?= $Page->validasi_dosen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->validasi_dosen->cellAttributes() ?>>
<span id="el_logbook_validasi_dosen">
<div class="form-check form-switch d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->validasi_dosen->isInvalidClass() ?>" data-table="logbook" data-field="x_validasi_dosen" data-boolean name="x_validasi_dosen" id="x_validasi_dosen" value="1"<?= ConvertToBool($Page->validasi_dosen->CurrentValue) ? " checked" : "" ?><?= $Page->validasi_dosen->editAttributes() ?> aria-describedby="x_validasi_dosen_help">
    <div class="invalid-feedback"><?= $Page->validasi_dosen->getErrorMessage() ?></div>
</div>
<?= $Page->validasi_dosen->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="flogbookadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="flogbookadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(flogbookadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#flogbookadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("logbook");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#flogbookadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
