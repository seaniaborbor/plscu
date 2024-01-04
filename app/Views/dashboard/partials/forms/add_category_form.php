<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-4">
            <h3>About Category</h3>
          <p>The Category feature allows you to label and group your portfolio and and blog posts categorically</p>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              Dismiss
            </button>
        </div>
      </div>
    </div>
  </div>


   <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex justify-content-between mb-3 ">
            <h3>Add New Post Category</h3>
            <button type="button" class="btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#categoryModal">
              <i class="bi bi-question"></i>
            </button>
          </div>
          <form action="<?=base_url('dashboard/category')?>" method="post">

            <div class="form-group mb-3">
              <label>Category Name</label>
              <input type="text" name="post_category" value="<?= set_value('post_category')?>" class="form-control form-control-lg" >
              <?php if(isset($category_validation) && $category_validation->hasError('post_category')) : ?>
                 <div class="text-danger"><?=$category_validation->getError('post_category')?></div>
              <?php endif; ?>
            </div>

            <div class="form-group mb-3">
              <label>Category Description</label>
              <input type="text" name="description" value="<?= set_value('description')?>" class="form-control form-control-lg" >
              <?php if(isset($category_validation) && $category_validation->hasError('description')) : ?>
                 <div class="text-danger"><?=$category_validation->getError('description')?></div>
              <?php endif; ?>
            </div>

            <button class="btn  btn-success mt-3 ">Submit</button>
          </form>
        </div>
      </div>