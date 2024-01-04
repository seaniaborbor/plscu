<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-4">
            <h3>About Customer Testimonials</h3>
          <p>Customer Testimonials are the testemonies you collect from your happy clients. It makes visitors of your website to get to know what people are saying about your service, company or business </p>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              Dismiss
            </button>
        </div>
      </div>
    </div>
  </div>


   <div class="modal-content shadow-lg">
        <div class="modal-body">
          <form action="<?=base_url('dashboard/edit/testimonials/'.$a_testimonial['id'])?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label>Customer's Name</label>
              <input type="text" name="customer_name" value="<?= $a_testimonial['customer_name']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('customer_name')) : ?>
                 <div class="text-danger"><?=$validation->getError('customer_name')?></div>
              <?php endif; ?>
            </div>

             <div class="form-group mb-3">
              <label>Customer Title(<small class="text-danger">Eg. Engineer, CEO, Client/Customer, etc</small></label>
              <input type="text" name="customer_title" value="<?= $a_testimonial['customer_title']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('customer_title')) : ?>
                 <div class="text-danger"><?=$validation->getError('customer_title')?></div>
              <?php endif; ?>
            </div>

              <div class="form-group mb-3">
              <label>Customer Testimoney(<small class="text-danger">Write what the customer say about your business</small></label>
              <input type="text" name="customer_testimoney" value="<?= $a_testimonial['customer_testimoney']?>" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('customer_testimoney')) : ?>
                 <div class="text-danger"><?=$validation->getError('customer_testimoney')?></div>
              <?php endif; ?>
            </div>

             <div class="form-group mb-3">
              <label>Customer's Picture</label>
              <input type="file" name="customer_pic" class="form-control form-control-lg" >
              <?php if(isset($validation) && $validation->hasError('customer_pic')) : ?>
                 <div class="text-danger"><?=$validation->getError('customer_pic')?></div>
              <?php endif; ?>
            </div>

            <button class="btn  btn-success mt-3 ">Submit</button>
          </form>
        </div>
      </div>