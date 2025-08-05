<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$PenempatanDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { penempatan: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fpenempatandelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpenempatandelete")
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
<form name="fpenempatandelete" id="fpenempatandelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="penempatan">
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
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
        <th class="<?= $Page->id_penempatan->headerCellClass() ?>"><span id="elh_penempatan_id_penempatan" class="penempatan_id_penempatan"><?= $Page->id_penempatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_pendaftaran->Visible) { // id_pendaftaran ?>
        <th class="<?= $Page->id_pendaftaran->headerCellClass() ?>"><span id="elh_penempatan_id_pendaftaran" class="penempatan_id_pendaftaran"><?= $Page->id_pendaftaran->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_instansi->Visible) { // id_instansi ?>
        <th class="<?= $Page->id_instansi->headerCellClass() ?>"><span id="elh_penempatan_id_instansi" class="penempatan_id_instansi"><?= $Page->id_instansi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dosen_pembimbing->Visible) { // dosen_pembimbing ?>
        <th class="<?= $Page->dosen_pembimbing->headerCellClass() ?>"><span id="elh_penempatan_dosen_pembimbing" class="penempatan_dosen_pembimbing"><?= $Page->dosen_pembimbing->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_penempatan_status" class="penempatan_status"><?= $Page->status->caption() ?></span></th>
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
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
        <td<?= $Page->id_penempatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_penempatan->viewAttributes() ?>>
<?= $Page->id_penempatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_pendaftaran->Visible) { // id_pendaftaran ?>
        <td<?= $Page->id_pendaftaran->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_pendaftaran->viewAttributes() ?>>
<?= $Page->id_pendaftaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_instansi->Visible) { // id_instansi ?>
        <td<?= $Page->id_instansi->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_instansi->viewAttributes() ?>>
<?= $Page->id_instansi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dosen_pembimbing->Visible) { // dosen_pembimbing ?>
        <td<?= $Page->dosen_pembimbing->cellAttributes() ?>>
<span id="">
<span<?= $Page->dosen_pembimbing->viewAttributes() ?>>
<?= $Page->dosen_pembimbing->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fpenempatandelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fpenempatandelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
