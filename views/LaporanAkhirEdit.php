<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$LaporanAkhirEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("EditCaption"); ?></h4>
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
<form name="flaporan_akhiredit" id="flaporan_akhiredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { laporan_akhir: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var flaporan_akhiredit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("flaporan_akhiredit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_laporan", [fields.id_laporan.visible && fields.id_laporan.required ? ew.Validators.required(fields.id_laporan.caption) : null], fields.id_laporan.isInvalid],
            ["id_penempatan", [fields.id_penempatan.visible && fields.id_penempatan.required ? ew.Validators.required(fields.id_penempatan.caption) : null, ew.Validators.integer], fields.id_penempatan.isInvalid],
            ["file_laporan", [fields.file_laporan.visible && fields.file_laporan.required ? ew.Validators.fileRequired(fields.file_laporan.caption) : null], fields.file_laporan.isInvalid],
            ["nilai_dosen", [fields.nilai_dosen.visible && fields.nilai_dosen.required ? ew.Validators.required(fields.nilai_dosen.caption) : null, ew.Validators.integer], fields.nilai_dosen.isInvalid],
            ["nilai_instansi", [fields.nilai_instansi.visible && fields.nilai_instansi.required ? ew.Validators.required(fields.nilai_instansi.caption) : null, ew.Validators.integer], fields.nilai_instansi.isInvalid]
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
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="laporan_akhir">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_laporan->Visible) { // id_laporan ?>
    <div id="r_id_laporan"<?= $Page->id_laporan->rowAttributes() ?>>
        <label id="elh_laporan_akhir_id_laporan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_laporan->caption() ?><?= $Page->id_laporan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_laporan->cellAttributes() ?>>
<span id="el_laporan_akhir_id_laporan">
<span<?= $Page->id_laporan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_laporan->getDisplayValue($Page->id_laporan->getEditValue()))) ?>"></span>
<input type="hidden" data-table="laporan_akhir" data-field="x_id_laporan" data-hidden="1" name="x_id_laporan" id="x_id_laporan" value="<?= HtmlEncode($Page->id_laporan->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
    <div id="r_id_penempatan"<?= $Page->id_penempatan->rowAttributes() ?>>
        <label id="elh_laporan_akhir_id_penempatan" for="x_id_penempatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_penempatan->caption() ?><?= $Page->id_penempatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_penempatan->cellAttributes() ?>>
<span id="el_laporan_akhir_id_penempatan">
<input type="<?= $Page->id_penempatan->getInputTextType() ?>" name="x_id_penempatan" id="x_id_penempatan" data-table="laporan_akhir" data-field="x_id_penempatan" value="<?= $Page->id_penempatan->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->id_penempatan->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->id_penempatan->formatPattern()) ?>"<?= $Page->id_penempatan->editAttributes() ?> aria-describedby="x_id_penempatan_help">
<?= $Page->id_penempatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_penempatan->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['flaporan_akhiredit', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("flaporan_akhiredit", "x_id_penempatan", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->file_laporan->Visible) { // file_laporan ?>
    <div id="r_file_laporan"<?= $Page->file_laporan->rowAttributes() ?>>
        <label id="elh_laporan_akhir_file_laporan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->file_laporan->caption() ?><?= $Page->file_laporan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->file_laporan->cellAttributes() ?>>
<span id="el_laporan_akhir_file_laporan">
<div id="fd_x_file_laporan" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_file_laporan"
        name="x_file_laporan"
        class="form-control ew-file-input"
        title="<?= $Page->file_laporan->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="laporan_akhir"
        data-field="x_file_laporan"
        data-size="255"
        data-accept-file-types="<?= $Page->file_laporan->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->file_laporan->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->file_laporan->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_file_laporan_help"
        <?= ($Page->file_laporan->ReadOnly || $Page->file_laporan->Disabled) ? " disabled" : "" ?>
        <?= $Page->file_laporan->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->file_laporan->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->file_laporan->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_file_laporan" id= "fn_x_file_laporan" value="<?= $Page->file_laporan->Upload->FileName ?>">
<input type="hidden" name="fa_x_file_laporan" id= "fa_x_file_laporan" value="<?= (Post("fa_x_file_laporan") == "0") ? "0" : "1" ?>">
<table id="ft_x_file_laporan" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nilai_dosen->Visible) { // nilai_dosen ?>
    <div id="r_nilai_dosen"<?= $Page->nilai_dosen->rowAttributes() ?>>
        <label id="elh_laporan_akhir_nilai_dosen" for="x_nilai_dosen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nilai_dosen->caption() ?><?= $Page->nilai_dosen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nilai_dosen->cellAttributes() ?>>
<span id="el_laporan_akhir_nilai_dosen">
<input type="<?= $Page->nilai_dosen->getInputTextType() ?>" name="x_nilai_dosen" id="x_nilai_dosen" data-table="laporan_akhir" data-field="x_nilai_dosen" value="<?= $Page->nilai_dosen->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->nilai_dosen->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nilai_dosen->formatPattern()) ?>"<?= $Page->nilai_dosen->editAttributes() ?> aria-describedby="x_nilai_dosen_help">
<?= $Page->nilai_dosen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nilai_dosen->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['flaporan_akhiredit', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("flaporan_akhiredit", "x_nilai_dosen", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nilai_instansi->Visible) { // nilai_instansi ?>
    <div id="r_nilai_instansi"<?= $Page->nilai_instansi->rowAttributes() ?>>
        <label id="elh_laporan_akhir_nilai_instansi" for="x_nilai_instansi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nilai_instansi->caption() ?><?= $Page->nilai_instansi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nilai_instansi->cellAttributes() ?>>
<span id="el_laporan_akhir_nilai_instansi">
<input type="<?= $Page->nilai_instansi->getInputTextType() ?>" name="x_nilai_instansi" id="x_nilai_instansi" data-table="laporan_akhir" data-field="x_nilai_instansi" value="<?= $Page->nilai_instansi->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->nilai_instansi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nilai_instansi->formatPattern()) ?>"<?= $Page->nilai_instansi->editAttributes() ?> aria-describedby="x_nilai_instansi_help">
<?= $Page->nilai_instansi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nilai_instansi->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['flaporan_akhiredit', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("flaporan_akhiredit", "x_nilai_instansi", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="flaporan_akhiredit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="flaporan_akhiredit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(flaporan_akhiredit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#flaporan_akhiredit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("laporan_akhir");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#flaporan_akhiredit:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
