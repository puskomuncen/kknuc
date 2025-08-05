<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$LaporanAkhirDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { laporan_akhir: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var flaporan_akhirdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("flaporan_akhirdelete")
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
<form name="flaporan_akhirdelete" id="flaporan_akhirdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="laporan_akhir">
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
<?php if ($Page->id_laporan->Visible) { // id_laporan ?>
        <th class="<?= $Page->id_laporan->headerCellClass() ?>"><span id="elh_laporan_akhir_id_laporan" class="laporan_akhir_id_laporan"><?= $Page->id_laporan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
        <th class="<?= $Page->id_penempatan->headerCellClass() ?>"><span id="elh_laporan_akhir_id_penempatan" class="laporan_akhir_id_penempatan"><?= $Page->id_penempatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->file_laporan->Visible) { // file_laporan ?>
        <th class="<?= $Page->file_laporan->headerCellClass() ?>"><span id="elh_laporan_akhir_file_laporan" class="laporan_akhir_file_laporan"><?= $Page->file_laporan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nilai_dosen->Visible) { // nilai_dosen ?>
        <th class="<?= $Page->nilai_dosen->headerCellClass() ?>"><span id="elh_laporan_akhir_nilai_dosen" class="laporan_akhir_nilai_dosen"><?= $Page->nilai_dosen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nilai_instansi->Visible) { // nilai_instansi ?>
        <th class="<?= $Page->nilai_instansi->headerCellClass() ?>"><span id="elh_laporan_akhir_nilai_instansi" class="laporan_akhir_nilai_instansi"><?= $Page->nilai_instansi->caption() ?></span></th>
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
<?php if ($Page->id_laporan->Visible) { // id_laporan ?>
        <td<?= $Page->id_laporan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_laporan->viewAttributes() ?>>
<?= $Page->id_laporan->getViewValue() ?></span>
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
<?php if ($Page->file_laporan->Visible) { // file_laporan ?>
        <td<?= $Page->file_laporan->cellAttributes() ?>>
<span id="">
<span<?= $Page->file_laporan->viewAttributes() ?>>
<?= GetFileViewTag($Page->file_laporan, $Page->file_laporan->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->nilai_dosen->Visible) { // nilai_dosen ?>
        <td<?= $Page->nilai_dosen->cellAttributes() ?>>
<span id="">
<span<?= $Page->nilai_dosen->viewAttributes() ?>>
<?= $Page->nilai_dosen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nilai_instansi->Visible) { // nilai_instansi ?>
        <td<?= $Page->nilai_instansi->cellAttributes() ?>>
<span id="">
<span<?= $Page->nilai_instansi->viewAttributes() ?>>
<?= $Page->nilai_instansi->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(flaporan_akhirdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#flaporan_akhirdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
