<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$MahasiswaAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { mahasiswa: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fmahasiswaadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmahasiswaadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["nim", [fields.nim.visible && fields.nim.required ? ew.Validators.required(fields.nim.caption) : null], fields.nim.isInvalid],
            ["nama", [fields.nama.visible && fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid],
            ["prodi", [fields.prodi.visible && fields.prodi.required ? ew.Validators.required(fields.prodi.caption) : null], fields.prodi.isInvalid],
            ["fakultas", [fields.fakultas.visible && fields.fakultas.required ? ew.Validators.required(fields.fakultas.caption) : null], fields.fakultas.isInvalid],
            ["angkatan", [fields.angkatan.visible && fields.angkatan.required ? ew.Validators.required(fields.angkatan.caption) : null, ew.Validators.integer], fields.angkatan.isInvalid],
            ["email", [fields.email.visible && fields.email.required ? ew.Validators.required(fields.email.caption) : null], fields.email.isInvalid],
            ["no_hp", [fields.no_hp.visible && fields.no_hp.required ? ew.Validators.required(fields.no_hp.caption) : null], fields.no_hp.isInvalid]
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
<form name="fmahasiswaadd" id="fmahasiswaadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mahasiswa">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nim->Visible) { // nim ?>
    <div id="r_nim"<?= $Page->nim->rowAttributes() ?>>
        <label id="elh_mahasiswa_nim" for="x_nim" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nim->caption() ?><?= $Page->nim->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nim->cellAttributes() ?>>
<span id="el_mahasiswa_nim">
<input type="<?= $Page->nim->getInputTextType() ?>" name="x_nim" id="x_nim" data-table="mahasiswa" data-field="x_nim" value="<?= $Page->nim->getEditValue() ?>" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->nim->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nim->formatPattern()) ?>"<?= $Page->nim->editAttributes() ?> aria-describedby="x_nim_help">
<?= $Page->nim->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nim->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama"<?= $Page->nama->rowAttributes() ?>>
        <label id="elh_mahasiswa_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nama->cellAttributes() ?>>
<span id="el_mahasiswa_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" name="x_nama" id="x_nama" data-table="mahasiswa" data-field="x_nama" value="<?= $Page->nama->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nama->formatPattern()) ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->prodi->Visible) { // prodi ?>
    <div id="r_prodi"<?= $Page->prodi->rowAttributes() ?>>
        <label id="elh_mahasiswa_prodi" for="x_prodi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->prodi->caption() ?><?= $Page->prodi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->prodi->cellAttributes() ?>>
<span id="el_mahasiswa_prodi">
<input type="<?= $Page->prodi->getInputTextType() ?>" name="x_prodi" id="x_prodi" data-table="mahasiswa" data-field="x_prodi" value="<?= $Page->prodi->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->prodi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->prodi->formatPattern()) ?>"<?= $Page->prodi->editAttributes() ?> aria-describedby="x_prodi_help">
<?= $Page->prodi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->prodi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fakultas->Visible) { // fakultas ?>
    <div id="r_fakultas"<?= $Page->fakultas->rowAttributes() ?>>
        <label id="elh_mahasiswa_fakultas" for="x_fakultas" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fakultas->caption() ?><?= $Page->fakultas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fakultas->cellAttributes() ?>>
<span id="el_mahasiswa_fakultas">
<input type="<?= $Page->fakultas->getInputTextType() ?>" name="x_fakultas" id="x_fakultas" data-table="mahasiswa" data-field="x_fakultas" value="<?= $Page->fakultas->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->fakultas->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fakultas->formatPattern()) ?>"<?= $Page->fakultas->editAttributes() ?> aria-describedby="x_fakultas_help">
<?= $Page->fakultas->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fakultas->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->angkatan->Visible) { // angkatan ?>
    <div id="r_angkatan"<?= $Page->angkatan->rowAttributes() ?>>
        <label id="elh_mahasiswa_angkatan" for="x_angkatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->angkatan->caption() ?><?= $Page->angkatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->angkatan->cellAttributes() ?>>
<span id="el_mahasiswa_angkatan">
<input type="<?= $Page->angkatan->getInputTextType() ?>" name="x_angkatan" id="x_angkatan" data-table="mahasiswa" data-field="x_angkatan" value="<?= $Page->angkatan->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->angkatan->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->angkatan->formatPattern()) ?>"<?= $Page->angkatan->editAttributes() ?> aria-describedby="x_angkatan_help">
<?= $Page->angkatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->angkatan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
    <div id="r_email"<?= $Page->email->rowAttributes() ?>>
        <label id="elh_mahasiswa_email" for="x_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email->caption() ?><?= $Page->email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->email->cellAttributes() ?>>
<span id="el_mahasiswa_email">
<input type="<?= $Page->email->getInputTextType() ?>" name="x_email" id="x_email" data-table="mahasiswa" data-field="x_email" value="<?= $Page->email->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->email->formatPattern()) ?>"<?= $Page->email->editAttributes() ?> aria-describedby="x_email_help">
<?= $Page->email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->no_hp->Visible) { // no_hp ?>
    <div id="r_no_hp"<?= $Page->no_hp->rowAttributes() ?>>
        <label id="elh_mahasiswa_no_hp" for="x_no_hp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->no_hp->caption() ?><?= $Page->no_hp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->no_hp->cellAttributes() ?>>
<span id="el_mahasiswa_no_hp">
<input type="<?= $Page->no_hp->getInputTextType() ?>" name="x_no_hp" id="x_no_hp" data-table="mahasiswa" data-field="x_no_hp" value="<?= $Page->no_hp->getEditValue() ?>" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->no_hp->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->no_hp->formatPattern()) ?>"<?= $Page->no_hp->editAttributes() ?> aria-describedby="x_no_hp_help">
<?= $Page->no_hp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->no_hp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fmahasiswaadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fmahasiswaadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fmahasiswaadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fmahasiswaadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("mahasiswa");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fmahasiswaadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
