<?php

namespace PHPMaker2025\kkndanpkl;

// Page object
$KegiatanView = &$Page;
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
<form name="fkegiatanview" id="fkegiatanview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { kegiatan: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fkegiatanview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fkegiatanview")
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
<input type="hidden" name="t" value="kegiatan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id_kegiatan->Visible) { // id_kegiatan ?>
    <tr id="r_id_kegiatan"<?= $Page->id_kegiatan->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_kegiatan_id_kegiatan"><?= $Page->id_kegiatan->caption() ?></span></td>
        <td data-name="id_kegiatan"<?= $Page->id_kegiatan->cellAttributes() ?>>
<span id="el_kegiatan_id_kegiatan">
<span<?= $Page->id_kegiatan->viewAttributes() ?>>
<?= $Page->id_kegiatan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama_kegiatan->Visible) { // nama_kegiatan ?>
    <tr id="r_nama_kegiatan"<?= $Page->nama_kegiatan->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_kegiatan_nama_kegiatan"><?= $Page->nama_kegiatan->caption() ?></span></td>
        <td data-name="nama_kegiatan"<?= $Page->nama_kegiatan->cellAttributes() ?>>
<span id="el_kegiatan_nama_kegiatan">
<span<?= $Page->nama_kegiatan->viewAttributes() ?>>
<?= $Page->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tahun->Visible) { // tahun ?>
    <tr id="r_tahun"<?= $Page->tahun->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_kegiatan_tahun"><?= $Page->tahun->caption() ?></span></td>
        <td data-name="tahun"<?= $Page->tahun->cellAttributes() ?>>
<span id="el_kegiatan_tahun">
<span<?= $Page->tahun->viewAttributes() ?>>
<?= $Page->tahun->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->semester->Visible) { // semester ?>
    <tr id="r_semester"<?= $Page->semester->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_kegiatan_semester"><?= $Page->semester->caption() ?></span></td>
        <td data-name="semester"<?= $Page->semester->cellAttributes() ?>>
<span id="el_kegiatan_semester">
<span<?= $Page->semester->viewAttributes() ?>>
<?= $Page->semester->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tanggal_mulai->Visible) { // tanggal_mulai ?>
    <tr id="r_tanggal_mulai"<?= $Page->tanggal_mulai->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_kegiatan_tanggal_mulai"><?= $Page->tanggal_mulai->caption() ?></span></td>
        <td data-name="tanggal_mulai"<?= $Page->tanggal_mulai->cellAttributes() ?>>
<span id="el_kegiatan_tanggal_mulai">
<span<?= $Page->tanggal_mulai->viewAttributes() ?>>
<?= $Page->tanggal_mulai->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tanggal_selesai->Visible) { // tanggal_selesai ?>
    <tr id="r_tanggal_selesai"<?= $Page->tanggal_selesai->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_kegiatan_tanggal_selesai"><?= $Page->tanggal_selesai->caption() ?></span></td>
        <td data-name="tanggal_selesai"<?= $Page->tanggal_selesai->cellAttributes() ?>>
<span id="el_kegiatan_tanggal_selesai">
<span<?= $Page->tanggal_selesai->viewAttributes() ?>>
<?= $Page->tanggal_selesai->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatanadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fkegiatanadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkegiatanedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fkegiatanedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
