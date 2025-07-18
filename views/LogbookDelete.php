<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$LogbookDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { logbook: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var flogbookdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("flogbookdelete")
        .setPageId("delete")
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
<form name="flogbookdelete" id="flogbookdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="logbook">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid <?= $Page->TableGridClass ?>">
<div class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<table class="<?= $Page->TableClass ?>">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id_logbook->Visible) { // id_logbook ?>
        <th class="<?= $Page->id_logbook->headerCellClass() ?>"><span id="elh_logbook_id_logbook" class="logbook_id_logbook"><?= $Page->id_logbook->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
        <th class="<?= $Page->id_penempatan->headerCellClass() ?>"><span id="elh_logbook_id_penempatan" class="logbook_id_penempatan"><?= $Page->id_penempatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <th class="<?= $Page->tanggal->headerCellClass() ?>"><span id="elh_logbook_tanggal" class="logbook_tanggal"><?= $Page->tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->kegiatan->Visible) { // kegiatan ?>
        <th class="<?= $Page->kegiatan->headerCellClass() ?>"><span id="elh_logbook_kegiatan" class="logbook_kegiatan"><?= $Page->kegiatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->validasi_dosen->Visible) { // validasi_dosen ?>
        <th class="<?= $Page->validasi_dosen->headerCellClass() ?>"><span id="elh_logbook_validasi_dosen" class="logbook_validasi_dosen"><?= $Page->validasi_dosen->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while ($Page->fetch()) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = RowType::VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->CurrentRow);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id_logbook->Visible) { // id_logbook ?>
        <td<?= $Page->id_logbook->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_logbook->viewAttributes() ?>>
<?= $Page->id_logbook->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
        <td<?= $Page->id_penempatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_penempatan->viewAttributes() ?>>
<?= $Page->id_penempatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <td<?= $Page->tanggal->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->kegiatan->Visible) { // kegiatan ?>
        <td<?= $Page->kegiatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->kegiatan->viewAttributes() ?>>
<?= $Page->kegiatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->validasi_dosen->Visible) { // validasi_dosen ?>
        <td<?= $Page->validasi_dosen->cellAttributes() ?>>
<span id="">
<span<?= $Page->validasi_dosen->viewAttributes() ?>>
<div class="form-check form-switch d-inline-block">
    <input type="checkbox" id="x_validasi_dosen_<?= $Page->RowCount ?>" class="form-check-input" value="<?= $Page->validasi_dosen->getViewValue() ?>" disabled<?php if (ConvertToBool($Page->validasi_dosen->CurrentValue)) { ?> checked<?php } ?>>
    <label class="form-check-label" for="x_validasi_dosen_<?= $Page->RowCount ?>"></label>
</div>
</span>
</span>
</td>
<?php } ?>
    </tr>
<?php
}
$Page->Result?->free();
?>
</tbody>
</table>
</div>
</div>
<div class="ew-buttons ew-desktop-buttons">
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(flogbookdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#flogbookdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
