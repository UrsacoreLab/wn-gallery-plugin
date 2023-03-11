<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('UrsacoreLab/Gallery/GalleryController') ?>"><?= e(trans('ursacorelab.gallery::lang.models.gallerycontroller.label_plural')); ?></a></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <div class="form-preview">
        <?= $this->formRenderPreview() ?>
    </div>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
    <p><a href="<?= Backend::url('UrsacoreLab/Gallery/GalleryController') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')); ?></a></p>

<?php endif ?>
