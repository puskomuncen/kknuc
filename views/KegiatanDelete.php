<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$KegiatanDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { kegiatan: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fkegiatandelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fkegiatandelete")
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
<form name="fkegiatandelete" id="fkegiatandelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="kegiatan">
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
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <th class="<?= $Page->id_kegiatan->headerCellClass() ?>"><span id="elh_kegiatan_id_kegiatan" class="kegiatan_id_kegiatan"><?= $Page->id_kegiatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <th class="<?= $Page->nama_kegiatan->headerCellClass() ?>"><span id="elh_kegiatan_nama_kegiatan" class="kegiatan_nama_kegiatan"><?= $Page->nama_kegiatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
        <th class="<?= $Page->tahun->headerCellClass() ?>"><span id="elh_kegiatan_tahun" class="kegiatan_tahun"><?= $Page->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
        <th class="<?= $Page->semester->headerCellClass() ?>"><span id="elh_kegiatan_semester" class="kegiatan_semester"><?= $Page->semester->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <th class="<?= $Page->tanggal_mulai->headerCellClass() ?>"><span id="elh_kegiatan_tanggal_mulai" class="kegiatan_tanggal_mulai"><?= $Page->tanggal_mulai->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <th class="<?= $Page->tanggal_selesai->headerCellClass() ?>"><span id="elh_kegiatan_tanggal_selesai" class="kegiatan_tanggal_selesai"><?= $Page->tanggal_selesai->caption() ?></span></th>
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
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <td<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <td<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->nama_kegiatan->viewAttributes() ?>>
<?= $Page->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
        <td<?= $Page->tahun->cellAttributes() ?>>
<span id="">
<span<?= $Page->tahun->viewAttributes() ?>>
<?= $Page->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
        <td<?= $Page->semester->cellAttributes() ?>>
<span id="">
<span<?= $Page->semester->viewAttributes() ?>>
<?= $Page->semester->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <td<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal_mulai->viewAttributes() ?>>
<?= $Page->tanggal_mulai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <td<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal_selesai->viewAttributes() ?>>
<?= $Page->tanggal_selesai->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatandelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkegiatandelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
