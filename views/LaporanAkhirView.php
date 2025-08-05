<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$LaporanAkhirView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<?php if (!$Page->IsModal) { ?>
<?php if (!$Page->isExport()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<?php } ?>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("ViewCaption"); ?></h4>
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
<form name="flaporan_akhirview" id="flaporan_akhirview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { laporan_akhir: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var flaporan_akhirview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("flaporan_akhirview")
        .setPageId("view")
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
<?php } ?>
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="laporan_akhir">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id_laporan->Visible) { // id_laporan ?>
    <tr id="r_id_laporan"<?= $Page->id_laporan->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_laporan_akhir_id_laporan"><?= $Page->id_laporan->caption() ?></span></td>
        <td data-name="id_laporan"<?= $Page->id_laporan->cellAttributes() ?>>
<span id="el_laporan_akhir_id_laporan">
<span<?= $Page->id_laporan->viewAttributes() ?>>
<?= $Page->id_laporan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_penempatan->Visible) { // id_penempatan ?>
    <tr id="r_id_penempatan"<?= $Page->id_penempatan->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_laporan_akhir_id_penempatan"><?= $Page->id_penempatan->caption() ?></span></td>
        <td data-name="id_penempatan"<?= $Page->id_penempatan->cellAttributes() ?>>
<span id="el_laporan_akhir_id_penempatan">
<span<?= $Page->id_penempatan->viewAttributes() ?>>
<?= $Page->id_penempatan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->file_laporan->Visible) { // file_laporan ?>
    <tr id="r_file_laporan"<?= $Page->file_laporan->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_laporan_akhir_file_laporan"><?= $Page->file_laporan->caption() ?></span></td>
        <td data-name="file_laporan"<?= $Page->file_laporan->cellAttributes() ?>>
<span id="el_laporan_akhir_file_laporan">
<span<?= $Page->file_laporan->viewAttributes() ?>>
<?= GetFileViewTag($Page->file_laporan, $Page->file_laporan->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nilai_dosen->Visible) { // nilai_dosen ?>
    <tr id="r_nilai_dosen"<?= $Page->nilai_dosen->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_laporan_akhir_nilai_dosen"><?= $Page->nilai_dosen->caption() ?></span></td>
        <td data-name="nilai_dosen"<?= $Page->nilai_dosen->cellAttributes() ?>>
<span id="el_laporan_akhir_nilai_dosen">
<span<?= $Page->nilai_dosen->viewAttributes() ?>>
<?= $Page->nilai_dosen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nilai_instansi->Visible) { // nilai_instansi ?>
    <tr id="r_nilai_instansi"<?= $Page->nilai_instansi->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_laporan_akhir_nilai_instansi"><?= $Page->nilai_instansi->caption() ?></span></td>
        <td data-name="nilai_instansi"<?= $Page->nilai_instansi->cellAttributes() ?>>
<span id="el_laporan_akhir_nilai_instansi">
<span<?= $Page->nilai_instansi->viewAttributes() ?>>
<?= $Page->nilai_instansi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
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
<?php if (!$Page->IsModal) { ?>
<?php if (!$Page->isExport()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<?php } ?>
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(flaporan_akhiradd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#flaporan_akhiradd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(flaporan_akhiredit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#flaporan_akhiredit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
