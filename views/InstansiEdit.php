<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$InstansiEdit = &$Page;
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
<form name="finstansiedit" id="finstansiedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { instansi: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var finstansiedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("finstansiedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_instansi", [fields.id_instansi.visible && fields.id_instansi.required ? ew.Validators.required(fields.id_instansi.caption) : null], fields.id_instansi.isInvalid],
            ["nama_instansi", [fields.nama_instansi.visible && fields.nama_instansi.required ? ew.Validators.required(fields.nama_instansi.caption) : null], fields.nama_instansi.isInvalid],
            ["alamat", [fields.alamat.visible && fields.alamat.required ? ew.Validators.required(fields.alamat.caption) : null], fields.alamat.isInvalid],
            ["kontak_person", [fields.kontak_person.visible && fields.kontak_person.required ? ew.Validators.required(fields.kontak_person.caption) : null], fields.kontak_person.isInvalid],
            ["no_hp", [fields.no_hp.visible && fields.no_hp.required ? ew.Validators.required(fields.no_hp.caption) : null], fields.no_hp.isInvalid],
            ["email", [fields.email.visible && fields.email.required ? ew.Validators.required(fields.email.caption) : null], fields.email.isInvalid]
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
<input type="hidden" name="t" value="instansi">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_instansi->Visible) { // id_instansi ?>
    <div id="r_id_instansi"<?= $Page->id_instansi->rowAttributes() ?>>
        <label id="elh_instansi_id_instansi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_instansi->caption() ?><?= $Page->id_instansi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_instansi->cellAttributes() ?>>
<span id="el_instansi_id_instansi">
<span<?= $Page->id_instansi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_instansi->getDisplayValue($Page->id_instansi->getEditValue()))) ?>"></span>
<input type="hidden" data-table="instansi" data-field="x_id_instansi" data-hidden="1" name="x_id_instansi" id="x_id_instansi" value="<?= HtmlEncode($Page->id_instansi->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama_instansi->Visible) { // nama_instansi ?>
    <div id="r_nama_instansi"<?= $Page->nama_instansi->rowAttributes() ?>>
        <label id="elh_instansi_nama_instansi" for="x_nama_instansi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama_instansi->caption() ?><?= $Page->nama_instansi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nama_instansi->cellAttributes() ?>>
<span id="el_instansi_nama_instansi">
<input type="<?= $Page->nama_instansi->getInputTextType() ?>" name="x_nama_instansi" id="x_nama_instansi" data-table="instansi" data-field="x_nama_instansi" value="<?= $Page->nama_instansi->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama_instansi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nama_instansi->formatPattern()) ?>"<?= $Page->nama_instansi->editAttributes() ?> aria-describedby="x_nama_instansi_help">
<?= $Page->nama_instansi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama_instansi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
    <div id="r_alamat"<?= $Page->alamat->rowAttributes() ?>>
        <label id="elh_instansi_alamat" for="x_alamat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alamat->caption() ?><?= $Page->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->alamat->cellAttributes() ?>>
<span id="el_instansi_alamat">
<input type="<?= $Page->alamat->getInputTextType() ?>" name="x_alamat" id="x_alamat" data-table="instansi" data-field="x_alamat" value="<?= $Page->alamat->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->alamat->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->alamat->formatPattern()) ?>"<?= $Page->alamat->editAttributes() ?> aria-describedby="x_alamat_help">
<?= $Page->alamat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alamat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->kontak_person->Visible) { // kontak_person ?>
    <div id="r_kontak_person"<?= $Page->kontak_person->rowAttributes() ?>>
        <label id="elh_instansi_kontak_person" for="x_kontak_person" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kontak_person->caption() ?><?= $Page->kontak_person->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->kontak_person->cellAttributes() ?>>
<span id="el_instansi_kontak_person">
<input type="<?= $Page->kontak_person->getInputTextType() ?>" name="x_kontak_person" id="x_kontak_person" data-table="instansi" data-field="x_kontak_person" value="<?= $Page->kontak_person->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->kontak_person->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->kontak_person->formatPattern()) ?>"<?= $Page->kontak_person->editAttributes() ?> aria-describedby="x_kontak_person_help">
<?= $Page->kontak_person->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->kontak_person->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->no_hp->Visible) { // no_hp ?>
    <div id="r_no_hp"<?= $Page->no_hp->rowAttributes() ?>>
        <label id="elh_instansi_no_hp" for="x_no_hp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->no_hp->caption() ?><?= $Page->no_hp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->no_hp->cellAttributes() ?>>
<span id="el_instansi_no_hp">
<input type="<?= $Page->no_hp->getInputTextType() ?>" name="x_no_hp" id="x_no_hp" data-table="instansi" data-field="x_no_hp" value="<?= $Page->no_hp->getEditValue() ?>" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->no_hp->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->no_hp->formatPattern()) ?>"<?= $Page->no_hp->editAttributes() ?> aria-describedby="x_no_hp_help">
<?= $Page->no_hp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->no_hp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
    <div id="r_email"<?= $Page->email->rowAttributes() ?>>
        <label id="elh_instansi_email" for="x_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email->caption() ?><?= $Page->email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->email->cellAttributes() ?>>
<span id="el_instansi_email">
<input type="<?= $Page->email->getInputTextType() ?>" name="x_email" id="x_email" data-table="instansi" data-field="x_email" value="<?= $Page->email->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->email->formatPattern()) ?>"<?= $Page->email->editAttributes() ?> aria-describedby="x_email_help">
<?= $Page->email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="finstansiedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="finstansiedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(finstansiedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#finstansiedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("instansi");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#finstansiedit:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
