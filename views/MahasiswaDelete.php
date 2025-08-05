<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$MahasiswaDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { mahasiswa: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fmahasiswadelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmahasiswadelete")
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
<form name="fmahasiswadelete" id="fmahasiswadelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mahasiswa">
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
<?php if ($Page->nim->Visible) { // nim ?>
        <th class="<?= $Page->nim->headerCellClass() ?>"><span id="elh_mahasiswa_nim" class="mahasiswa_nim"><?= $Page->nim->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_mahasiswa_nama" class="mahasiswa_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->prodi->Visible) { // prodi ?>
        <th class="<?= $Page->prodi->headerCellClass() ?>"><span id="elh_mahasiswa_prodi" class="mahasiswa_prodi"><?= $Page->prodi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->fakultas->Visible) { // fakultas ?>
        <th class="<?= $Page->fakultas->headerCellClass() ?>"><span id="elh_mahasiswa_fakultas" class="mahasiswa_fakultas"><?= $Page->fakultas->caption() ?></span></th>
<?php } ?>
<?php if ($Page->angkatan->Visible) { // angkatan ?>
        <th class="<?= $Page->angkatan->headerCellClass() ?>"><span id="elh_mahasiswa_angkatan" class="mahasiswa_angkatan"><?= $Page->angkatan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
        <th class="<?= $Page->email->headerCellClass() ?>"><span id="elh_mahasiswa_email" class="mahasiswa_email"><?= $Page->email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->no_hp->Visible) { // no_hp ?>
        <th class="<?= $Page->no_hp->headerCellClass() ?>"><span id="elh_mahasiswa_no_hp" class="mahasiswa_no_hp"><?= $Page->no_hp->caption() ?></span></th>
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
<?php if ($Page->nim->Visible) { // nim ?>
        <td<?= $Page->nim->cellAttributes() ?>>
<span id="">
<span<?= $Page->nim->viewAttributes() ?>>
<?= $Page->nim->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td<?= $Page->nama->cellAttributes() ?>>
<span id="">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->prodi->Visible) { // prodi ?>
        <td<?= $Page->prodi->cellAttributes() ?>>
<span id="">
<span<?= $Page->prodi->viewAttributes() ?>>
<?= $Page->prodi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->fakultas->Visible) { // fakultas ?>
        <td<?= $Page->fakultas->cellAttributes() ?>>
<span id="">
<span<?= $Page->fakultas->viewAttributes() ?>>
<?= $Page->fakultas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->angkatan->Visible) { // angkatan ?>
        <td<?= $Page->angkatan->cellAttributes() ?>>
<span id="">
<span<?= $Page->angkatan->viewAttributes() ?>>
<?= $Page->angkatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
        <td<?= $Page->email->cellAttributes() ?>>
<span id="">
<span<?= $Page->email->viewAttributes() ?>>
<?= $Page->email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->no_hp->Visible) { // no_hp ?>
        <td<?= $Page->no_hp->cellAttributes() ?>>
<span id="">
<span<?= $Page->no_hp->viewAttributes() ?>>
<?= $Page->no_hp->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fmahasiswadelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fmahasiswadelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
