<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$InstansiDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { instansi: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var finstansidelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("finstansidelete")
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
<form name="finstansidelete" id="finstansidelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="instansi">
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
<?php if ($Page->id_instansi->Visible) { // id_instansi ?>
        <th class="<?= $Page->id_instansi->headerCellClass() ?>"><span id="elh_instansi_id_instansi" class="instansi_id_instansi"><?= $Page->id_instansi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama_instansi->Visible) { // nama_instansi ?>
        <th class="<?= $Page->nama_instansi->headerCellClass() ?>"><span id="elh_instansi_nama_instansi" class="instansi_nama_instansi"><?= $Page->nama_instansi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
        <th class="<?= $Page->alamat->headerCellClass() ?>"><span id="elh_instansi_alamat" class="instansi_alamat"><?= $Page->alamat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->kontak_person->Visible) { // kontak_person ?>
        <th class="<?= $Page->kontak_person->headerCellClass() ?>"><span id="elh_instansi_kontak_person" class="instansi_kontak_person"><?= $Page->kontak_person->caption() ?></span></th>
<?php } ?>
<?php if ($Page->no_hp->Visible) { // no_hp ?>
        <th class="<?= $Page->no_hp->headerCellClass() ?>"><span id="elh_instansi_no_hp" class="instansi_no_hp"><?= $Page->no_hp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
        <th class="<?= $Page->email->headerCellClass() ?>"><span id="elh_instansi_email" class="instansi_email"><?= $Page->email->caption() ?></span></th>
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
<?php if ($Page->id_instansi->Visible) { // id_instansi ?>
        <td<?= $Page->id_instansi->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_instansi->viewAttributes() ?>>
<?= $Page->id_instansi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama_instansi->Visible) { // nama_instansi ?>
        <td<?= $Page->nama_instansi->cellAttributes() ?>>
<span id="">
<span<?= $Page->nama_instansi->viewAttributes() ?>>
<?= $Page->nama_instansi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
        <td<?= $Page->alamat->cellAttributes() ?>>
<span id="">
<span<?= $Page->alamat->viewAttributes() ?>>
<?= $Page->alamat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->kontak_person->Visible) { // kontak_person ?>
        <td<?= $Page->kontak_person->cellAttributes() ?>>
<span id="">
<span<?= $Page->kontak_person->viewAttributes() ?>>
<?= $Page->kontak_person->getViewValue() ?></span>
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
<?php if ($Page->email->Visible) { // email ?>
        <td<?= $Page->email->cellAttributes() ?>>
<span id="">
<span<?= $Page->email->viewAttributes() ?>>
<?= $Page->email->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(finstansidelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#finstansidelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
