<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$PendaftaranDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pendaftaran: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fpendaftarandelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpendaftarandelete")
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
<form name="fpendaftarandelete" id="fpendaftarandelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pendaftaran">
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
<?php if ($Page->id_pendaftaran->Visible) { // id_pendaftaran ?>
        <th class="<?= $Page->id_pendaftaran->headerCellClass() ?>"><span id="elh_pendaftaran_id_pendaftaran" class="pendaftaran_id_pendaftaran"><?= $Page->id_pendaftaran->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nim->Visible) { // nim ?>
        <th class="<?= $Page->nim->headerCellClass() ?>"><span id="elh_pendaftaran_nim" class="pendaftaran_nim"><?= $Page->nim->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <th class="<?= $Page->id_kegiatan->headerCellClass() ?>"><span id="elh_pendaftaran_id_kegiatan" class="pendaftaran_id_kegiatan"><?= $Page->id_kegiatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_pendaftaran_status" class="pendaftaran_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal_daftar->Visible) { // tanggal_daftar ?>
        <th class="<?= $Page->tanggal_daftar->headerCellClass() ?>"><span id="elh_pendaftaran_tanggal_daftar" class="pendaftaran_tanggal_daftar"><?= $Page->tanggal_daftar->caption() ?></span></th>
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
<?php if ($Page->id_pendaftaran->Visible) { // id_pendaftaran ?>
        <td<?= $Page->id_pendaftaran->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_pendaftaran->viewAttributes() ?>>
<?= $Page->id_pendaftaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nim->Visible) { // nim ?>
        <td<?= $Page->nim->cellAttributes() ?>>
<span id="">
<span<?= $Page->nim->viewAttributes() ?>>
<?= $Page->nim->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <td<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td<?= $Page->status->cellAttributes() ?>>
<span id="">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal_daftar->Visible) { // tanggal_daftar ?>
        <td<?= $Page->tanggal_daftar->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal_daftar->viewAttributes() ?>>
<?= $Page->tanggal_daftar->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fpendaftarandelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fpendaftarandelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
