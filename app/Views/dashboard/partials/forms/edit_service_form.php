<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-4">
            <h3>About Editing Service</h3>
          <p>This feature allows you to update previous service(s). When a service is edited and submitted, it is not revertable except you re-edit to the previous or what you want it to be </p>
          <p>Avoid redundancy in listing your services. Eg. You can't add graphic design as a service and later add logo design - they all fall in the field of graphics design! </p>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              Dismiss
            </button>
        </div>
      </div>
    </div>
  </div>


   <div class="modal-content shadow-lg">
        <div class="modal-body">
          <div class="d-flex justify-content-between mb-3 ">
            <h5>Add New Service</h5>
          </div>
          <form action="<?=base_url('dashboard/edit/services/'.$a_service_data['id'])?>" method="post">

            <div class="form-group mb-3">
              <label>Service Name</label>
              <input type="text" name="service_name" value="<?=$a_service_data['service_name']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('service_name')) : ?>
                 <div class="text-danger"><?=$validation->getError('service_name')?></div>
              <?php endif; ?>
            </div>

             <div class="form-group mb-3">
              <label>Service Summary(<small class="text-danger">Summarize this service in 200 characters max</small></label>
              <input type="text" name="service_summary" value="<?=$a_service_data['service_summary']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('service_summary')) : ?>
                 <div class="text-danger"><?=$validation->getError('service_summary')?></div>
              <?php endif; ?>
            </div>

              <div class="form-group mb-3">
              <label>Service Details(<small class="text-danger">Provide detail information about this service you offer</small></label>
              <input type="text" name="service_detail" value="<?=$a_service_data['service_detail']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('service_detail')) : ?>
                 <div class="text-danger"><?=$validation->getError('service_detail')?></div>
              <?php endif; ?>
            </div>

             <div class="form-group mb-3">
              <label>Service Icon(<span class="text-danger"><small>pick an icon <a target="blank" href="https://icons.getbootstrap.com">Here</a>. Only bootstrap icons are allowed</small></span></label>
              <input type="text" name="service_icon" value="<?=$a_service_data['service_icon']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('service_icon')) : ?>
                 <div class="text-danger"><?=$validation->getError('service_icon')?></div>
              <?php endif; ?>
            </div>

            <button class="btn  btn-success mt-3 ">Submit</button>
          </form>
        </div>
      </div>