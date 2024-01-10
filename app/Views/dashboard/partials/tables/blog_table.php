<div class="table-responsive">
      <table id="example" class="table table-sm table-striped border">
        <thead>
            <tr class="bg-light text-dark">
                <td></td>
                <td>
                    Title
                </td>
                <td width="150">
                    Last Updated
                </td>
                <td width="150">
                    View
                </td>
                <td width="100">
                    Edit
                </td>
                <td width="100">
                    Delete
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($all_blogs)): ?>
            <?php $counter = 1; ?>
            <?php foreach($all_blogs as $bp) : ?>
                <tr>
                    <td>
                        <img src='<?=base_url('uploads/'.$bp['featureImg'])?>' style="width:70px; height:50px"> 
                    </td>
                    <td><?=$bp['title']?></td>
                    <td><?= substr($bp['createdAt'], 0,10) ?></td>
                    <td><a href="<?=base_url('blog-details/'.$bp['id'])?>" class="btn w-100 btn-sm btn-success"><i class="bi bi-eye"></i> Preview</a></td>
                    <td><a href="<?=base_url('/dashboard/edit/blog/'.$bp['id'])?>" class="btn btn-sm btn-success w-100"><i class="bi bi-pencil"></i> Edit </a></td>
                    <td><a href="<?=base_url('/dashboard/delete/blog/'.$bp['id'])?>" class="btn btn-sm btn-danger w-100"><i class="bi bi-trash"></i> Delete </a></td>
                </tr>
                <?php $counter++?>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>