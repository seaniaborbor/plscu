
<div class="row">
    <?php if(isset($all_services)): ?>
    <?php $counter = 1; ?>
      <?php foreach($all_services as $all_ser) : ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <p class="display-4"><i class="bi <?=$all_ser['service_icon']?>"></i></p>
                <p class=""><b><?=$all_ser['service_name']?></b></p>
                <p><?= substr($all_ser['service_summary'], 0,100) ?>..</p>
              </div>
              <div class="card-footer">
                <a href="<?=base_url('/dashboard/edit/services/'.$all_ser['id'])?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i> Edit</a>
                <button class="btn btn-sm btn-danger "><i class="bi bi-trash"></i> Delete</button>
              </div>
            </div>
          </div>
        <?php $counter++?>
      <?php endforeach  ?>
    <?php endif ?>
</div>