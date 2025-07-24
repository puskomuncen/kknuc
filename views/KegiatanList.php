<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$KegiatanList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { kegiatan: currentTable } });
var currentPageID = ew.PAGE_ID = "list";
var currentForm;
var <?= $Page->FormName ?>;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("<?= $Page->FormName ?>")
        .setPageId("list")
        .setSubmitWithFetch(<?= $Page->UseAjaxActions ? "true" : "false" ?>)
        .setFormKeyCountName("<?= $Page->getFormKeyCountName() ?>")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
ew.PREVIEW_SELECTOR ??= ".ew-preview-btn";
ew.PREVIEW_TYPE ??= "row";
ew.PREVIEW_NAV_STYLE ??= "tabs"; // tabs/pills/underline
ew.PREVIEW_MODAL_CLASS ??= "modal modal-fullscreen-sm-down";
ew.PREVIEW_ROW ??= true;
ew.PREVIEW_SINGLE_ROW ??= false;
ew.PREVIEW || ew.ready("head", ew.PATH_BASE + "js/preview.min.js?v=25.12.0", "preview");
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
</div>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { ?>
<main class="list<?= ($Page->TotalRecords == 0 && !$Page->isAdd()) ? "" : "" ?>">
<?php } else { ?>
<main class="list<?= ($Page->TotalRecords == 0 && !$Page->isAdd()) ? " ew-no-record" : "" ?>">
<?php } ?>
<div id="ew-header-options">
<?php $Page->HeaderOptions?->render("body") ?>
</div>
<div id="ew-list">
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?= $Page->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Page->TableGridClass ?>">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
</div>
<?php } ?>
<form name="<?= $Page->FormName ?>" id="<?= $Page->FormName ?>" class="ew-form ew-list-form" action="<?= $Page->PageAction ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="kegiatan">
<?php if ($Page->IsModal) { ?>
<input type="hidden" name="modal" value="1">
<?php } ?>
<div id="gmp_kegiatan" class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit() || $Page->isMultiEdit()) { ?>
<table id="tbl_kegiatanlist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <th data-name="id_kegiatan" class="<?= $Page->id_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_id_kegiatan" class="kegiatan_id_kegiatan"><?= $Page->renderFieldHeader($Page->id_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <th data-name="nama_kegiatan" class="<?= $Page->nama_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_nama_kegiatan" class="kegiatan_nama_kegiatan"><?= $Page->renderFieldHeader($Page->nama_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
        <th data-name="tahun" class="<?= $Page->tahun->headerCellClass() ?>"><div id="elh_kegiatan_tahun" class="kegiatan_tahun"><?= $Page->renderFieldHeader($Page->tahun) ?></div></th>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
        <th data-name="semester" class="<?= $Page->semester->headerCellClass() ?>"><div id="elh_kegiatan_semester" class="kegiatan_semester"><?= $Page->renderFieldHeader($Page->semester) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <th data-name="tanggal_mulai" class="<?= $Page->tanggal_mulai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_mulai" class="kegiatan_tanggal_mulai"><?= $Page->renderFieldHeader($Page->tanggal_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <th data-name="tanggal_selesai" class="<?= $Page->tanggal_selesai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_selesai" class="kegiatan_tanggal_selesai"><?= $Page->renderFieldHeader($Page->tanggal_selesai) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
<?php
$Page->setupGrid();
$isInlineAddOrCopy = ($Page->isCopy() || $Page->isAdd());
while ($Page->RecordCount < $Page->StopRecord || $Page->RowIndex === '$rowindex$' || $isInlineAddOrCopy && $Page->RowIndex == 0) {
    if (
        $Page->CurrentRow !== false
        && $Page->RowIndex !== '$rowindex$'
        && (!$Page->isGridAdd() || $Page->CurrentMode == "copy")
        && (!($isInlineAddOrCopy && $Page->RowIndex == 0))
    ) {
        $Page->fetch();
    }
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->setupRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <td data-name="id_kegiatan"<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_id_kegiatan" class="el_kegiatan_id_kegiatan">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <td data-name="nama_kegiatan"<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_nama_kegiatan" class="el_kegiatan_nama_kegiatan">
<span<?= $Page->nama_kegiatan->viewAttributes() ?>>
<?= $Page->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tahun->Visible) { // tahun ?>
        <td data-name="tahun"<?= $Page->tahun->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tahun" class="el_kegiatan_tahun">
<span<?= $Page->tahun->viewAttributes() ?>>
<?= $Page->tahun->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->semester->Visible) { // semester ?>
        <td data-name="semester"<?= $Page->semester->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_semester" class="el_kegiatan_semester">
<span<?= $Page->semester->viewAttributes() ?>>
<?= $Page->semester->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <td data-name="tanggal_mulai"<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_mulai" class="el_kegiatan_tanggal_mulai">
<span<?= $Page->tanggal_mulai->viewAttributes() ?>>
<?= $Page->tanggal_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <td data-name="tanggal_selesai"<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_selesai" class="el_kegiatan_tanggal_selesai">
<span<?= $Page->tanggal_selesai->viewAttributes() ?>>
<?= $Page->tanggal_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }

    // Reset for template row
    if ($Page->RowIndex === '$rowindex$') {
        $Page->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Page->isCopy() || $Page->isAdd()) && $Page->RowIndex == 0) {
        $Page->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php // Begin of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } else { ?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { // --- Begin of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<table id="tbl_kegiatanlist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
// $Page->renderListOptions(); // do not display for empty table, by Masino Sinaga, September 10, 2023

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <th data-name="id_kegiatan" class="<?= $Page->id_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_id_kegiatan" class="kegiatan_id_kegiatan"><?= $Page->renderFieldHeader($Page->id_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <th data-name="nama_kegiatan" class="<?= $Page->nama_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_nama_kegiatan" class="kegiatan_nama_kegiatan"><?= $Page->renderFieldHeader($Page->nama_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
        <th data-name="tahun" class="<?= $Page->tahun->headerCellClass() ?>"><div id="elh_kegiatan_tahun" class="kegiatan_tahun"><?= $Page->renderFieldHeader($Page->tahun) ?></div></th>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
        <th data-name="semester" class="<?= $Page->semester->headerCellClass() ?>"><div id="elh_kegiatan_semester" class="kegiatan_semester"><?= $Page->renderFieldHeader($Page->semester) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <th data-name="tanggal_mulai" class="<?= $Page->tanggal_mulai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_mulai" class="kegiatan_tanggal_mulai"><?= $Page->renderFieldHeader($Page->tanggal_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <th data-name="tanggal_selesai" class="<?= $Page->tanggal_selesai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_selesai" class="kegiatan_tanggal_selesai"><?= $Page->renderFieldHeader($Page->tanggal_selesai) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
    <tr class="border-bottom-0" style="height:36px;">
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <td data-name="id_kegiatan"<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_id_kegiatan" class="el_kegiatan_id_kegiatan">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <td data-name="nama_kegiatan"<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_nama_kegiatan" class="el_kegiatan_nama_kegiatan">
<span<?= $Page->nama_kegiatan->viewAttributes() ?>>
<?= $Page->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tahun->Visible) { // tahun ?>
        <td data-name="tahun"<?= $Page->tahun->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tahun" class="el_kegiatan_tahun">
<span<?= $Page->tahun->viewAttributes() ?>>
<?= $Page->tahun->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->semester->Visible) { // semester ?>
        <td data-name="semester"<?= $Page->semester->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_semester" class="el_kegiatan_semester">
<span<?= $Page->semester->viewAttributes() ?>>
<?= $Page->semester->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <td data-name="tanggal_mulai"<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_mulai" class="el_kegiatan_tanggal_mulai">
<span<?= $Page->tanggal_mulai->viewAttributes() ?>>
<?= $Page->tanggal_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <td data-name="tanggal_selesai"<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_selesai" class="el_kegiatan_tanggal_selesai">
<span<?= $Page->tanggal_selesai->viewAttributes() ?>>
<?= $Page->tanggal_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
</tbody>
</table><!-- /.ew-table -->
<?php } // --- End of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<?php // End of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction && !$Page->UseAjaxActions) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close result set
$Page->Result?->free();
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<?php // Begin of Empty Table by Masino Sinaga, September 30, 2020 ?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { ?>
<div class="card ew-card ew-grid<?= $Page->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Page->TableGridClass ?>">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
</div>
<?php } ?>
<form name="<?= $Page->FormName ?>" id="<?= $Page->FormName ?>" class="ew-form ew-list-form" action="<?= $Page->PageAction ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="kegiatan">
<?php if ($Page->IsModal) { ?>
<input type="hidden" name="modal" value="1">
<?php } ?>
<div id="gmp_kegiatan" class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit() || $Page->isMultiEdit()) { ?>
<table id="tbl_kegiatanlist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <th data-name="id_kegiatan" class="<?= $Page->id_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_id_kegiatan" class="kegiatan_id_kegiatan"><?= $Page->renderFieldHeader($Page->id_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <th data-name="nama_kegiatan" class="<?= $Page->nama_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_nama_kegiatan" class="kegiatan_nama_kegiatan"><?= $Page->renderFieldHeader($Page->nama_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
        <th data-name="tahun" class="<?= $Page->tahun->headerCellClass() ?>"><div id="elh_kegiatan_tahun" class="kegiatan_tahun"><?= $Page->renderFieldHeader($Page->tahun) ?></div></th>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
        <th data-name="semester" class="<?= $Page->semester->headerCellClass() ?>"><div id="elh_kegiatan_semester" class="kegiatan_semester"><?= $Page->renderFieldHeader($Page->semester) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <th data-name="tanggal_mulai" class="<?= $Page->tanggal_mulai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_mulai" class="kegiatan_tanggal_mulai"><?= $Page->renderFieldHeader($Page->tanggal_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <th data-name="tanggal_selesai" class="<?= $Page->tanggal_selesai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_selesai" class="kegiatan_tanggal_selesai"><?= $Page->renderFieldHeader($Page->tanggal_selesai) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
<?php
$Page->setupGrid();
$isInlineAddOrCopy = ($Page->isCopy() || $Page->isAdd());
while ($Page->RecordCount < $Page->StopRecord || $Page->RowIndex === '$rowindex$' || $isInlineAddOrCopy && $Page->RowIndex == 0) {
    if (
        $Page->CurrentRow !== false
        && $Page->RowIndex !== '$rowindex$'
        && (!$Page->isGridAdd() || $Page->CurrentMode == "copy")
        && (!($isInlineAddOrCopy && $Page->RowIndex == 0))
    ) {
        $Page->fetch();
    }
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->setupRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <td data-name="id_kegiatan"<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_id_kegiatan" class="el_kegiatan_id_kegiatan">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <td data-name="nama_kegiatan"<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_nama_kegiatan" class="el_kegiatan_nama_kegiatan">
<span<?= $Page->nama_kegiatan->viewAttributes() ?>>
<?= $Page->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tahun->Visible) { // tahun ?>
        <td data-name="tahun"<?= $Page->tahun->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tahun" class="el_kegiatan_tahun">
<span<?= $Page->tahun->viewAttributes() ?>>
<?= $Page->tahun->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->semester->Visible) { // semester ?>
        <td data-name="semester"<?= $Page->semester->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_semester" class="el_kegiatan_semester">
<span<?= $Page->semester->viewAttributes() ?>>
<?= $Page->semester->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <td data-name="tanggal_mulai"<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_mulai" class="el_kegiatan_tanggal_mulai">
<span<?= $Page->tanggal_mulai->viewAttributes() ?>>
<?= $Page->tanggal_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <td data-name="tanggal_selesai"<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_selesai" class="el_kegiatan_tanggal_selesai">
<span<?= $Page->tanggal_selesai->viewAttributes() ?>>
<?= $Page->tanggal_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }

    // Reset for template row
    if ($Page->RowIndex === '$rowindex$') {
        $Page->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Page->isCopy() || $Page->isAdd()) && $Page->RowIndex == 0) {
        $Page->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php // Begin of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } else { ?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { // --- Begin of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<table id="tbl_kegiatanlist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
// $Page->renderListOptions(); // do not display for empty table, by Masino Sinaga, September 10, 2023

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <th data-name="id_kegiatan" class="<?= $Page->id_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_id_kegiatan" class="kegiatan_id_kegiatan"><?= $Page->renderFieldHeader($Page->id_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <th data-name="nama_kegiatan" class="<?= $Page->nama_kegiatan->headerCellClass() ?>"><div id="elh_kegiatan_nama_kegiatan" class="kegiatan_nama_kegiatan"><?= $Page->renderFieldHeader($Page->nama_kegiatan) ?></div></th>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
        <th data-name="tahun" class="<?= $Page->tahun->headerCellClass() ?>"><div id="elh_kegiatan_tahun" class="kegiatan_tahun"><?= $Page->renderFieldHeader($Page->tahun) ?></div></th>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
        <th data-name="semester" class="<?= $Page->semester->headerCellClass() ?>"><div id="elh_kegiatan_semester" class="kegiatan_semester"><?= $Page->renderFieldHeader($Page->semester) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <th data-name="tanggal_mulai" class="<?= $Page->tanggal_mulai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_mulai" class="kegiatan_tanggal_mulai"><?= $Page->renderFieldHeader($Page->tanggal_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <th data-name="tanggal_selesai" class="<?= $Page->tanggal_selesai->headerCellClass() ?>"><div id="elh_kegiatan_tanggal_selesai" class="kegiatan_tanggal_selesai"><?= $Page->renderFieldHeader($Page->tanggal_selesai) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
    <tr class="border-bottom-0" style="height:36px;">
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
        <td data-name="id_kegiatan"<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_id_kegiatan" class="el_kegiatan_id_kegiatan">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
        <td data-name="nama_kegiatan"<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_nama_kegiatan" class="el_kegiatan_nama_kegiatan">
<span<?= $Page->nama_kegiatan->viewAttributes() ?>>
<?= $Page->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tahun->Visible) { // tahun ?>
        <td data-name="tahun"<?= $Page->tahun->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tahun" class="el_kegiatan_tahun">
<span<?= $Page->tahun->viewAttributes() ?>>
<?= $Page->tahun->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->semester->Visible) { // semester ?>
        <td data-name="semester"<?= $Page->semester->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_semester" class="el_kegiatan_semester">
<span<?= $Page->semester->viewAttributes() ?>>
<?= $Page->semester->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
        <td data-name="tanggal_mulai"<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_mulai" class="el_kegiatan_tanggal_mulai">
<span<?= $Page->tanggal_mulai->viewAttributes() ?>>
<?= $Page->tanggal_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
        <td data-name="tanggal_selesai"<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_kegiatan_tanggal_selesai" class="el_kegiatan_tanggal_selesai">
<span<?= $Page->tanggal_selesai->viewAttributes() ?>>
<?= $Page->tanggal_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
</tbody>
</table><!-- /.ew-table -->
<?php } // --- End of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<?php // End of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction && !$Page->UseAjaxActions) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close result set
$Page->Result?->free();
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } else { ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } // end of Empty Table by Masino Sinaga, September 30, 2020 ?>
<?php } ?>
</div>
<div id="ew-footer-options">
<?php $Page->FooterOptions?->render("body") ?>
</div>
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("head", function() {
	$(".ew-grid").css("width", "100%");
	$(".sidebar, .main-sidebar, .main-header, .header-navbar, .main-menu").on("mouseenter", function(event) {
		$(".ew-grid").css("width", "100%");
	});
	$(".sidebar, .main-sidebar, .main-header, .header-navbar, .main-menu").on("mouseover", function(event) {
		$(".ew-grid").css("width", "100%");
	});
	var cssTransitionEnd = 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend';
	$('.main-header').on(cssTransitionEnd, function(event) {
		$(".ew-grid").css("width", "100%");
	});
	$(document).on('resize', function() {
		if ($('.ew-grid').length > 0) {
			$(".ew-grid").css("width", "100%");
		}
	});
	$(".nav-item.d-block").on("click", function(event) {
		$(".ew-grid").css("width", "100%");
	});
});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatanadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fkegiatanadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatanedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fkegiatanedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatanupdate.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkegiatanupdate").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatandelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkegiatandelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport() && CurrentPageID()=="list") { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('.ew-grid-save, .ew-grid-insert').on('click',function(){ew.prompt({title: ew.language.phrase("MessageSaveGridConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkegiatanlist").submit();});return false;});});
</script>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('.ew-inline-update').on('click',function(){ew.prompt({title: ew.language.phrase("MessageSaveGridConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkegiatanlist").submit();});return false;});});
</script>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('.ew-inline-insert').on('click',function(){ew.prompt({title: ew.language.phrase("MessageSaveGridConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkegiatanlist").submit();});return false;});});
</script>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){var gridchange=false;$('[data-table="kegiatan"]').change(function(){	gridchange=true;});$('.ew-grid-cancel,.ew-inline-cancel').click(function(){if (gridchange==true){ew.prompt({title: ew.language.phrase("ConfirmCancel"),icon:'question',showCancelButton:true},result=>{if(result) window.location = "<?php echo str_replace('_', '', 'kegiatanlist'); ?>";});return false;}});});
</script>
<?php } ?>
<?php if (!$kegiatan->isExport()) { ?>
<script>
loadjs.ready("jscookie", function() {
	var expires = new Date(new Date().getTime() + 525600 * 60 * 1000); // expire in 525600 
	var SearchToggle = $('.ew-search-toggle');
	SearchToggle.on('click', function(event) { 
		event.preventDefault(); 
		if (SearchToggle.hasClass('active')) { 
			ew.Cookies.set(ew.PROJECT_NAME + "_kegiatan_searchpanel", "notactive", {
			  sameSite: ew.COOKIE_SAMESITE,
			  secure: ew.COOKIE_SECURE
			}); 
		} else { 
			ew.Cookies.set(ew.PROJECT_NAME + "_kegiatan_searchpanel", "active", {
			  sameSite: ew.COOKIE_SAMESITE,
			  secure: ew.COOKIE_SECURE
			}); 
		} 
	});
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("kegiatan");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
