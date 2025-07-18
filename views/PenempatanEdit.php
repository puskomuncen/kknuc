<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$PenempatanEdit = &$Page;
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
<form name="fpenempatanedit" id="fpenempatanedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { penempatan: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fpenempatanedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpenempatanedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_penempatan", [fields.id_penempatan.visible && fields.id_penempatan.required ? ew.Validators.required(fields.id_penempatan.caption) : null], fields.id_penempatan.isInvalid],
            ["id_pendaftaran", [fields.id_pendaftaran.visible && fields.id_pendaftaran.required ? ew.Validators.required(fields.id_pendaftaran.caption) : null, ew.Validators.integer], fields.id_pendaftaran.isInvalid],
            ["id_instansi", [fields.id_instansi.visible && fields.id_instansi.required ? ew.Validators.required(fields.id_instansi.caption) : null, ew.Validators.integer], fields.id_instansi.isInvalid],
            ["dosen_pembimbing", [fields.dosen_pembimbing.visible && fields.dosen_pembimbing.required ? ew.Validators.required(fields.dosen_pembimbing.caption) : null], fields.dosen_pembimbing.isInvalid],
            ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid]
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
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="penempatan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
    <div id="r_id_penempatan"<?= $Page->id_penempatan->rowAttributes() ?>>
        <label id="elh_penempatan_id_penempatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_penempatan->caption() ?><?= $Page->id_penempatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_penempatan->cellAttributes() ?>>
<span id="el_penempatan_id_penempatan">
<span<?= $Page->id_penempatan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_penempatan->getDisplayValue($Page->id_penempatan->getEditValue()))) ?>"></span>
<input type="hidden" data-table="penempatan" data-field="x_id_penempatan" data-hidden="1" name="x_id_penempatan" id="x_id_penempatan" value="<?= HtmlEncode($Page->id_penempatan->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_pendaftaran->Visible) { // id_pendaftaran ?>
    <div id="r_id_pendaftaran"<?= $Page->id_pendaftaran->rowAttributes() ?>>
        <label id="elh_penempatan_id_pendaftaran" for="x_id_pendaftaran" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pendaftaran->caption() ?><?= $Page->id_pendaftaran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_pendaftaran->cellAttributes() ?>>
<span id="el_penempatan_id_pendaftaran">
<input type="<?= $Page->id_pendaftaran->getInputTextType() ?>" name="x_id_pendaftaran" id="x_id_pendaftaran" data-table="penempatan" data-field="x_id_pendaftaran" value="<?= $Page->id_pendaftaran->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->id_pendaftaran->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->id_pendaftaran->formatPattern()) ?>"<?= $Page->id_pendaftaran->editAttributes() ?> aria-describedby="x_id_pendaftaran_help">
<?= $Page->id_pendaftaran->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_pendaftaran->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fpenempatanedit', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fpenempatanedit", "x_id_pendaftaran", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_instansi->Visible) { // id_instansi ?>
    <div id="r_id_instansi"<?= $Page->id_instansi->rowAttributes() ?>>
        <label id="elh_penempatan_id_instansi" for="x_id_instansi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_instansi->caption() ?><?= $Page->id_instansi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_instansi->cellAttributes() ?>>
<span id="el_penempatan_id_instansi">
<input type="<?= $Page->id_instansi->getInputTextType() ?>" name="x_id_instansi" id="x_id_instansi" data-table="penempatan" data-field="x_id_instansi" value="<?= $Page->id_instansi->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->id_instansi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->id_instansi->formatPattern()) ?>"<?= $Page->id_instansi->editAttributes() ?> aria-describedby="x_id_instansi_help">
<?= $Page->id_instansi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_instansi->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fpenempatanedit', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fpenempatanedit", "x_id_instansi", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dosen_pembimbing->Visible) { // dosen_pembimbing ?>
    <div id="r_dosen_pembimbing"<?= $Page->dosen_pembimbing->rowAttributes() ?>>
        <label id="elh_penempatan_dosen_pembimbing" for="x_dosen_pembimbing" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dosen_pembimbing->caption() ?><?= $Page->dosen_pembimbing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->dosen_pembimbing->cellAttributes() ?>>
<span id="el_penempatan_dosen_pembimbing">
<input type="<?= $Page->dosen_pembimbing->getInputTextType() ?>" name="x_dosen_pembimbing" id="x_dosen_pembimbing" data-table="penempatan" data-field="x_dosen_pembimbing" value="<?= $Page->dosen_pembimbing->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->dosen_pembimbing->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->dosen_pembimbing->formatPattern()) ?>"<?= $Page->dosen_pembimbing->editAttributes() ?> aria-describedby="x_dosen_pembimbing_help">
<?= $Page->dosen_pembimbing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dosen_pembimbing->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status"<?= $Page->status->rowAttributes() ?>>
        <label id="elh_penempatan_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status->cellAttributes() ?>>
<span id="el_penempatan_status">
<template id="tp_x_status">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="penempatan" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="penempatan"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>></selection-list>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpenempatanedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpenempatanedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fpenempatanedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fpenempatanedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("penempatan");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fpenempatanedit:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
