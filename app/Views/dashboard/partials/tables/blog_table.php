<div class="table-responsive">
      <table id="example" class="table table-sm table-striped border">
        <thead>
            <tr class="bg-light text-dark">
                <td width="25">
                    No
                </td>
                <td>
                    Title
                </td>
                <td width="150">
                    Last Updated
                </td>
                <td width="100">
                    View
                </td>
                <td width="100">
                    Edit
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($all_blogs)): ?>
            <?php $counter = 1; ?>
            <?php foreach($all_blogs as $bp) : ?>
                <tr data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img src='<?=base_url('uploads/'.$bp['featureImg'])?>' alt='Applicant Image' width='100'>">
                    <td class="bg-light text-dark"><?=$counter?></td>
                    <td><?=$bp['title']?></td>
                    <td><?= substr($bp['createdAt'], 0,10) ?></td>
                    <td><button class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i> Preview</button></td>
                    <td><a href="<?=base_url('/dashboard/edit/blog/'.$bp['id'])?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i> Edit </a></td>
                </tr>
                <?php $counter++?>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>